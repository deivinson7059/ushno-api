<?php
namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Services;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class AuthController extends ResourceController
{
    use ResponseTrait;

    public function __construct()
    {
        helper('secure_password');
    }

    public function renew()
    {

        $key = Services::getSecretKey();

        $token = $this->request->getVar('token');

        if ($token == null) {
            return $this->failUnauthorized('No se proporciono JWT');
        }

        try
        {
            $valToken = JWT::decode($token, $key, ['HS256']);

            $user_mail = $valToken->data->mail;

            $AuthModel = new AuthModel();

            $validateusuario = $AuthModel->where('user_mail', $user_mail)->first();
            if ($validateusuario == null) {
                $response = [
                    'status'   => 401,
                    'error'    => 401,
                    'messages' => [
                        'error' => 'Email no existe'
                    ]
                ];

                return $this->respond($response, 200, 'Email no existe');

            }

            return $this->generateJWT($validateusuario);

        } catch (\Exception$e) {
            $response = [
                'status'   => 400,
                'error'    => 400,
                'messages' => [
                    'error' => 'JWT no valido'
                ]
            ];

            return $this->respond($response, 200, 'JWT no valido');

        }

    }

    public function login()
    {
        try {

            $user_mail = $this->request->getVar('user_mail');
            $user_pass = $this->request->getVar('user_pass');

            //print_r($user_mail);

            $AuthModel = new AuthModel();

            $validateusuario = $AuthModel->where('user_mail', $user_mail)->first();
            if ($validateusuario == null) {

                $response = [
                    'status'   => 401,
                    'error'    => 401,
                    'messages' => [
                        'error' => 'Email no existe'
                    ]
                ];

                return $this->respond($response, 200, 'Email no existe');

            }

            if (verifyPassword($user_pass, $validateusuario['user_pass'])) {
                return $this->generateJWT($validateusuario);
            } else {

                $response = [
                    'status'   => 401,
                    'error'    => 401,
                    'messages' => [
                        'error' => 'Contraseña Errada'
                    ]
                ];

                return $this->respond($response, 200, 'Contraseña Errada');

            }

        } catch (\Exception$e) {
            return $this->failServerError('Algo salio mal intenta mas tarde' . $e);
        }
    }

    protected function generateJWT($usuario)
    {
        $key     = Services::getSecretKey();
        $time    = time();
        $payload = [
            'aud'  => base_url(),
            'iat'  => $time,
            'exp'  => $time + 60 * 60 * 24,
            'data' => [
                'name' => $usuario['user_name'],
                'mail' => $usuario['user_mail'],
                'rol'  => $usuario['rol_id']
            ]
        ];
        $jwt = JWT::encode($payload, $key);

        $response = [
            'status'   => 200,
            'token'    => $jwt,
            'messages' => [
                'success' => 'Login Correcto'
            ]

        ];
        return $this->respondCreated($response);

        //return $jwt;

    }

    public function create()
    {

        try {

            $user_name = 'Deivinson Schmalbach';
            $user_mail = 'deivinson7059@gmail.com';
            $user_pass = 'Danisoft2016$';
            $rol_id    = '1';

            $user_pass2 = hashPassword($user_pass);

            $data = [
                'user_name' => $user_name,
                'user_mail' => $user_mail,
                'user_pass' => $user_pass2,
                'rol_id'    => $rol_id
            ];

            //print_r($data);
            $AuthModel = new AuthModel();

            $AuthModel->insert($data);

            $response = [
                'status'   => 201,
                'error'    => false,
                'pass'     => $user_pass2,
                'messages' => [
                    'success' => 'Usuario Creado'
                ]
            ];
            return $this->respondCreated($response);

        } catch (\Exception$e) {
            return $this->failServerError('Algo salio mal intenta mas tarde');
        }
    }

}

<?php
namespace App\Controllers;

use App\Models\UserModel;
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

    public function login()
    {
        try {

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            //print_r($username);

            $usermodel = new UserModel();

            $validateusuario = $usermodel->where('username', $username)->first();
            if ($validateusuario == null) {
                return $this->failNotFound('Usuario no existe');
            }

            if (verifyPassword($password, $validateusuario['password'])) {
                return $this->generateJWT($validateusuario);
            } else {
                return $this->failValidationErrors('Contraseña Errada');
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
                'nombre'   => $usuario['nombre'],
                'username' => $usuario['username'],
                'rol'      => $usuario['rol_id']
            ]
        ];
        $jwt = JWT::encode($payload, $key);

        $response = [
            'status'   => 200,
            'error'    => false,
            'messages' => 'Login Correcto',
            'tocken'   => $jwt

        ];
        return $this->respondCreated($response);

        //return $jwt;

    }

    public function create()
    {

        try {

            $nombre   = 'Deivinson Schmalbach';
            $username = 'danisoft';
            $password = 'Danisoft2016$';
            $rol_id   = '1';

            $password2 = hashPassword($password);

            $data = [
                'nombre'   => $nombre,
                'username' => $username,
                'password' => $password2,
                'rol_id'   => $rol_id
            ];

            //print_r($data);
            $usermodel = new UserModel();

            $usermodel->insert($data);

            $response = [
                'status'   => 201,
                'error'    => false,
                'pass'     => $password2,
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

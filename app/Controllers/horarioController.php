<?php namespace App\Controllers;

use App\Models\HorarioModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class HorarioController extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new HorarioModel();

        $data['Horarios'] = $model->getHorarios();

        $data = [
            'status'   => 200,
            'messages' => [
                'success' => 'Lista de Horarios'
            ],
            'Horarios' => $model->getHorarios()
        ];
        return $this->respondCreated($data);

    }

    public function create()
    {

        try {

            $user_mail = $this->request->getVar('user_mail');
            $user_pass = $this->request->getVar('user_pass');

            $data = [
                'user_name' => $user_pass,
                'user_mail' => $user_pass,
                'user_pass' => $user_pass,
                'rol_id'    => $user_pass
            ];

            //print_r($data);
            $AuthModel = new HorarioModel();

            $AuthModel->insert($data);

            $response = [
                'status'   => 201,
                'error'    => false,
                'pass'     => $user_pass,
                'messages' => [
                    'success' => 'Usuario Creado'
                ]
            ];
            return $this->respondCreated($response);

        } catch (\Exception$e) {
            return $this->failServerError('Algo salio mal intenta mas tarde');
        }
    }

    public function getcbTeam()
    {
        $model = new HorarioModel();

        $data['teams'] = $model->getcbTeam();

        return $this->respond($data);

    }

    public function getcbDia()
    {
        $model = new HorarioModel();

        $data['combo'] = $model->getcbDia();

        return $this->respond($data);

    }

    public function getHorario($dia_id)
    {
        $model = new HorarioModel();

        $response = [
            'status'   => 200,
            'lista'    => $model->getHorario($dia_id),
            'messages' => [
                'success' => 'Horario dia: ' . $dia_id
            ]
        ];
        return $this->respondCreated($response);

    }

}

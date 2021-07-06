<?php namespace App\Controllers;

use App\Models\HorarioModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class horarioController extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new HorarioModel();
        $data  = [
            'status'   => 200,
            'error'    => false,
            'messages' => [
                'success' => 'Lista de Horarios'
            ]
        ];

        $data['Horarios'] = $model->getHorarios();

        return $this->respond($data);

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

    public function getHorario($id)
    {
        $model = new HorarioModel();

        $data['lista'] = $model->getHorario($id);

        return $this->respond($data);

    }

}

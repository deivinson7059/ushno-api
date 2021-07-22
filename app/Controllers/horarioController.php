<?php namespace App\Controllers;

use App\Models\HorarioModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class HorarioController extends ResourceController
{
    use ResponseTrait;

    public function deleteH()
    {

        $hor_id = $this->request->getVar('hor_id');

        $borrarcontacto = new HorarioModel();
        $borrarcontacto->where('hor_id', $hor_id)->delete($hor_id);
        $data = [
            'status'   => 200,
            'messages' => [
                'success' => 'Horario Eliminado'
            ]

        ];

        return $this->respondCreated($data);

    }

    public function save()
    {
        $nuevoHorario = new HorarioModel();

        $datos = [
            'user_id'     => $this->request->getVar('user_id'),
            'horario'     => $this->request->getVar('horario'),
            'descripcion' => $this->request->getVar('descripcion'),
            'te_id'       => $this->request->getVar('te_id'),
            'dia_id'      => $this->request->getVar('dia_id'),
            'frase'       => $this->request->getVar('frase')
        ];

        //print_r($datos);

        $res["add"] = $nuevoHorario->addHorario($datos);

        $data = [
            'status'   => 200,
            'messages' => [
                'success' => 'Datos Creados'
            ],
            'res'      => $res

        ];

        return $this->respondCreated($data);

    }

    public function updateH()
    {

        $updatehorario = new HorarioModel(); // se crea el objeto de la clase HorarioModel
        $datos         = [
            'horario'     => $this->request->getVar('horario'),
            'dia_id'      => $this->request->getVar('dia_id'),
            'descripcion' => $this->request->getVar('descripcion'),
            'frase'       => $this->request->getVar('frase'),
            'te_id'       => $this->request->getVar('te_id'),
            'hor_id'      => $this->request->getVar('hor_id'),
            'user_id'     => $this->request->getVar('user_id')
        ];

        $res["mod"] = $updatehorario->updteHorario($datos);

        $data = [
            'status'   => 200,
            'messages' => [
                'success' => 'Datos Actualizados'
            ],
            'res'      => $res

        ];

        return $this->respondCreated($data);

    }

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

    public function getHorario($hor_id)
    {
        $model = new HorarioModel();

        $response = [
            'status'   => 200,
            'lista'    => $model->getHorario($hor_id),
            'messages' => [
                'success' => 'Horario Id:' . $hor_id
            ]
        ];
        return $this->respondCreated($response);

    }

}

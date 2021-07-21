<?php
namespace App\Controllers;

use App\Models\TeamsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class TeamsController extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new TeamsModel();

        $data = [
            'status'   => 200,
            'messages' => [
                'success' => 'Lista de Teams'
            ],
            'teams'    => $model->findAll()
        ];
        return $this->respondCreated($data);

    }

}

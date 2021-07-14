<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'emisora_db.usuario';
    protected $primaryKey = 'id';

    protected $returnType    = 'array';
    protected $allowedFields = ['nombre', 'username', 'password', 'rol_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}

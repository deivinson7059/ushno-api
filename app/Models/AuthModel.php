<?php
namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'emisora_db.users';
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['user_name', 'user_mail', 'user_pass', 'rol_id'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}

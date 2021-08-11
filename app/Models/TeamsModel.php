<?php
namespace App\Models;

use CodeIgniter\Model;

class TeamsModel extends Model
{
    protected $table      = 'danisoftcom_emisora_db.teams';
    protected $primaryKey = 'te_id';

    protected $allowedFields = ['te_nombre', 'te_nick', 'te_image'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

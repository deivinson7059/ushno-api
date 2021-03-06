<?php
namespace App\Models;

use CodeIgniter\Model;

class HorarioModel extends Model
{
    protected $table         = 'danisoftcom_emisora_db.horarios';
    protected $primaryKey    = 'hor_id';
    protected $allowedFields = ['dia_id', 'horario', 'descripcion', 'frase', 'te_id', 'user_id'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function updteHorario($datos)
    {

        $user_id     = $datos['user_id'];
        $horario     = $datos['horario'];
        $descripcion = $datos['descripcion'];
        $te_id       = $datos['te_id'];
        $dia_id      = $datos['dia_id'];
        $frase       = $datos['frase'];
        $hor_id      = $datos['hor_id'];

        //print_r($datos);

        $db = db_connect();

        $sql = "UPDATE danisoftcom_emisora_db.horarios SET user_id='$user_id', horario='$horario',
              descripcion='$descripcion', te_id='$te_id', dia_id= '$dia_id',frase = '$frase'  WHERE hor_id='$hor_id';
                  ";

        //print_r($sql);

        $consulta = $db->query($sql);

        if ($consulta == true) {
            return true;
        } else {
            return false;
        }

    }

    public function addHorario($datos)
    {

        $user_id     = $datos['user_id'];
        $horario     = $datos['horario'];
        $descripcion = $datos['descripcion'];
        $te_id       = $datos['te_id'];
        $dia_id      = $datos['dia_id'];
        $frase       = $datos['frase'];

        $db = db_connect();

        $sql = "INSERT INTO danisoftcom_emisora_db.horarios(dia_id, horario, descripcion, frase, te_id, user_id)
        VALUES ('$dia_id', '$horario', '$descripcion', '$frase', '$te_id', '$user_id');";

        $consulta = $db->query($sql);
        if ($consulta == true) {
            return true;
        } else {
            return false;
        }

    }

    public function getHorarios()
    {

        $db      = db_connect();
        $builder = $db->table("danisoftcom_emisora_db.gethorarios");
        $query   = $builder->get();
        return $query->getResultArray();

    }

    public function getHorario($hor_id)
    {

        $db      = db_connect();
        $builder = $db->table("danisoftcom_emisora_db.gethorarios");
        $builder->where('hor_id', $hor_id);
        $aResult = $builder->get()->getResultArray();
        return $aResult;

    }

    public function getcbDia()
    {

        $db      = db_connect();
        $builder = $db->table("danisoftcom_emisora_db.dias_sem");
        $aResult = $builder->get()->getResultArray();
        return $aResult;
    }

    public function getcbTeam()
    {

        $db      = db_connect();
        $builder = $db->table("danisoftcom_emisora_db.teams");
        $aResult = $builder->get()->getResultArray();
        return $aResult;
    }

}

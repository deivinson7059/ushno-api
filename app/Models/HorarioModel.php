<?php
namespace App\Models;

use CodeIgniter\Model;

class HorarioModel extends Model
{
    protected $table      = 'emisora_db.horarios';
    protected $primaryKey = 'hor_id';

    public function updteHorario($datos)
    {

        //print_r($datos);

        $user_id     = $datos['user_id'];
        $horario     = $datos['horario'];
        $descripcion = $datos['descripcion'];
        $te_id       = $datos['te_id'];
        $dia_id      = $datos['dia_id'];
        $frase       = $datos['frase'];
        $hor_id      = $datos['hor_id'];

        $db = db_connect();

        $sql = "UPDATE emisora_db.horarios SET user_id='$user_id', horario='$horario',
              descripcion='$descripcion', te_id='$te_id', dia_id= '$dia_id',frase = '$frase'  WHERE hor_id='$hor_id';
                  ";

        $consulta = $db->query($sql);

        //print_r($sql);

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

        $sql = "INSERT INTO emisora_db.horarios(dia_id, horario, descripcion, frase, te_id, user_id)
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
        $builder = $db->table("emisora_db.horarios as h");
        $builder->join('emisora_db.dias_sem as d', 'd.dia_id=h.dia_id');
        $builder->join('emisora_db.teams as t', 't.te_id = h.te_id');
        $aResult = $builder->get()->getResultArray();
        return $aResult;
    }

    public function getHorario($hor_id)
    {

        $db      = db_connect();
        $builder = $db->table("emisora_db.horarios as h");
        $builder->join('emisora_db.dias_sem as d', 'd.dia_id=h.dia_id');
        $builder->join('emisora_db.teams as t', 't.te_id = h.te_id');
        $builder->where('hor_id', $hor_id);
        $aResult = $builder->get()->getResultArray();
        return $aResult;
    }

    public function getcbDia()
    {

        $db      = db_connect();
        $builder = $db->table("emisora_db.dias_sem");
        $aResult = $builder->get()->getResultArray();
        return $aResult;
    }

    public function getcbTeam()
    {

        $db      = db_connect();
        $builder = $db->table("emisora_db.teams");
        $aResult = $builder->get()->getResultArray();
        return $aResult;
    }

}

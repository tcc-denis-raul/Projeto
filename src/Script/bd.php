<?php
class BD
{
    private $base_nome      = "paloma";
    private $colecao_cursos = "cursos_idiomas";
    private $colecao_usuario = "usuario";
    public function find()
    {
        $base          = $this->base_nome;
        $colecao       = $this->colecao_cursos;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $cursos        = $db->$colecao->find();
        $closed        = $mongo_cliente->close();
        return $cursos;
    }

    public function findOne($filtro)
    {
        $base          = $this->base_nome;
        $colecao       = $this->colecao_cursos;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $cursos        = $db->$colecao->findOne($filtro);
        return $cursos;
    }

    public function findUsuario($filtro)
    {
        $base          = $this->base_nome;
        $colecao       = $this->colecao_usuario;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $usuario       = $db->$colecao->findOne($filtro);
        return $usuario;
    }

    public function insertUsuario($info)
    {
        $base          = $this->base_nome;
        $colecao       = $this->colecao_usuario;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $verifica      = $this->findUsuario(array('email' => $info["email"]));
        if(sizeof($verifica) > 0) {
            return 0;
        } else {
            $db->$colecao->insert($info, array("w" => 1));
            return 1;
        }
        // return $usuario;   
    }
}

<?php
class BD
{
    private $base_nome      = "paloma";
    private $colecao_cursos = "cursos_idiomas";
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
}

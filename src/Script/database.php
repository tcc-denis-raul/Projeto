<?php
include_once "conf.php";

class DataBase extends Configuration
{
    private $base_nome              = "paloma";
    private $colecao_cursos         = "cursos_idiomas";
    private $colecao_usuario        = "usuario";
    private $collection_custom      = "custom_curses";
    private $collection_courses_new = "new_courses";
    
    public function findUser($filter) 
    {
        $dbname             = $this->getDBName();
        $collection         = $this->getCollection("user");
        $mgoclient          = new MongoClient();
        $db                 = $mgoclient->$dbname;
        $user               = $db->$collection->findOne($filter);
        return $user;
    }

    public function insertUser($inf) 
    {
        $dbname             = $this->getDBName();
        $collection         = $this->getCollection("user");
        $mgoclient          = new MongoClient();
        $db                 = $mgoclient->$dbname;
        try {
            $db->$collection->insert($inf, array("w" => 1));
        } catch (MongoException $e) {
            return 0;
        }
        return 1;
    }

    public function updateUser($inf) 
    {
        $dbname             = $this->getDBName();
        $collection         = $this->getCollection("user");
        $mgoclient          = new MongoClient();
        $db                 = $mgoclient->$dbname;
        try {
            $email = $inf["email"];
            unset($inf["email"]);
            unset($inf["_id"]);
            $db->$collection->update(
                array("email" => $email),
                array('$set' => $inf)
            );
        } catch (Exception $e) {
            return 0;
        }
        return 1;
    }

    public function insertNewCourseRecommend($inf) 
    {
        $dbname                 = $this->getDBName();
        $collection             = $this->getCollection("new_courses");
        $mgoclient              = new MongoClient();
        $db                     = $mgoclient->$dbname;
        try {
            $db->$collection->insert($inf, array("w" => 1));
        } catch (MongoDuplicateKeyException $e) {
            return 0;
        }
        return 1;
    }

    public function findCourses($inf = array()) 
    {
        $dbname                 = $this->getDBName();
        $collection             = $this->getCollection("language");
        $mgoclient              = new MongoClient();
        $db                     = $mgoclient->$dbname;
        if(sizeof($inf) == 0) {
            return $db->$collection->find();
        } else {
            return $db->$collection->findOne($inf);
        }
    }









    public function find()
    {
        $base          = $this->base_nome;
        $colecao       = $this->colecao_cursos;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $cursos        = $db->$colecao->find();
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
        //se usuário for encontrado retorna que ja existe
        if(sizeof($verifica) > 0) {
            return 0;
        } else {
            $db->$colecao->insert($info, array("w" => 1));
            return 1;
        }   
    }

    public function updateUsuario($info)
    {
        $base          = $this->base_nome;
        $colecao       = $this->colecao_usuario;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $verifica      = $this->findUsuario(array('email' => $info["email"]));
        //se o usuário não for encontrado retorna falso
        if(sizeof($verifica) <= 0) {
            return 0;
        } else {
            $db->$colecao->update(
                array("email" => $info["email"]), 
                array('$set' => $info)
            );
            return 1;
        }   
    }

    public function updateUsuarioCustom($a)
    {
        $base          = $this->base_nome;
        $colecao       = $this->colecao_usuario;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $verifica      = $this->findUsuario(array('email' => $a["email"]));
        //se o usuário não for encontrado retorna falso
        if(sizeof($verifica) <= 0) {
            return 0;
        } else {
            $db->$colecao->update(
                array('email' => $a["email"]),
                array('$addToSet' => array("avaliado" => $a["avaliado"]))
            );
            return 1;
        }   
    }

    public function setCustomCurses($inf)
    {
        $base           = $this->base_nome;
        $collection     = $this->collection_custom;
        $mongo_cliente  = new MongoClient();
        $db             = $mongo_cliente->$base;
        try {
            $db->$collection->insert($inf);
        } catch (MongoDuplicateKeyException $e) {
            try {
                $email = $inf["email"];
                unset($inf["email"]);
                unset($inf["_id"]);
                $db->$collection->update(
                    array("email" => $email),
                    array('$set' => $inf)
                );
            } catch (Exception $e) {
                return 0;
            }
        }
        return 1;
    }

    public function getCustomCurses($inf) 
    {
        $base          = $this->base_nome;
        $colecao       = $this->collection_custom;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        $cursos        = $db->$colecao->findOne($inf);
        return $cursos;
    }

    public function updateCurses($inf)
    {
        $base           = $this->base_nome;
        $collection     = $this->colecao_cursos;
        $mongo_cliente  = new MongoClient();
        $db             = $mongo_cliente->$base;
        $curso = $inf["nome"];
        unset($inf["curso"]);
        $db->$collection->update(
            array("nome" => $curso),
            array('$set' => $inf)
        );
    }

    public function insertNewCourse($info)
    {
        $base          = $this->base_nome;
        $colecao       = $this->collection_courses_new;
        $mongo_cliente = new MongoClient();
        $db            = $mongo_cliente->$base;
        try {
            $db->$colecao->insert($info, array("w" => 1));
        } catch (MongoDuplicateKeyException $e) {
            return 0;
        }
        return 1;
    }
}
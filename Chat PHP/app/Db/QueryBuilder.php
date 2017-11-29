<?php

namespace Project\Db;

use Project\Db\Connection;

class QueryBuilder
{
    
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getConnection();
    }

    public function select($table, $parameters = [], $first = false, $condition = 'and',  $fetch = \PDO::FETCH_ASSOC)
    {

        $params = array_map(function($p){
            return "$p = :$p";
        }, array_keys($parameters));

        $where = !empty($parameters) ? 'where ' . implode(" {$condition} ", $params) : '';
 
        $s = $this->pdo->prepare("select * from {$table} {$where}");
        try{
            $s->execute($parameters);

            return $first ? $s->fetch($fetch) : $s->fetchAll($fetch);

        }  catch(\PDOException $e){
             die($e->getMessage());
        }
        
    }
    
    public function insert($table, $data)
    {

        $columns = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        $stmt = $this->pdo->prepare($sql);

        try {
             return $stmt->execute($data);
        } catch (\PDOException $ex) {
            //die($ex->getMessage());
            return false;
        }
    }

    public function delete($table, $data)
    {   
        $where = key($data) . ' = :' . key($data);
        //die($where);
        $sql = "DELETE FROM {$table} WHERE {$where}";
        $stmt = $this->pdo->prepare($sql);

        try {
           return $stmt->execute($data);
        } catch (\PDOException $ex) {
            die($ex->getMessage());
        }
    }



    public function update($values, $id)
       {

        $sql = "update usuario

                set nome = :nome, email = :email, status = :status

                where id = :id"; 

        $s = $this->pdo->prepare($sql);

        

        $s->bindParam(':id', $id);
        $s->bindParam(':nome', $values['nome']);
        $s->bindParam(':email', $values['email']);
        $s->bindParam(':status', $values['status']);
        
        

        try{
            $s->execute();

           // return $s->fetch(\PDO::FETCH_ASSOC);

        } catch(\PDOException $e){
            die($e->getMessage());
        }
    }


        public function updateFoto($values, $id)
       {

        $sql = "update usuario

                set foto = :foto,

                where id = :id"; 

        $s = $this->pdo->prepare($sql);

        

        $s->bindParam(':id', $id);
        $s->bindParam(':nome', $values['nome']);
        $s->bindParam(':email', $values['email']);
        
        

        try{
            $s->execute();

           // return $s->fetch(\PDO::FETCH_ASSOC);

        } catch(\PDOException $e){
            die($e->getMessage());
        }
    }



    public function selectConversas($id_usuario_logado)
    {
        $sql = "SELECT conversas.id_conversas
                FROM conversas 
                JOIN usuario ON (usuario.id = conversas.id_usuario_amigo)
                WHERE conversas.id_usuario_abriu = :id;";

        $s = $this->pdo->prepare($sql);

        $s->bindParam(':id', $id_usuario_logado);

        try{
            $s->execute();

            return $s->fetch(\PDO::FETCH_ASSOC);

        } catch(\PDOException $e){
            die($e->getMessage());
        }

    }




    public function selectAmigos($id)
    {
        $sql = "select usuario.nome,usuario.status,amizade.usuario_id1
                from amizade
                inner join usuario
                on usuario.id = amizade.usuario_id1
                where amizade.usuario_id = :id";

        $s = $this->pdo->prepare($sql);

        $s->bindParam(':id', $id);

        try{
            $s->execute();

            return $s->fetchAll(\PDO::FETCH_ASSOC);

        } catch(\PDOException $e){
            die($e->getMessage());
        }
    }

    public function selectInimigos($id)
    {

        $sql = "select id,nome,status from usuario where id not in(select usuario.id
                from amizade
                inner join usuario
                on usuario.id = amizade.usuario_id1
                where amizade.usuario_id = :id or amizade.usuario_id1 = :id ) and id <> :id";
                            

        $s = $this->pdo->prepare($sql);

        $s->bindParam(':id', $id);


        try{
            
            $s->execute();

            return $s->fetchAll(\PDO::FETCH_ASSOC);


        } catch(\PDOException $e){
            die($e->getMessage());
        }
    }



    public function updateFuncional($id,$change)
   {
        $sql = "update usuario set nome,email = :change where id = :id ";
                            
        $s = $this->pdo->prepare($sql);

        $s->bindParam(':id', $id);
         $s->bindParam(':change', $change);

        try{
            $s->execute();

            return $s->fetch(\PDO::FETCH_ASSOC);

        } catch(\PDOException $e){
            die($e->getMessage());
        }
    } 


    public function selectEnv($id_usuario_logado, $id_amigo)
    {

        $sql = "select * from conversas
                 
                WHERE remetente in (:id, :ida) &&  destino in (:id, :ida)";
                            

        $s = $this->pdo->prepare($sql);

        $s->bindParam(':id', $id_usuario_logado);
        $s->bindParam(':ida', $id_amigo);

        try{
            $s->execute();

            return $s->fetchAll(\PDO::FETCH_ASSOC);

        } catch(\PDOException $e){
            die($e->getMessage());
        }
    }


    public function selectLike($like)
{
    $like = '%'.$like.'%';
    $sql = "select nome,id from usuario where id not in(select usuario.id
                from amizade
                inner join usuario
                on usuario.id = amizade.usuario_id1
                where amizade.usuario_id = :id or amizade.usuario_id1 = :id ) like :like"; 
    $s = $this->pdo->prepare($sql);

    $s->bindParam(':like', $like);

    try{
        $s->execute();

        return $s->fetchAll(\PDO::FETCH_ASSOC);

    }  catch(\PDOException $e){
         die($e->getMessage());
    }
}
    
}


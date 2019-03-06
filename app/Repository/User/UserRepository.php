<?php

namespace App\Repository\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function getUser($nome,$id){
        $query = "
        select 
            u.id, u.name,u.hash, u.email, (
                select
                    count(*)
                from
                    usuarios_seguidores as us
                where 
                    us.seguindo_user_id = :id_usuario and us.seguidor_user_id = u.id
            ) as seguindo_sn 
        from 
            User as u
        where 
            u.name like :nome and u.id != :id_usuario";
        $stmt = $this->_em->getConnection()->prepare($query);
        $stmt->bindValue(':nome',"%". $nome . "%");
        $stmt->bindValue(':id_usuario', $id);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                

    }

    public function addSeguidor($userSeguidor, $userSeguir){
        
        $query = "insert into usuarios_seguidores (seguindo_user_id, seguidor_user_id) values(:id_usuario, :id_usuario_seguido)";
        $stmt = $this->_em->getConnection()->prepare($query);
        $stmt->bindValue(':id_usuario',$userSeguidor);
        $stmt->bindValue(':id_usuario_seguido',$userSeguir);
        $stmt->execute();
        return true;
        
    }

    public function pararSeguir($userSeguidor, $userSeguir){
        $query = "delete from usuarios_seguidores where seguindo_user_id = :id_usuario and  seguidor_user_id = :id_usuario_seguido";
        $stmt = $this->_em->getConnection()->prepare($query);
        $stmt->bindValue(':id_usuario',$userSeguidor);
        $stmt->bindValue(':id_usuario_seguido',$userSeguir);
        $stmt->execute();
        return true;
    }

    public function qtdeSeguindo($id_user){
        $query = "select * from usuarios_seguidores where seguindo_user_id = :id_usuario ";
        $stmt = $this->_em->getConnection()->prepare($query);
        $stmt->bindValue(':id_usuario',$id_user);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function qtdeSeguidores($id_user){
        $query = "select * from usuarios_seguidores where seguidor_user_id = :id_usuario ";
        $stmt = $this->_em->getConnection()->prepare($query);
        $stmt->bindValue(':id_usuario',$id_user);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

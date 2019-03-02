<?php

namespace App\Repository\Tweet;

use Doctrine\ORM\EntityRepository;


class TweetRepository extends EntityRepository
{
    public function getTweets(){

        $query = "
        select 
            t.id ,
            t.hash,
            t.user_id ,
            u.name ,
            t.tweet,
            DATE_FORMAT(t.created_at, '%d/%m/%Y %H:%i') as data 
        from 
            Tweet as t left join User as u on (t.user_id = u.id)  
        where 
            t.deleted_at IS NULL
            and 
            t.user_id = :id_usuario 
            
            or t.user_id in ( select seguidor_user_id from usuarios_seguidores where seguindo_user_id = :id_usuario)
            and t.deleted_at IS NULL
        order by 
            t.created_at desc"; 
        $stmt = $this->_em->getConnection()->prepare($query);
        $stmt->bindValue(':id_usuario', $_SESSION['id']);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

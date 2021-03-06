<?php

namespace App\Repository;

use App\Entity\Mark;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mark|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mark|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mark[]    findAll()
 * @method Mark[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mark::class);
    }

//    /**
//     * @return Mark[] Returns an array of Mark objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mark
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getScoreByUserAndLevel($user_id, $level_id)
    {
        $sql = 'SELECT score FROM mark WHERE user_id = :user_id AND level_id = :level_id';
        $params = array(
            'user_id' => $user_id,
            'level_id' => $level_id
        );
        return $this->getEntityManager()->getConnection()->executeQuery($sql,$params)->fetchAll();
    }

    public function setScoreByUserAndLevel($user_id, $level_id, $score)
    {
        if(!empty($this->getScoreByUserAndLevel($user_id,$level_id))){
            $sql = 'UPDATE mark SET score = :score WHERE (user_id = :user_id AND level_id = :level_id)';
            $params = array(
                'user_id' => $user_id,
                'level_id' => $level_id,
                'score' => $score
            );
        } else {
            $sql = 'INSERT INTO mark (user_id, level_id, score) VALUES (:user_id, :level_id, :score)';
            $params = array(
                'user_id' => $user_id,
                'level_id' => $level_id,
                'score' => $score
            );
        }
        return $this->getEntityManager()->getConnection()->executeQuery($sql,$params);
    }
}

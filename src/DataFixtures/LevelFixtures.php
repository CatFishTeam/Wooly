<?php
namespace App\DataFixtures;

use App\Entity\Level;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Faker;

class LevelFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $user = $manager->getRepository(User::class)->find($faker->numberBetween(1, 10));
            dump($user);
            $level = new Level();
            $level->setData("{}");
            $level->setBest("{}");
            //$level->setThumbnail($faker->imageUrl(960, 480, 'cats'));
            //$level->setStatus(0);
            $level->setName("Level");
            $level->setSlug($faker->regexify('[A-Z0-9]{9}'));
            $level->setCreatedAt($faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null));
            $level->setUpdatedAt($level->getCreatedAt());
            $level->setPlayed($faker->numberBetween(0, 100));
            $level->setWon($faker->numberBetween(0, 100));
            $level->setUserId($user);

            $manager->persist($level);
            $manager->flush();
        }

    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
<?php
namespace App\DataFixtures;

use App\Entity\Level;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class FakerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setUsername($faker->userName);
            $user->setUsernameCanonical(strtolower($user->getUsername()));
            $user->setEmail($faker->email);
            $user->setEmailCanonical(strtolower($user->getEmail()));
            $user->setEnabled(true);
            $user->setPassword($faker->password);
            $user->setPlainPassword($faker->password);
            $user->setLastLogin($faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null));
            $user->setSalt("azertyuiop1234567890");
            $manager->persist($user);
        }


        for ($i = 0; $i < 20; $i++) {
            $level = new Level();
            $level->setData("{}");
            $level->setBest("{}");
            $level->setThumbnail("http://placehold.it/960x480");
            $level->setStatus(0);
            $level->setCreatedAt($faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null));
            $level->setUpdatedAt($level->getCreatedAt());
            $level->setPlayed($faker->numberBetween(0, 100));
            $level->setFinished($faker->numberBetween(0, 100));
            $level->setCreatorId(new User($faker->randomDigit));
            $manager->persist($level);
        }

        $manager->flush();
    }
}
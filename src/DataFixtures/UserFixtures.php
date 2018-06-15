<?php
namespace App\DataFixtures;

use App\Entity\Level;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $user = new User();
        $user->setUsername('admin');
        $user->setUsernameCanonical(strtolower($user->getUsername()));
        $user->setEmail('admin@admin.com');
        $user->setEmailCanonical(strtolower($user->getEmail()));
        $user->setEnabled(true);
        $user->setPassword('admin');
        $user->setPlainPassword('admin');
        $user->setLastLogin($faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null));
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setSalt("azertyuiop1234567890");
        $manager->persist($user);
        $manager->flush();

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

            $manager->flush();
        }
    }
}
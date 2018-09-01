<?php
namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Users();
        $user->setUsername('admin');

        $encoded = $this->encoder->encodePassword($user, 'admin');
        $user->setPassword($encoded);
        $user->setEmail('admin@example.com');

        $manager->persist($user);
        $manager->flush();
    }
}
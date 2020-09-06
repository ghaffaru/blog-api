<?php

namespace App\DataFixtures;

use App\Entity\Post;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $post->setTitle('First Post');
        $post->setPublished(new \DateTime());
        $post->setContent('Post text');
        $post->setAuthor('Ghaff');
        $post->setSlug('a-first-post');
        
        $manager->persist($post);

        $post = new Post();
        $post->setTitle('Second Post');
        $post->setPublished(new \DateTime());
        $post->setContent('Post text 2');
        $post->setAuthor('Ghaff');
        $post->setSlug('a-second-post');
        
        $manager->persist($post);

        $manager->flush();
    }
}
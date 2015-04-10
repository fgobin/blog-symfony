<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;


use Blogger\BlogBundle\Entity\Category;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $category1 = new Category();
        $category1->setName("Popular");
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName("Info");
        $manager->persist($category2);

        $manager->flush();

        $this->addReference('category-1', $category1);
        $this->addReference('category-2', $category2);

    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

}
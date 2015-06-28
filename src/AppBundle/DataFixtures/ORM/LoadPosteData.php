<?php
/**
 * Created by PhpStorm.
 * User: delphinsagno
 * Date: 28/06/15
 * Time: 11:23
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Commune;

class LoadCommuneData extends AbstractFixture implements  OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $communes = array('Matoto','Matam','Kaloum','Ratoma');
        foreach($communes as $key => $commune ){
            $com = new Commune();
            $com->setLibelleCommune($commune);

            $manager->persist($com);
            $manager->flush();

            $this->addReference('commune'.$key,$com);
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 1;
    }
}
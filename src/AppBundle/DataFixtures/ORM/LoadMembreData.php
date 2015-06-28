<?php
/**
 * Created by PhpStorm.
 * User: delphinsagno
 * Date: 28/06/15
 * Time: 11:33
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Commune;
use AppBundle\Entity\Quartier;

class LoadQuartierData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.

        $quartiers = array(
            2 => 'Sandervalia',
            0 => 'Yimbaya',
            1 => 'Madina',
            3 => 'Kipe',
            0 => 'Simbaya',
            0 => 'Lansanaya'
        );
        $i = 0;
        foreach($quartiers as $key=>$q){
            $quartier = new Quartier();
            $quartier->setLibelleQuartier($q);
            $quartier->setCommune($this->getReference('commune'.$key));

            $manager->persist($quartier);
            $manager->flush();

            $this->addReference('quartier'.$i,$quartier);
            $i++;
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
        return 2;
    }
}
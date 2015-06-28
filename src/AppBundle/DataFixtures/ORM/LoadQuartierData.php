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
            array(
                'libelleQuartier' => 'Sandervalia',
                'commune' => 2
            ),
            array(
                'libelleQuartier' => 'Yimbaya',
                'commune' => 0
            ),
            array(
                'libelleQuartier' => 'Madina',
                'commune' => 1
            ),
            array(
                'libelleQuartier' => 'Kipe',
                'commune' => 3
            ),
            array(
                'libelleQuartier' => 'Simbaya',
                'commune' => 0
            ),
            array(
                'libelleQuartier' => 'Lansanaya',
                'commune' => 0
            ),
        );
        foreach($quartiers as $key=>$q){
            $quartier = new Quartier();
            $quartier->setLibelleQuartier($q['libelleQuartier']);
            $quartier->setCommune($this->getReference('commune'.$q['commune']));

            $manager->persist($quartier);
            $manager->flush();

            $this->addReference('quartier'.$key,$quartier);
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
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
use AppBundle\Entity\Poste;

class LoadPosteData extends AbstractFixture implements  OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $postes = array('President','Vice-president','Secretaire','Cordinateur','membre');
        $postes = array(
            array(
                'libellePoste' => 'President',
                'ordreHierarchie' => 0
            ),
            array(
                'libellePoste' => 'President',
                'ordreHierarchie' => 0
            ),

        );
        foreach($postes as $key => $p ){
            $poste = new Poste();
            $poste->setLibellePoste($p);

            $manager->persist($poste);
            $manager->flush();

            $this->addReference('poste'.$key,$poste);
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
        return 3;
    }
}
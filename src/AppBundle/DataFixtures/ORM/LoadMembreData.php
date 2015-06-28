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
use AppBundle\Entity\Poste;
use AppBundle\Entity\Quartier;
use AppBundle\Entity\Membre;

class LoadMembreData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.

        $membres = array(
            array(
                'nom' => 'Toure',
                'prenom' => 'Mamadou',
                'telephone' => '777777',
                'email' => 'aad@ggg.com',
                'poste' => 2,
                'quartier' => 1
            ),
            array(
                'nom' => 'camara',
                'prenom' => 'Sekou',
                'telephone' => '777777',
                'email' => 'aad@ggg.com',
                'poste' => 1,
                'quartier' => 3
            ),
            array(
                'nom' => 'Cisse',
                'prenom' => 'Lamine',
                'telephone' => '777777',
                'email' => 'aad@ggg.com',
                'poste' => 4,
                'quartier' => 2
            ),
        );
        foreach($membres as $key=>$m){
            $membre = new Membre();
            $membre->setNomMembre($m['nom']);
            $membre->setPrenomMembre($m['prenom']);
            $membre->setTelephone($m['telephone']);
            $membre->setEmail($m['email']);
            $membre->setPoste($this->getReference('poste'.$m['poste']));
            $membre->setQuartier($this->getReference('quartier'.$m['quartier']));

            $manager->persist($membre);
            $manager->flush();

            $this->addReference('membre'.$key,$membre);
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
        return 4;
    }
}
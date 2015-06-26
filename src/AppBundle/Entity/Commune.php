<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commune
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CommuneRepository")
 */
class Commune
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="libelleCommune", type="string", length=255)
     */
    private $libelleCommune;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Quartier",mappedBy="commune")
     */
    private $quartiers;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codeCommune
     *
     * @param string $codeCommune
     * @return Commune
     */
    public function setCodeCommune($codeCommune)
    {
        $this->codeCommune = $codeCommune;

        return $this;
    }

    /**
     * Get codeCommune
     *
     * @return string 
     */
    public function getCodeCommune()
    {
        return $this->codeCommune;
    }

    /**
     * Set libelleCommune
     *
     * @param string $libelleCommune
     * @return Commune
     */
    public function setLibelleCommune($libelleCommune)
    {
        $this->libelleCommune = $libelleCommune;

        return $this;
    }

    /**
     * Get libelleCommune
     *
     * @return string 
     */
    public function getLibelleCommune()
    {
        return $this->libelleCommune;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poste
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PosteRepository")
 */
class Poste
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
     * @ORM\Column(name="libellePoste", type="string", length=255)
     */
    private $libellePoste;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Membre",mappedBy="poste")
     */
    private $membres;


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
     * Set codePoste
     *
     * @param string $codePoste
     * @return Poste
     */
    public function setCodePoste($codePoste)
    {
        $this->codePoste = $codePoste;

        return $this;
    }

    /**
     * Get codePoste
     *
     * @return string 
     */
    public function getCodePoste()
    {
        return $this->codePoste;
    }

    /**
     * Set libellePoste
     *
     * @param string $libellePoste
     * @return Poste
     */
    public function setLibellePoste($libellePoste)
    {
        $this->libellePoste = $libellePoste;

        return $this;
    }

    /**
     * Get libellePoste
     *
     * @return string 
     */
    public function getLibellePoste()
    {
        return $this->libellePoste;
    }
}

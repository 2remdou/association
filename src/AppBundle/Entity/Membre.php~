<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\MembreRepository")
 */
class Membre
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
     * @ORM\Column(name="nomMembre", type="string", length=255)
     */
    private $nomMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomMembre", type="string", length=255)
     */
    private $prenomMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Poste",inversedBy="membres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $poste;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Quartier",inversedBy="membres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quartier;
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
     * Set codeMembre
     *
     * @param string $codeMembre
     * @return Membre
     */
    public function setCodeMembre($codeMembre)
    {
        $this->codeMembre = $codeMembre;

        return $this;
    }

    /**
     * Get codeMembre
     *
     * @return string 
     */
    public function getCodeMembre()
    {
        return $this->codeMembre;
    }

    /**
     * Set nomMembre
     *
     * @param string $nomMembre
     * @return Membre
     */
    public function setNomMembre($nomMembre)
    {
        $this->nomMembre = $nomMembre;

        return $this;
    }

    /**
     * Get nomMembre
     *
     * @return string 
     */
    public function getNomMembre()
    {
        return $this->nomMembre;
    }

    /**
     * Set prenomMembre
     *
     * @param string $prenomMembre
     * @return Membre
     */
    public function setPrenomMembre($prenomMembre)
    {
        $this->prenomMembre = $prenomMembre;

        return $this;
    }

    /**
     * Get prenomMembre
     *
     * @return string 
     */
    public function getPrenomMembre()
    {
        return $this->prenomMembre;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Membre
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}

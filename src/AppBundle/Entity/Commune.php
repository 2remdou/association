<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Commune
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CommuneRepository")
 * @UniqueEntity("libelleCommune",message="Cette commune existe déjà")
 * @ExclusionPolicy("all")
 */
class Commune
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose()
     * @SerializedName("id")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="libelleCommune", type="string", length=255)
     * @Expose()
     * @SerializedName("libelleCommune")
     */
    private $libelleCommune;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Quartier",mappedBy="commune")
     * @Expose()
     * @SerializedName("quartiers")
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quartiers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add quartiers
     *
     * @param \AppBundle\Entity\Quartier $quartiers
     * @return Commune
     */
    public function addQuartier(\AppBundle\Entity\Quartier $quartiers)
    {
        $this->quartiers[] = $quartiers;

        return $this;
    }

    /**
     * Remove quartiers
     *
     * @param \AppBundle\Entity\Quartier $quartiers
     */
    public function removeQuartier(\AppBundle\Entity\Quartier $quartiers)
    {
        $this->quartiers->removeElement($quartiers);
    }

    /**
     * Get quartiers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuartiers()
    {
        return $this->quartiers;
    }
}

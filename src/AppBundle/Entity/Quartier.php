<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Quartier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\QuartierRepository")
 * @ExclusionPolicy("all")
 */
class Quartier
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
     * @ORM\Column(name="libelleQuartier", type="string", length=255)
     * @Expose()
     * @SerializedName("libelleQuartier")
     */
    private $libelleQuartier;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Commune",inversedBy="quartiers")
     * @ORM\JoinColumn(nullable=false)
     * @Expose()
     * @SerializedName("commune")
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Membre",mappedBy="quartier")
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
     * Set codeQuartier
     *
     * @param string $codeQuartier
     * @return Quartier
     */
    public function setCodeQuartier($codeQuartier)
    {
        $this->codeQuartier = $codeQuartier;

        return $this;
    }

    /**
     * Get codeQuartier
     *
     * @return string 
     */
    public function getCodeQuartier()
    {
        return $this->codeQuartier;
    }

    /**
     * Set libelleQuartier
     *
     * @param string $libelleQuartier
     * @return Quartier
     */
    public function setLibelleQuartier($libelleQuartier)
    {
        $this->libelleQuartier = $libelleQuartier;

        return $this;
    }

    /**
     * Get libelleQuartier
     *
     * @return string 
     */
    public function getLibelleQuartier()
    {
        return $this->libelleQuartier;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->membres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set commune
     *
     * @param \AppBundle\Entity\Commune $commune
     * @return Quartier
     */
    public function setCommune(\AppBundle\Entity\Commune $commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return \AppBundle\Entity\Commune 
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Add membres
     *
     * @param \AppBundle\Entity\Membre $membres
     * @return Quartier
     */
    public function addMembre(\AppBundle\Entity\Membre $membres)
    {
        $this->membres[] = $membres;

        return $this;
    }

    /**
     * Remove membres
     *
     * @param \AppBundle\Entity\Membre $membres
     */
    public function removeMembre(\AppBundle\Entity\Membre $membres)
    {
        $this->membres->removeElement($membres);
    }

    /**
     * Get membres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembres()
    {
        return $this->membres;
    }
}

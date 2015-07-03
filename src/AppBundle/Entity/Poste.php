<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Poste
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PosteRepository")
 * @ExclusionPolicy("all")
 */
class Poste
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
     * @ORM\Column(name="libellePoste", type="string", length=255)
     * @Expose()
     * @SerializedName("libellePoste")
     */
    private $libellePoste;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Membre",mappedBy="poste")
     */
    private $membres;

    /**
     * @var integer
     * @ORM\Column(name="ordreHierarchie",type="integer")
     * @Expose()
     * @SerializedName("orderHierarchie")
     */
    private $ordreHierarchie;
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->membres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add membres
     *
     * @param \AppBundle\Entity\Membre $membres
     * @return Poste
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

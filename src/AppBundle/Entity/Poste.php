<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\MaxDepth;

/**
 * Poste
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PosteRepository")
 * @ExclusionPolicy("all")
 * @ORM\HasLifecycleCallbacks()
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
     * @Expose()
     * @SerializedName("membres")
     * @MaxDepth(1)
     */
    private $membres;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Poste",inversedBy="subordonnees")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Expose()
     * @SerializedName("superieur")
     */
    private $superieur;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Poste",mappedBy="superieur")
     * @Expose()
     * @SerializedName("subordonnees")
     * @MaxDepth(1)
     */
    private $subordonnees;

    /**
     * @var integer
     * @ORM\Column(name="ordreHierarchie",type="integer")
     * @SerializedName("ordreHierarchie")
     * @Expose()
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

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(){
        if($this->getSuperieur() !== null){
            $this->setOrdreHierarchie($this->getSuperieur()->getOrdreHierarchie()+1);
        }else{
            $this->setOrdreHierarchie(0);
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function prePresist(){
        if($this->getSuperieur() !==null){
            $this->setOrdreHierarchie($this->getSuperieur()->getOrdreHierarchie()+1);
        }else{
            $this->setOrdreHierarchie(0);
        }
    }

    /**
     * Set ordreHierarchie
     *
     * @param integer $ordreHierarchie
     * @return Poste
     */
    public function setOrdreHierarchie($ordreHierarchie)
    {
        $this->ordreHierarchie = $ordreHierarchie;

        return $this;
    }

    /**
     * Get ordreHierarchie
     *
     * @return integer 
     */
    public function getOrdreHierarchie()
    {
        return $this->ordreHierarchie;
    }

    /**
     * Set superieur
     *
     * @param \AppBundle\Entity\Poste $superieur
     * @return Poste
     */
    public function setSuperieur(\AppBundle\Entity\Poste $superieur = null)
    {
        $this->superieur = $superieur;

        return $this;
    }

    /**
     * Get superieur
     *
     * @return \AppBundle\Entity\Poste 
     */
    public function getSuperieur()
    {
        return $this->superieur;
    }

    /**
     * Add subordonnees
     *
     * @param \AppBundle\Entity\Poste $subordonnees
     * @return Poste
     */
    public function addSubordonnee(\AppBundle\Entity\Poste $subordonnees)
    {
        $this->subordonnees[] = $subordonnees;

        return $this;
    }

    /**
     * Remove subordonnees
     *
     * @param \AppBundle\Entity\Poste $subordonnees
     */
    public function removeSubordonnee(\AppBundle\Entity\Poste $subordonnees)
    {
        $this->subordonnees->removeElement($subordonnees);
    }

    /**
     * Get subordonnees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubordonnees()
    {
        return $this->subordonnees;
    }
}

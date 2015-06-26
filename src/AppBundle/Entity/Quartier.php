<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quartier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\QuartierRepository")
 */
class Quartier
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
     * @ORM\Column(name="libelleQuartier", type="string", length=255)
     */
    private $libelleQuartier;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Commune",inversedBy="quartiers")
     * @ORM\JoinColumn(nullable=false)
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
}

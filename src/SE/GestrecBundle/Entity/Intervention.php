<?php

namespace SE\GestrecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention
 */
class Intervention
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateDeb;

    /**
     * @var \DateTime
     */
    private $dateFin;

    /**
     * @var string
     */
    private $complexite;

    /**
     * @var string
     */
    private $priorite;

    private $reclamation;

    private $intervenant;


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
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     * @return Intervention
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return \DateTime 
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Intervention
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set complexite
     *
     * @param string $complexite
     * @return Intervention
     */
    public function setComplexite($complexite)
    {
        $this->complexite = $complexite;

        return $this;
    }

    /**
     * Get complexite
     *
     * @return string 
     */
    public function getComplexite()
    {
        return $this->complexite;
    }

    /**
     * Set priorite
     *
     * @param string $priorite
     * @return Intervention
     */
    public function setPriorite($priorite)
    {
        $this->priorite = $priorite;

        return $this;
    }

    /**
     * Get priorite
     *
     * @return string 
     */
    public function getPriorite()
    {
        return $this->priorite;
    }

    /**
     * Set reclamation
     *
     * @param \SE\GestrecBundle\Entity\Reclamation $reclamation
     * @return Intervention
     */
    public function setReclamation(\SE\GestrecBundle\Entity\Reclamation $reclamation = null)
    {
        $this->reclamation = $reclamation;

        return $this;
    }

    /**
     * Get reclamation
     *
     * @return \SE\GestrecBundle\Entity\Reclamation 
     */
    public function getReclamation()
    {
        return $this->reclamation;
    }

    /**
     * Set intervenant
     *
     * @param \SE\GestrecBundle\Entity\Intervenant $intervenant
     * @return Intervention
     */
    public function setIntervenant(\SE\GestrecBundle\Entity\Intervenant $intervenant = null)
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    /**
     * Get intervenant
     *
     * @return \SE\GestrecBundle\Entity\Intervenant 
     */
    public function getIntervenant()
    {
        return $this->intervenant;
    }
}

<?php

namespace SE\GestrecBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 */
class Client
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $societe;


    private $reclamations;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
    }


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
     * Set nom
     *
     * @param string $nom
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set societe
     *
     * @param string $societe
     * @return Client
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string 
     */
    public function getSociete()
    {
        return $this->societe;
    }

    function __toString()
    {
       return $this->getNom().' '.$this->getPrenom();
    }



    /**
     * Add reclamations
     *
     * @param \SE\GestrecBundle\Entity\Reclamation $reclamations
     * @return Client
     */
    public function addReclamation(\SE\GestrecBundle\Entity\Reclamation $reclamations)
    {
        $this->reclamations[] = $reclamations;

        return $this;
    }

    /**
     * Remove reclamations
     *
     * @param \SE\GestrecBundle\Entity\Reclamation $reclamations
     */
    public function removeReclamation(\SE\GestrecBundle\Entity\Reclamation $reclamations)
    {
        $this->reclamations->removeElement($reclamations);
    }

    /**
     * Get reclamations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReclamations()
    {
        return $this->reclamations;
    }

    public function getCountReclamations()
    {
        return count($this->reclamations)*28;
    }
}

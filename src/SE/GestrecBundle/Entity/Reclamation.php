<?php

namespace SE\GestrecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 */
class Reclamation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $type;

    private $client;


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
     * Set description
     *
     * @param string $description
     * @return Reclamation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Reclamation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set client
     *
     * @param \SE\GestrecBundle\Entity\Client $client
     * @return Reclamation
     */
    public function setClient(\SE\GestrecBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \SE\GestrecBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    function __toString()
    {
       return $this->getDescription();
    }


}

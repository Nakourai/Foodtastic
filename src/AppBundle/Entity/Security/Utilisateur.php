<?php

namespace AppBundle\Entity\Security;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Business\Client;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Utilisateur
 *
 * @ORM\Table(name="security_utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Security\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="Attribution", mappedBy="utilisateur")
     */
    protected $attributions;
    
    /**
     *
     * @var Client 
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Business\Client", inversedBy="utilisateur")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * 
     */
    protected $client;
    
    
    public function __construct()
    {
        parent::construct();
        $this->attributions = new ArrayCollection();
    }

        /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * 
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * 
     * @param Client $client
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getAttributions(): ArrayCollection
    {
        return $this->attributions;
    }

    /**
     * 
     * @param ArrayCollection $attributions
     * @return $this
     */
    public function setAttributions(ArrayCollection $attributions)
    {
        $this->attributions = $attributions;
        return $this;
    }
    
    
    /**
     * 
     * @param ArrayCollection $attribution
     * @return $this
     */
    public function addAttributions(Attribution $attribution)
    {
        $this->attributions[] = $attribution;
        return $this;
    }

}


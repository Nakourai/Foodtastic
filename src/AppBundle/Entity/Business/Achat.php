<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 *
 * @ORM\Table(name="business_achat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\AchatRepository")
 */
class Achat
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateAchat", type="date")
     */
    protected $dateAchat;
    
    /**
     *
     * @var Client
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="achats")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    protected $client;
    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="ProduitAchete", mappedBy="achat")
     */
    protected $produitAchetes;

    /**
     * 
     */
    public function __construct()
    {
        $this->produitAchetes = new ArrayCollection();
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
     * Set dateAchat
     *
     * @param \DateTime $dateAchat
     *
     * @return Achat
     */
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    /**
     * Get dateAchat
     *
     * @return \DateTime
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }
    
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * 
     * @return \AppBundle\Entity\Business\ArrayCollection
     */
    public function getProduitAchetes(): ArrayCollection
    {
        return $this->produitAchetes;
    }

    /**
     * 
     * @param \AppBundle\Entity\Business\Client $client
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * 
     * @param \AppBundle\Entity\Business\ArrayCollection $produitAchetes
     * @return $this
     */
    public function setProduitAchetes(ArrayCollection $produitAchetes)
    {
        $this->produitAchetes = $produitAchetes;
        return $this;
    }

    /**
     * 
     * @param \AppBundle\Entity\Business\ProduitAchete $produitAchete
     * @return $this
     */
    public function addProduitAchete(ProduitAchete $produitAchete)
    {
        $this->produitAchetes[] = $produitAchete;
        return $this;
    }
}


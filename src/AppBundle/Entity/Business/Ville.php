<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ville
 *
 * @ORM\Table(name="business_ville")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\VilleRepository")
 */
class Ville
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    protected $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    protected $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", nullable=true)
     */
    protected $details;

    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="ProduitStocke", mappedBy="ville")
     */
    protected $produitStockes;
    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="Prix", mappedBy="ville")
     */
    protected $prixs;
    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="ProduitAchete", mappedBy="ville")
     */
    protected $produitAchetes;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Ville
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Ville
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Ville
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }
    
    /**
     * 
     * @return ArrayCollection
     */
    public function getProduitStockes(): ArrayCollection
    {
        return $this->produitStockes;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getPrixs(): ArrayCollection
    {
        return $this->prixs;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getProduitAchetes(): ArrayCollection
    {
        return $this->produitAchetes;
    }

    /**
     * 
     * @param ArrayCollection $produitStockes
     * @return $this
     */
    public function setProduitStockes(ArrayCollection $produitStockes)
    {
        $this->produitStockes = $produitStockes;
        return $this;
    }
    
    /**
     * 
     * @param \AppBundle\Entity\Business\ProduitStocke $produitStocke
     * @return $this
     */
    public function addProduitStockes(ProduitStocke $produitStocke)
    {
        $this->produitStockes[] = $produitStocke;
        return $this;
    }

    /**
     * 
     * @param ArrayCollection $prixs
     * @return $this
     */
    public function setPrixs(ArrayCollection $prixs)
    {
        $this->prixs = $prixs;
        return $this;
    }
    
    /**
     * 
     * @param Prix $prix
     * @return $this
     */
    public function addPrix(Prix $prix)
    {
        $this->prixs[] = $prix;
        return $this;
    }

    /**
     * 
     * @param ArrayCollection $produitAchetes
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


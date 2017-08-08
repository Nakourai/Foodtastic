<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorie
 *
 * @ORM\Table(name="business_categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="details", type="text", nullable=true)
     */
    protected $details;
    
    /**
     *
     * @var Doctrine\Common\Collections\ArrayCollection 
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="categorie")
     */
    protected $produits;


    public function __construct()
    {
        $this->produits = new ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Categorie
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
     * Set details
     *
     * @param string $details
     *
     * @return Categorie
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
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getProduits(): ArrayCOllection
    {
        return $this->produits;
    }

    /**
     * 
     * @param Doctrine\Common\Collections\ArrayCollection $produits
     * @return $this
     */
    public function setProduits(ArrayCOllection $produits)
    {
        $this->produits = $produits;
        return $this;
    }
    
    /**
     * 
     * @param \AppBundle\Entity\Business\Produit $produit
     * @return $this
     */
    public function addProduit(ArrayCOllection $produit)
    {
        $this->produits[] = $produit;
        return $this;
    }



}


<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Produit
 *
 * @ORM\Table(name="business_produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    protected $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     */
    protected $dateCreation;
    
    /**
     *
     * @var Categorie 
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="produits")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    protected $categorie;
    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="Image", mappedBy="produit")
     */
    protected $images;
    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="ProduitStocke", mappedBy="produit")
     */
    protected $produitStockes;
    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="Prix", mappedBy="produit")
     */
    protected $prixs;
    
    /**
     *
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="ProduitAchete", mappedBy="produit")
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
     * @return Produit
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Produit
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
    
    /**
     * 
     * @return \AppBundle\Entity\Business\Categorie
     */
    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }

    /**
     * 
     * @param \AppBundle\Entity\Business\Categorie $categorie
     * @return $this
     */
    public function setCategorie(Categorie $categorie)
    {
        $this->categorie = $categorie;
        return $this;
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


<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitStocke
 *
 * @ORM\Table(name="business_produit_stocke")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\ProduitStockeRepository")
 */
class ProduitStocke
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
     * @ORM\Column(name="dateStock", type="string", length=255)
     */
    protected $dateStock;

    /**
     * @var string
     *
     * @ORM\Column(name="quantiteStock", type="string", length=255)
     */
    protected $quantiteStock;

    /**
     *
     * @var Produit 
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="produitStockes")
     */
    protected $produit;
    
    /**
     *
     * @var Ville 
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="produitStockes")
     */
    protected $ville;

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
     * Set dateStock
     *
     * @param string $dateStock
     *
     * @return ProduitStocke
     */
    public function setDateStock($dateStock)
    {
        $this->dateStock = $dateStock;

        return $this;
    }

    /**
     * Get dateStock
     *
     * @return string
     */
    public function getDateStock()
    {
        return $this->dateStock;
    }

    /**
     * Set quantiteStock
     *
     * @param string $quantiteStock
     *
     * @return ProduitStocke
     */
    public function setQuantiteStock($quantiteStock)
    {
        $this->quantiteStock = $quantiteStock;

        return $this;
    }

    /**
     * Get quantiteStock
     *
     * @return string
     */
    public function getQuantiteStock()
    {
        return $this->quantiteStock;
    }
    
    /**
     * 
     * @return \AppBundle\Entity\Business\Produit
     */
    public function getProduit(): Produit
    {
        return $this->produit;
    }

    /**
     * 
     * @return \AppBundle\Entity\Business\Ville
     */
    public function getVille(): Ville
    {
        return $this->ville;
    }

    /**
     * 
     * @param \AppBundle\Entity\Business\Produit $produit
     * @return $this
     */
    public function setProduit(Produit $produit)
    {
        $this->produit = $produit;
        return $this;
    }

    /**
     * 
     * @param \AppBundle\Entity\Business\Ville $ville
     * @return $this
     */
    public function setVille(Ville $ville)
    {
        $this->ville = $ville;
        return $this;
    }
}


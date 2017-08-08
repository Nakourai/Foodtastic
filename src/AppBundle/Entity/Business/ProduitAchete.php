<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitAchete
 *
 * @ORM\Table(name="business_produit_achete")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\ProduitAcheteRepository")
 */
class ProduitAchete
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
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    protected $quantite;
    
    /**
     *
     * @var Achat
     * @ORM\ManyToOne(targetEntity="Achat", inversedBy="produitAchetes")
     * @ORM\JoinColumn(name="achat_id", referencedColumnName="id") 
     */
    protected $achat;
    
    /**
     *
     * @var Produit 
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="produitAchetes")
     */
    protected $produit;
    
    /**
     *
     * @var Ville 
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="produitAchetes")
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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return ProduitAchete
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    
    /**
     * 
     * @return \AppBundle\Entity\Business\Achat
     */
    public function getAchat(): Achat
    {
        return $this->achat;
    }

    /**
     * 
     * @param \AppBundle\Entity\Business\Achat $achat
     * @return $this
     */
    public function setAchat(Achat $achat)
    {
        $this->achat = $achat;
        return $this;
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


<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prix
 *
 * @ORM\Table(name="business_prix")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\PrixRepository")
 */
class Prix
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
     * @ORM\Column(name="dateAssignation", type="datetime")
     */
    protected $dateAssignation;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    protected $montant;

    /**
     *
     * @var Produit 
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="prixs")
     */
    protected $produit;
    
    /**
     *
     * @var Ville 
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="prixs")
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
     * Set dateAssignation
     *
     * @param \DateTime $dateAssignation
     *
     * @return Prix
     */
    public function setDateAssignation($dateAssignation)
    {
        $this->dateAssignation = $dateAssignation;

        return $this;
    }

    /**
     * Get dateAssignation
     *
     * @return \DateTime
     */
    public function getDateAssignation()
    {
        return $this->dateAssignation;
    }

    /**
     * Set montant
     *
     * @param float $montant
     *
     * @return Prix
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
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


<?php

namespace AppBundle\Entity\Security;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Role
 *
 * @ORM\Table(name="security_role")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Security\RoleRepository")
 */
class Role
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
     * @var ArrayCollection 
     * @ORM\OneToMany(targetEntity="Attribution", mappedBy="role")
     */
    protected $attributions;
    
    
    /**
     * The constructor 
     */
    public function __construct()
    {
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Role
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
     * @return Role
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


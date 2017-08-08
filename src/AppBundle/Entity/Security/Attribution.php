<?php

namespace AppBundle\Entity\Security;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribution
 *
 * @ORM\Table(name="security_attribution")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Security\AttributionRepository")
 */
class Attribution
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
     * @ORM\Column(name="dateAttribution", type="date")
     */
    protected $dateAttribution;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255)
     */
    protected $motif;
    
    /**
     *
     * @var Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="attributions")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id") 
     */
    protected $utilisateur;
    
    /**
     *
     * @var Role 
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="attributions")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $role;


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
     * Set dateAttribution
     *
     * @param \DateTime $dateAttribution
     *
     * @return Attribution
     */
    public function setDateAttribution($dateAttribution)
    {
        $this->dateAttribution = $dateAttribution;

        return $this;
    }

    /**
     * Get dateAttribution
     *
     * @return \DateTime
     */
    public function getDateAttribution()
    {
        return $this->dateAttribution;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Attribution
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }
}


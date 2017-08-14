<?php

namespace AppBundle\Entity\Business;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="business_image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Business\ImageRepository")
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fichierSource", type="string", length=255)
     */
    private $fichierSource;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    
    /**
     *
     * @var Produit 
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="images")
     */
    protected $produit;


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
     * Set fichierSource
     *
     * @param string $fichierSource
     *
     * @return Image
     */
    public function setFichierSource($fichierSource)
    {
        $this->fichierSource = $fichierSource;

        return $this;
    }

    /**
     * Get fichierSource
     *
     * @return string
     */
    public function getFichierSource()
    {
        return $this->fichierSource;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Image
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}


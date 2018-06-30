<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur extends BaseUser
{
    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personne", referencedColumnName="id_personne")
     * })
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $id
     *
     * @return Utilisateur
     */
    public function setId(\FFN\NatationBundle\Entity\Personne $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get idPersonne.
     *
     * @return \FFN\NatationBundle\Entity\Personne
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get idPersonne.
     *
     * @return \FFN\NatationBundle\Entity\Personne
     */
    public function getPersonne()
    {
        return $this->id;
    }
}

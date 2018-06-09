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
    private $idPersonne;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $idPersonne
     *
     * @return Utilisateur
     */
    public function setIdPersonne(\FFN\NatationBundle\Entity\Personne $idPersonne)
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    /**
     * Get idPersonne.
     *
     * @return \FFN\NatationBundle\Entity\Personne
     */
    public function getIdPersonne()
    {
        return $this->idPersonne;
    }
}

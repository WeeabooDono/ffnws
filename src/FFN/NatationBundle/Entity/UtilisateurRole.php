<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateurRole
 *
 * @ORM\Table(name="utilisateur_role", indexes={@ORM\Index(name="IDX_9EE8E6505F15257A", columns={"id_personne"}), @ORM\Index(name="IDX_9EE8E650DC499668", columns={"id_role"}), @ORM\Index(name="IDX_9EE8E650AD18E146", columns={"id_competition"})})
 * @ORM\Entity
 */
class UtilisateurRole
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="rang", type="integer", nullable=true)
     */
    private $rang;

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
    private $personne;

    /**
     * @var \Role
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="id_role")
     * })
     */
    private $role;

    /**
     * @var \Competition
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Competition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_competition", referencedColumnName="id_competition")
     * })
     */
    private $competition;



    /**
     * Set rang.
     *
     * @param int|null $rang
     *
     * @return UtilisateurRole
     */
    public function setRang($rang = null)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang.
     *
     * @return int|null
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $personne
     *
     * @return UtilisateurRole
     */
    public function setPersonne(\FFN\NatationBundle\Entity\Personne $personne)
    {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get idPersonne.
     *
     * @return \FFN\NatationBundle\Entity\Personne
     */
    public function getPersonne()
    {
        return $this->personne;
    }

    /**
     * Set idRole.
     *
     * @param \FFN\NatationBundle\Entity\Role $role
     *
     * @return UtilisateurRole
     */
    public function setRole(\FFN\NatationBundle\Entity\Role $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get idRole.
     *
     * @return \FFN\NatationBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set idCompetition.
     *
     * @param \FFN\NatationBundle\Entity\Competition $competition
     *
     * @return UtilisateurRole
     */
    public function setCompetition(\FFN\NatationBundle\Entity\Competition $competition)
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * Get idCompetition.
     *
     * @return \FFN\NatationBundle\Entity\Competition
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Get idUtilisateurRole.
     *
     * @return \FFN\NatationBundle\Entity\UtilisateurRole
     */
    public function getIdUtilisateurRole()
    {
        return uniqid();
    }
}

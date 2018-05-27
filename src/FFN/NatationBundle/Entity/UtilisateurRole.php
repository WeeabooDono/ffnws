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
    private $idPersonne;

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
    private $idRole;

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
    private $idCompetition;



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
     * @param \FFN\NatationBundle\Entity\Personne $idPersonne
     *
     * @return UtilisateurRole
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

    /**
     * Set idRole.
     *
     * @param \FFN\NatationBundle\Entity\Role $idRole
     *
     * @return UtilisateurRole
     */
    public function setIdRole(\FFN\NatationBundle\Entity\Role $idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get idRole.
     *
     * @return \FFN\NatationBundle\Entity\Role
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * Set idCompetition.
     *
     * @param \FFN\NatationBundle\Entity\Competition $idCompetition
     *
     * @return UtilisateurRole
     */
    public function setIdCompetition(\FFN\NatationBundle\Entity\Competition $idCompetition)
    {
        $this->idCompetition = $idCompetition;

        return $this;
    }

    /**
     * Get idCompetition.
     *
     * @return \FFN\NatationBundle\Entity\Competition
     */
    public function getIdCompetition()
    {
        return $this->idCompetition;
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

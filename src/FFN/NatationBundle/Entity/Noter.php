<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noter
 *
 * @ORM\Table(name="noter", indexes={@ORM\Index(name="IDX_761C961A2AE5FF3", columns={"id_equipe"}), @ORM\Index(name="IDX_761C961AAD18E146", columns={"id_competition"}), @ORM\Index(name="IDX_761C961A5F15257A", columns={"id_personne"})})
 * @ORM\Entity
 */
class Noter
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="note", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var \Equipe
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe", referencedColumnName="id_equipe")
     * })
     */
    private $equipe;

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
     * Set note.
     *
     * @param int|null $note
     *
     * @return Noter
     */
    public function setNote($note = null)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return int|null
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set idEquipe.
     *
     * @param \FFN\NatationBundle\Entity\Equipe $equipe
     *
     * @return Noter
     */
    public function setEquipe(\FFN\NatationBundle\Entity\Equipe $equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get idEquipe.
     *
     * @return \FFN\NatationBundle\Entity\Equipe
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set idCompetition.
     *
     * @param \FFN\NatationBundle\Entity\Competition $competition
     *
     * @return Noter
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
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $idpersonnepersonne
     *
     * @return Noter
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
     * Get idNoter.
     *
     * @return \FFN\NatationBundle\Entity\Noter
     */
    public function getIdNoter()
    {
        return uniqid();
    }

}

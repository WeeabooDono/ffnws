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
    private $idEquipe;

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
     * @param \FFN\NatationBundle\Entity\Equipe $idEquipe
     *
     * @return Noter
     */
    public function setIdEquipe(\FFN\NatationBundle\Entity\Equipe $idEquipe)
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }

    /**
     * Get idEquipe.
     *
     * @return \FFN\NatationBundle\Entity\Equipe
     */
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * Set idCompetition.
     *
     * @param \FFN\NatationBundle\Entity\Competition $idCompetition
     *
     * @return Noter
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
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $idPersonne
     *
     * @return Noter
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
     * Get idNoter.
     *
     * @return \FFN\NatationBundle\Entity\Noter
     */
    public function getIdNoter()
    {
        return uniqid();
    }

}

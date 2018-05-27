<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe", indexes={@ORM\Index(name="IDX_2449BA1533CE2470", columns={"id_club"})})
 * @ORM\Entity
 */
class Equipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_equipe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="equipe_id_equipe_seq", allocationSize=1, initialValue=1)
     */
    private $idEquipe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_creation", type="date", nullable=true)
     */
    private $dateCreation;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_actif", type="boolean", nullable=true)
     */
    private $isActif;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_club", referencedColumnName="id_club")
     * })
     */
    private $idClub;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personne", mappedBy="idEquipe")
     */
    private $idPersonne;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPersonne = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idEquipe.
     *
     * @return int
     */
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * Set nom.
     *
     * @param string|null $nom
     *
     * @return Equipe
     */
    public function setNom($nom = null)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string|null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateCreation.
     *
     * @param \DateTime|null $dateCreation
     *
     * @return Equipe
     */
    public function setDateCreation($dateCreation = null)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation.
     *
     * @return \DateTime|null
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set isActif.
     *
     * @param bool|null $isActif
     *
     * @return Equipe
     */
    public function setIsActif($isActif = null)
    {
        $this->isActif = $isActif;

        return $this;
    }

    /**
     * Get isActif.
     *
     * @return bool|null
     */
    public function getIsActif()
    {
        return $this->isActif;
    }

    /**
     * Set idClub.
     *
     * @param \FFN\NatationBundle\Entity\Club|null $idClub
     *
     * @return Equipe
     */
    public function setIdClub(\FFN\NatationBundle\Entity\Club $idClub = null)
    {
        $this->idClub = $idClub;

        return $this;
    }

    /**
     * Get idClub.
     *
     * @return \FFN\NatationBundle\Entity\Club|null
     */
    public function getIdClub()
    {
        return $this->idClub;
    }

    /**
     * Add idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $idPersonne
     *
     * @return Equipe
     */
    public function addIdPersonne(\FFN\NatationBundle\Entity\Personne $idPersonne)
    {
        $this->idPersonne[] = $idPersonne;

        return $this;
    }

    /**
     * Remove idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $idPersonne
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdPersonne(\FFN\NatationBundle\Entity\Personne $idPersonne)
    {
        return $this->idPersonne->removeElement($idPersonne);
    }

    /**
     * Get idPersonne.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdPersonne()
    {
        return $this->idPersonne;
    }
}

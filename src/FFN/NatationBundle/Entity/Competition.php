<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competition
 *
 * @ORM\Table(name="competition", indexes={@ORM\Index(name="IDX_B5082CB1A57761AB", columns={"id_lieu"})})
 * @ORM\Entity
 */
class Competition
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_competition", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="competition_id_competition_seq", allocationSize=1, initialValue=1)
     */
    private $idCompetition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var \Lieu
     *
     * @ORM\ManyToOne(targetEntity="Lieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lieu", referencedColumnName="id_lieu")
     * })
     */
    private $idLieu;



    /**
     * Get idCompetition.
     *
     * @return int
     */
    public function getIdCompetition()
    {
        return $this->idCompetition;
    }

    /**
     * Set nom.
     *
     * @param string|null $nom
     *
     * @return Competition
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
     * Set dateDebut.
     *
     * @param \DateTime|null $dateDebut
     *
     * @return Competition
     */
    public function setDateDebut($dateDebut = null)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut.
     *
     * @return \DateTime|null
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin.
     *
     * @param \DateTime|null $dateFin
     *
     * @return Competition
     */
    public function setDateFin($dateFin = null)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin.
     *
     * @return \DateTime|null
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set idLieu.
     *
     * @param \FFN\NatationBundle\Entity\Lieu|null $idLieu
     *
     * @return Competition
     */
    public function setIdLieu(\FFN\NatationBundle\Entity\Lieu $idLieu = null)
    {
        $this->idLieu = $idLieu;

        return $this;
    }

    /**
     * Get idLieu.
     *
     * @return \FFN\NatationBundle\Entity\Lieu|null
     */
    public function getIdLieu()
    {
        return $this->idLieu;
    }
}

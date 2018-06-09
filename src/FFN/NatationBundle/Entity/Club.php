<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club", indexes={@ORM\Index(name="IDX_B1EF3892A477615B", columns={"id_lieu"}), @ORM\Index(name="IDX_B8EE38725F15257A", columns={"id_personne"})})
 * @ORM\Entity
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_club", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="club_id_club_seq", allocationSize=1, initialValue=1)
     */
    private $idClub;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

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
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personne", referencedColumnName="id_personne")
     * })
     */
    private $idPersonne;



    /**
     * Get idClub.
     *
     * @return int
     */
    public function getIdClub()
    {
        return $this->idClub;
    }

    /**
     * Set nom.
     *
     * @param string|null $nom
     *
     * @return Club
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
     * Set idLieu.
     *
     * @param \FFN\NatationBundle\Entity\Lieu|null $idLieu
     *
     * @return Club
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

    /**
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne|null $idPersonne
     *
     * @return Club
     */
    public function setIdPersonne(\FFN\NatationBundle\Entity\Personne $idPersonne = null)
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    /**
     * Get idPersonne.
     *
     * @return \FFN\NatationBundle\Entity\Personne|null
     */
    public function getIdPersonne()
    {
        return $this->idPersonne;
    }
}

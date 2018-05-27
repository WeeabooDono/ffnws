<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composer
 *
 * @ORM\Table(name="Composer", indexes={@ORM\Index(name="IDX_761C961A27E0FF8", columns={"id_equipe"}), @ORM\Index(name="IDX_761C961A5F15257A", columns={"id_personne"})})
 * @ORM\Entity
 */
class Composer
{
    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_actif", type="boolean", nullable=true)
     */
    private $isActif;

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
     * Set isActif.
     *
     * @param bool|null $isActif
     *
     * @return Composer
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
     * Set idEquipe.
     *
     * @param \FFN\NatationBundle\Entity\Equipe $idEquipe
     *
     * @return Composer
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
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $idPersonne
     *
     * @return Composer
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
     * Get idPComposer.
     *
     * @return \FFN\NatationBundle\Entity\Composer
     */
    public function getIdComposer()
    {
        return uniqid();
    }
}

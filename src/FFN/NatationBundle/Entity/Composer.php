<?php

namespace FFN\NatationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composer
 *
 * @ORM\Table(name="equipe_personne", indexes={@ORM\Index(name="IDX_761C981A27E0CE8", columns={"id_equipe"}), @ORM\Index(name="IDX_761C961A5F15257A", columns={"id_personne"})})
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
    private $equipe;

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
     * @param \FFN\NatationBundle\Entity\Equipe $equipe
     *
     * @return Composer
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
     * Set idPersonne.
     *
     * @param \FFN\NatationBundle\Entity\Personne $personne
     *
     * @return Composer
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
     * Get idPComposer.
     *
     * @return \FFN\NatationBundle\Entity\Composer
     */
    public function getIdComposer()
    {
        return uniqid();
    }
}

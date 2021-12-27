<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\ORM\Mapping as ORM;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
class Competition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $event;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="competitions")
     */
    private $equipe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $afficher;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $heureBis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString() {

        return $this->getType() AND
         $this->getHeureBis()->format('Y-m-d H:i:s');
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function setEvent(?string $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getAfficher(): ?bool
    {
        return $this->afficher;
    }

    public function setAfficher(bool $afficher): self
    {
        $this->afficher = $afficher;

        return $this;
    }

    public function getHeureBis(): ?\DateTimeInterface
    {
        return $this->heureBis;
    }

    public function setHeureBis(?\DateTimeInterface $heureBis): self
    {
        $this->heureBis = $heureBis;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }
}

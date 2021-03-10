<?php

namespace App\Entity;

use App\Repository\DivorceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DivorceRepository::class)
 * @ORM\Table(name="divorces")
 */
class Divorce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_etablissement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $decision_number;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_decision;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEtablissement(): ?\DateTimeInterface
    {
        return $this->date_etablissement;
    }

    public function setDateEtablissement(\DateTimeInterface $date_etablissement): self
    {
        $this->date_etablissement = $date_etablissement;

        return $this;
    }

    public function getDecisionNumber(): ?string
    {
        return $this->decision_number;
    }

    public function setDecisionNumber(string $decision_number): self
    {
        $this->decision_number = $decision_number;

        return $this;
    }

    public function getDateDecision(): ?\DateTimeInterface
    {
        return $this->date_decision;
    }

    public function setDateDecision(\DateTimeInterface $date_decision): self
    {
        $this->date_decision = $date_decision;

        return $this;
    }
}

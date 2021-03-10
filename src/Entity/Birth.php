<?php

namespace App\Entity;

use App\Repository\BirthRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BirthRepository::class)
 * @ORM\Table(name="births")
 */
class Birth
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
    private $date_declaration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_declaration;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $judgment_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeclaration(): ?\DateTimeInterface
    {
        return $this->date_declaration;
    }

    public function setDateDeclaration(\DateTimeInterface $date_declaration): self
    {
        $this->date_declaration = $date_declaration;

        return $this;
    }

    public function getTypeDeclaration(): ?string
    {
        return $this->type_declaration;
    }

    public function setTypeDeclaration(string $type_declaration): self
    {
        $this->type_declaration = $type_declaration;

        return $this;
    }

    public function getJudgmentNumber(): ?string
    {
        return $this->judgment_number;
    }

    public function setJudgmentNumber(string $judgment_number): self
    {
        $this->judgment_number = $judgment_number;

        return $this;
    }
}

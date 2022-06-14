<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity=RepairType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairType;

    /**
     * @ORM\ManyToOne(targetEntity=RepairKind::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $repairKind;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getRepairType(): ?RepairType
    {
        return $this->repairType;
    }

    public function setRepairType(?RepairType $repairType): self
    {
        $this->repairType = $repairType;

        return $this;
    }

    public function getRepairKind(): ?RepairKind
    {
        return $this->repairKind;
    }

    public function setRepairKind(?RepairKind $repairKind): self
    {
        $this->repairKind = $repairKind;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ArticleToolBindRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleToolBindRepository::class)
 */
class ArticleToolBind
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $articleId;

    /**
     * @ORM\Column(type="integer")
     */
    private $toolId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleId(): ?int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;

        return $this;
    }

    public function getToolId(): ?int
    {
        return $this->toolId;
    }

    public function setToolId(int $toolId): self
    {
        $this->toolId = $toolId;

        return $this;
    }
}

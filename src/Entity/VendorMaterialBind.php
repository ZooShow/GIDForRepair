<?php

namespace App\Entity;

use App\Repository\VendorMaterialBindRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VendorMaterialBindRepository::class)
 */
class VendorMaterialBind
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
    private $vendorId;

    /**
     * @ORM\Column(type="integer")
     */
    private $toolId;

    /**
     * @ORM\Column(type="float")
     */
    private $cost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVendorId(): ?int
    {
        return $this->vendorId;
    }

    public function setVendorId(int $vendorId): self
    {
        $this->vendorId = $vendorId;

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

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

        return $this;
    }
}

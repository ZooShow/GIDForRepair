<?php

namespace App\Entity;

use App\Repository\RepairTypeKindBindRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepairTypeKindBindRepository::class)
 */
class RepairTypeKindBind
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
    private $repairTypeId;

    /**
     * @ORM\Column(type="integer")
     */
    private $repairKindId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairTypeId(): ?int
    {
        return $this->repairTypeId;
    }

    public function setRepairTypeId(int $repairTypeId): self
    {
        $this->repairTypeId = $repairTypeId;

        return $this;
    }

    public function getRepairKindId(): ?int
    {
        return $this->repairKindId;
    }

    public function setRepairKindId(int $repairKindId): self
    {
        $this->repairKindId = $repairKindId;

        return $this;
    }
}

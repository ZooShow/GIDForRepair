<?php

namespace App\Service;

use App\Repository\RepairKindRepository;
use App\Repository\RepairTypeKindBindRepository;
use App\Repository\RepairTypeRepository;

class RepairService
{
    private RepairTypeRepository $repairTypeRepository;

    private RepairKindRepository $repairKindRepository;

    private RepairTypeKindBindRepository $repairTypeKindBindRepository;

    public function __construct(
        RepairTypeKindBindRepository $repairTypeKindBindRepository,
        RepairTypeRepository $repairTypeRepository,
        RepairKindRepository $repairKindRepository
    ) {
        $this->repairKindRepository = $repairKindRepository;
        $this->repairTypeKindBindRepository = $repairTypeKindBindRepository;
        $this->repairTypeRepository = $repairTypeRepository;
    }

    public function getRepairKindTypeBind(): array
    {
        $repairKinds = $this->repairKindRepository->findAll();
        $tmp = [];
        foreach ($repairKinds as $repairKind) {
            $repairTypeKindBinds = $this->repairTypeKindBindRepository->findBy(['repairKindId' => $repairKind->getId()]);
            $value = [];
            foreach ($repairTypeKindBinds as $repairTypeKindBind) {
                $repairType = $this->repairTypeRepository->find($repairTypeKindBind->getRepairTypeId());
                $value[] = [
                    'id' => $repairType->getId(),
                    'name' => $repairType->getName()
                ];
            }
            $tmp [$repairKind->getName()] = [
                'id' => $repairKind->getId(),
                'repair_type' => $value
            ];
        }
        return $tmp;
    }
}
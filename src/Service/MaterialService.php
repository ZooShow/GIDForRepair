<?php

namespace App\Service;

use App\Repository\MaterialRepository;
use App\Repository\VendorMaterialBindRepository;
use App\Repository\VendorRepository;

class MaterialService
{
    private MaterialRepository $materialRepository;

    private VendorMaterialBindRepository $vendorMaterialBindRepository;

    private VendorRepository $vendorRepository;

    public function __construct(
        MaterialRepository $materialRepository,
        VendorMaterialBindRepository $vendorMaterialBindRepository,
        VendorRepository $vendorRepository
    ) {
        $this->materialRepository = $materialRepository;
        $this->vendorMaterialBindRepository = $vendorMaterialBindRepository;
        $this->vendorRepository = $vendorRepository;
    }

    public function getMaterialById(int $id): array
    {
        $materialVendors = $this->vendorMaterialBindRepository->findBy(['toolId' => $id]);
        $material = $this->materialRepository->find($id);
        $tmp = [];
        foreach ($materialVendors as $item) {
            $vendor = $this->vendorRepository->find($item->getVendorId());
            $cost = '';
            $calculationType = $material->getCalculationType()->getName();
            if ($calculationType === 'by area') {
                $cost = 'руб. на м²';
            } elseif ($calculationType === 'by peace') {
                $cost = 'руб. за штуку';
            } else {
                $cost = 'руб. за м';
            }

            $tmp [] = [
                'id' => $vendor->getId(),
                'name' => $vendor->getName(),
                'address' => $vendor->getAddres(),
                'cost' => $item->getCost() . $cost
            ];
        }

        return [
            'name' => $material->getName(),
            'src' => $material->getSrc(),
            'description' => $material->getDescription(),
            'vendors' => $tmp
        ];
    }
}
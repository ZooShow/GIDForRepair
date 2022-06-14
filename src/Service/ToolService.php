<?php

namespace App\Service;

use App\Repository\ToolRepository;
use App\Repository\VendorRepository;
use App\Repository\VendorToolBindRepository;

class ToolService
{
    private VendorToolBindRepository $vendorToolBindRepository;

    private VendorRepository $vendorRepository;

    private ToolRepository $toolRepository;

    public function __construct(
        ToolRepository $toolRepository,
        VendorToolBindRepository $vendorToolBindRepository,
        VendorRepository $vendorRepository
    ) {
        $this->toolRepository = $toolRepository;
        $this->vendorToolBindRepository = $vendorToolBindRepository;
        $this->vendorRepository = $vendorRepository;
    }

    public function getToolById(int $id): array
    {
        $toolVendors = $this->vendorToolBindRepository->findBy(['toolId' => $id]);
        $tmp = [];
        foreach ($toolVendors as $item) {
            $vendor = $this->vendorRepository->find($item->getVendorId());
            $tmp [] = [
                'id' => $vendor->getId(),
                'name' => $vendor->getName(),
                'address' => $vendor->getAddres(),
                'cost' => $item->getCost()
            ];
        }

        $tool = $this->toolRepository->find($id);

        return [
            'name' => $tool->getName(),
            'src' => $tool->getSrc(),
            'description' => $tool->getDescription(),
            'vendors' => $tmp
        ];
    }
}
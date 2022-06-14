<?php

namespace App\Service;


use App\Entity\Material;
use App\Entity\Vendor;
use App\Entity\VendorMaterialBind;
use App\Repository\ArticleMaterialBindRepository;
use App\Repository\ArticleRepository;
use App\Repository\ArticleToolBindRepository;
use App\Repository\MaterialRepository;
use App\Repository\ToolRepository;
use App\Repository\VendorMaterialBindRepository;
use App\Repository\VendorRepository;
use App\Repository\VendorToolBindRepository;

class CalculatorService
{
    private ToolRepository $toolRepository;

    private MaterialRepository $materialRepository;

    private ArticleToolBindRepository $articleToolBindRepository;

    private ArticleMaterialBindRepository $articleMaterialBindRepository;

    private VendorRepository $vendorRepository;

    private VendorToolBindRepository $vendorToolBindRepository;

    private VendorMaterialBindRepository $vendorMaterialBindRepository;

    public function __construct(
        ToolRepository $toolRepository,
        MaterialRepository $materialRepository,
        ArticleToolBindRepository $articleToolBindRepository,
        ArticleMaterialBindRepository $articleMaterialBindRepository,
        VendorRepository $vendorRepository,
        VendorToolBindRepository $vendorToolBindRepository,
        VendorMaterialBindRepository $vendorMaterialBindRepository
    ) {
        $this->toolRepository = $toolRepository;
        $this->materialRepository = $materialRepository;
        $this->articleToolBindRepository = $articleToolBindRepository;
        $this->articleMaterialBindRepository = $articleMaterialBindRepository;
        $this->vendorRepository = $vendorRepository;
        $this->vendorToolBindRepository = $vendorToolBindRepository;
        $this->vendorMaterialBindRepository = $vendorMaterialBindRepository;
    }

    public function calculateArea(array $points): float
    {
        $points[] = $points[0];
        $len = count($points);
        $area = 0;
        $x = $points[0]->x;
        $y = $points[0]->y;
        for ($i = 1; $i < $len; ++$i) {
            $area += $points[$i]->x * $y - $points[$i]->y * $x;
            $x = $points[$i]->x;
            $y = $points[$i]->y;
        }
        return abs($area / 2);
    }

    public function calulatePerim(array $points): float
    {
        $points[] = $points[0];
        $len = count($points);
        $perim = 0;
        $x = $points[0]->x;
        $y = $points[0]->y;
        for ($i = 1; $i < $len; ++$i) {
            $perim += sqrt((($points[$i]->x - $x) ** 2) + (($points[$i]->y - $y) ** 2));
            $x = $points[$i]->x;
            $y = $points[$i]->y;
        }
        return $perim;
    }

    private function calculateTool(int $articleId): array
    {
        return [];
    }

    private function calculateMaterial(
        Material $material,
        VendorMaterialBind $vendorMaterialBind,
        float $count,
        float $perim,
        float $area
    ): float {
        $calulationType = $material->getCalculationType();
        if ($calulationType === 'by area') {
            return $vendorMaterialBind->getCost() * $area * $count;
        } elseif ($calulationType === 'by peace') {
            return $vendorMaterialBind->getCost() * $count;
        }
        return $vendorMaterialBind->getCost() * $count * $perim;
    }

    public function calculateToolAndMaterial(int $articleId, float $perim, float $area): array
    {
        $articleToolArray = [];
        $articleTools = $this->articleToolBindRepository->findBy(['articleId' => $articleId]);
        foreach ($articleTools as $item) {
            $vendorTools = $this->vendorToolBindRepository->findBy(['toolId' => $item->getToolId()]);
            $vendorArray = [];
            $min = 0;
            foreach ($vendorTools as $vendorTool) {
                $vendor = $this->vendorRepository->find($vendorTool->getVendorId());
                if (round($vendorTool->getCost(), 2) < $min) {
                    $min = round($vendorTool->getCost(), 2);
                }
                $vendorArray[] = [
                    'vendor_name' => $vendor->getName(),
                    'vendor_id' => $vendor->getId(),
                    'cost' => round($vendorTool->getCost(), 2)
                ];
            }

            usort(
                $vendorArray, static function ($a, $b) {
                return $a['cost'] <=> $b['cost'];
            });

            $tool = $this->toolRepository->find($item->getToolId());
            $articleToolArray[] = [
                'tool_id' => $tool->getId(),
                'tool_name' => $tool->getName(),
                'vendors' => $vendorArray,
            ];
        }

        $articleMaterialArray = [];
        $articleMaterials = $this->articleMaterialBindRepository->findBy(['articleId' => $articleId]);
        foreach ($articleMaterials as $item) {
            $vendorMaterials = $this->vendorMaterialBindRepository->findBy(['toolId' => $item->getMaterialId()]);
            $vendorArray = [];
            foreach ($vendorMaterials as $vendorMaterial) {
                $vendor = $this->vendorRepository->find($vendorMaterial->getVendorId());
                $material = $this->materialRepository->find($vendorMaterial->getToolId());
                $cost = $this->calculateMaterial($material, $vendorMaterial, $item->getCount(), $perim, $area);
                $vendorArray[] = [
                    'vendor_name' => $vendor->getName(),
                    'vendor_id' => $vendor->getId(),
                    'cost' => round($cost, 2)
                ];
            }

            usort($vendorArray, function ($a, $b) {
                return $a['cost'] <=> $b['cost'];
            });

            $material = $this->materialRepository->find($item->getMaterialId());
            $articleMaterialArray[] = [
                'material_id' => $material->getId(),
                'material_name' => $material->getName(),
                'vendors' => $vendorArray,
            ];
        }

        $toolPrice = $this->getMinMaxAvgPrice($articleToolArray);
        $materialPrice = $this->getMinMaxAvgPrice($articleMaterialArray);

        return [
            'materials' => $articleMaterialArray,
            'material_price' => $materialPrice,
            'tool_price' => $toolPrice,
            'tools' => $articleToolArray,
            'area' => round($area, 2),
            'perimeter' => round($perim, 2)
        ];
    }

    private function getMinMaxAvgPrice(array $array): array
    {
        $min = 0;
        $max = 0;
        $avgAll = 0;
        foreach ($array as $vendors) {
            $min += $vendors['vendors'][0]['cost'];
            $max += end($vendors['vendors'])['cost'];
            $avg = 0;
            foreach ($vendors['vendors'] as $vendor) {
                $avg += $vendor['cost'];
            }
            $avgAll += $avg / count($vendors['vendors']);
        }
        return [
            'min' => $min,
            'max' => $max,
            'avg' => round($avgAll, 2)
        ];
    }
}
<?php

namespace App\Service;

use App\Entity\Article;
use App\Entity\ArticleMaterialBind;
use App\Entity\ArticleToolBind;
use App\Repository\ArticleMaterialBindRepository;
use App\Repository\ArticleRepository;
use App\Repository\ArticleToolBindRepository;
use App\Repository\MaterialRepository;
use App\Repository\RepairKindRepository;
use App\Repository\RepairTypeRepository;
use App\Repository\ToolRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService
{
    private ArticleRepository $articleRepository;

    private RepairKindRepository $repairKindRepository;

    private RepairTypeRepository $repairTypeRepository;

    private MaterialRepository $materialRepository;

    private ToolRepository $toolRepository;

    private UserRepository $userRepository;

    private ArticleMaterialBindRepository $articleMaterialBindRepository;

    private ArticleToolBindRepository $articleToolBindRepository;

    private EntityManagerInterface $em;

    public function __construct(
        ArticleRepository $articleRepository,
        RepairKindRepository $repairKindRepository,
        MaterialRepository $materialRepository,
        ToolRepository $toolRepository,
        RepairTypeRepository $repairTypeRepository,
        UserRepository $userRepository,
        ArticleToolBindRepository $articleToolBindRepository,
        ArticleMaterialBindRepository $articleMaterialBindRepository,
        EntityManagerInterface $em
    ) {
        $this->articleRepository = $articleRepository;
        $this->repairKindRepository = $repairKindRepository;
        $this->materialRepository = $materialRepository;
        $this->toolRepository = $toolRepository;
        $this->repairTypeRepository = $repairTypeRepository;
        $this->userRepository = $userRepository;
        $this->articleToolBindRepository = $articleToolBindRepository;
        $this->articleMaterialBindRepository = $articleMaterialBindRepository;
        $this->em = $em;
    }

    public function getCarouselView(int $id): array
    {
        $articles = $this->articleRepository->findBy(['repairKind' => $id], null, 3);
        $tmp = [];
        foreach ($articles as $article) {
            $text = $article->getText();
            $tmp[] = [
//                'header' => $this->getHeader($text),
                'header' => '<h5>'. $article->getRepairType()->getName() . '</h5>',
                'paragraph' => $this->getParagraph($text),
                'img' => $this->getImg($text),
                'id' => $article->getId()
            ];
        }
        return $tmp;
    }

    public function parseArticle(object $data): string
    {
        $blocks = $data->blocks;
        $str = '';
        foreach ($blocks as $block) {
            switch ($block->type) {
                case 'paragraph':
                    $str .= $this->parseParagraph($block);
                    break;
                case 'header':
                    $str .= '<div class="d-flex align-items-center justify-content-center">' .
                        $this->parseHeader($block) .
                        '</div>';
                    break;
                case 'image':
                    $str .= '<div class="d-flex align-items-center justify-content-center">' .
                        $this->parseImage($block) .
                        '</div>';
                    break;
                case 'list':
                    $str .= $this->parseList($block);
                    break;
                case 'checklist':
                    $str .= $this->parseChecklist($block);
                    break;
                case 'delimiter':
                    $str .= '<div class="d-flex align-items-center justify-content-center">' .
                        $this->parseDelimiter($block) .
                        '</div>';
                    break;
                case 'table':
                    $str .= '<div class="d-flex align-items-center justify-content-center">' .
                        $this->parseTabel($block) .
                        '</div>';
                    break;
                case 'embed':
                    $str .= '<div class="d-flex align-items-center justify-content-center">' .
                        $this->parseEmbed($block) .
                        '</div>';
                    break;
            }
        }
        return $str;
    }

    public function getArticlesByType(int $id): array
    {
        $repairKind = $this->repairKindRepository->find($id);
        $articles = $this->articleRepository->findBy(['repairKind'=>$repairKind]);
        $tmp = [];
        foreach ($articles as $article) {
            $text = $article->getText();
            $articleSerialize = [
//                'header' => $this->getHeader($text),
                'header' => '<h3>'. $article->getRepairType()->getName() . '</h3>',
                'paragraph' => $this->getParagraph($text),
                'img' => $this->getImg($text),
                'id' => $article->getId()
            ];
            $tmp[] = $articleSerialize;
        }
        return [
            'title' => $repairKind->getName(),
            'articles' => $tmp
        ];
    }

    private function getHeader(string $text): ?string
    {
        $pos1 = strpos($text, '<h');
        $pos2 = strpos($text, '</h');
        if ($pos1 && $pos2) {
            return substr($text, $pos1, $pos2-$pos1 + 5);
        }
        return null;
    }

    private function getParagraph(string $text): ?string
    {
        $pos1 = strpos($text, '<p');
        $pos2 = strpos($text, '</p');
        if ($pos1 && $pos2) {
            return substr($text, $pos1, $pos2-$pos1 + 4);
        }
        return null;
    }

    private function getImg(string $text): ?string
    {
        $pos1 = strpos($text, '<img');
        $pos2 = strpos($text, 'height="430"/>');
        if ($pos1 && $pos2) {
            return substr($text, $pos1, $pos2-$pos1 + 14);
        }
        return null;
    }

    private function parseEmbed(object $embed): string
    {
        return '<iframe width=' . $embed->data->width . ' height=' . $embed->data->height . ' allowfullscreen src="' . $embed->data->embed . '"></iframe>';
    }

    private function parseParagraph(object $paragraph): string
    {
        $text = $paragraph->data->text;
        return "<p>$text</p>";
    }

    private function parseHeader(object $header): string
    {
        $level = $header->data->level;
        $text = $header->data->text;
        return "<h$level>$text</h$level>";
    }

    // TODO сделать ченить с caption
    private function parseImage(object $image): string
    {
        $src = $image->data->file->url;
        $caption = $image->data->caption ?? 'caption';
        $result = '<figure class="figure">
            <img src="' . $src .
            '" class="figure-img img-fluid rounded shadow-3 mb-3" alt="' . $caption . '" width="650" height="430"/>
        <figcaption class="figure-caption">' . $caption . '</figcaption>
        </figure>';
        return $result;
    }

    private function parseList(object $list): string
    {
        $tmp = '';
        foreach ($list->data->items as $item) {
            $tmp .= '<li>' . $item . '</li>';
        }

        if ($list->data->style === 'ordered') {
            return '<ol>' . $tmp . '</ol>';
        }

        return '<ul>' . $tmp . '</ul>';
    }

    private function parseChecklist(object $checklist): string
    {
        $tmp = '';
        $i = 0;
        foreach ($checklist->data->items as $item) {
            $label = '<label class="form-check-label" for="flexCheckChecked' . $i . '">' . $item->text . '</label>';
            $input = '<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked' . $i . '"';
            if ($item->checked) {
                $input .= ' checked/>';
            } else {
                $input .= ' />';
            }
            $tmp .= '<div class="form-check">' . $input . $label . '</div>';
            ++$i;
        }
        return $tmp;
    }

    private function parseDelimiter(object $delimiter): string
    {
        return '<h1>***</h1>';
    }

    private function parseTabel(object $table): string
    {
        $tmp = '';
        foreach ($table->data->content as $item) {
            $tmp .= '<tr>';
            foreach ($item as $value) {
                $tmp .= '<td>' . $value . '</td>';
            }
            $tmp .= '</tr>';
        }
        return '<table class="table table-bordered">' . $tmp . '</table>';
    }

    public function getMaterials(): array
    {
        $materials = $this->materialRepository->findAll();
        $tmp = [];
        foreach ($materials as $material) {
            $tmp[] = [
                'id' => $material->getId(),
                'name' => $material->getName(),
                'calculation_type' => $material->getCalculationType()->getName()
            ];
        }
        return $tmp;
    }

    public function getTools(): array
    {
        $tools = $this->toolRepository->findAll();
        $tmp = [];
        foreach ($tools as $tool) {
            $tmp[] = [
                'id' => $tool->getId(),
                'name' => $tool->getName(),
            ];
        }
        return $tmp;
    }

    public function saveArticle(object $data, $userRequest)
    {
        $user = $this->userRepository->findOneBy(['email' => $userRequest->getUserIdentifier()]);
        $repairKind = $this->repairKindRepository->findOneBy(['name' => $data->repairKind]);
        $repairType = $this->repairTypeRepository->find((int)$data->repairType);
        $tmp = $this->parseArticle($data->article);
        $article = new Article();
        $article->setText($tmp);
        $article->setAuthor($user);
        $article->setRepairKind($repairKind);
        $article->setRepairType($repairType);

        $articleId = $this->articleRepository->save($article);

        foreach ($data->tools as $tool) {
            $toolEntity = $this->toolRepository->findOneBy(['name'=>$tool]);
            $articleToolBind = new ArticleToolBind;
            $articleToolBind->setArticleId($articleId);
            $articleToolBind->setToolId($toolEntity->getId());
            $this->em->persist($articleToolBind);
        }

        foreach ($data->materials as $material) {
            $materialEntity = $this->materialRepository->findOneBy(['name' => $material->name]);
            $articleMaterialBind = new ArticleMaterialBind;
            $articleMaterialBind->setArticleId($articleId);
            $articleMaterialBind->setMaterialId($materialEntity->getId());
            $articleMaterialBind->setCount($material->value);
            $this->em->persist($articleMaterialBind);
        }
        $this->em->flush();
    }

    public function getArticleById(int $id): array
    {
        $article = $this->articleRepository->find($id);

        $articleToolBind = $this->articleToolBindRepository->findBy(['articleId' => $id]);
        $tools = [];
        foreach ($articleToolBind as $item) {
            $tool = $this->toolRepository->find($item->getToolId());
            $tools[] = [
                'id' => $tool->getId(),
                'name' => $tool->getName(),
                'description' => $tool->getDescription(),
                'src' => $tool->getSrc()
            ];
        }

        $articleMaterialBind = $this->articleMaterialBindRepository->findBy(['articleId' => $id]);
        $materials = [];
        foreach ($articleMaterialBind as $item) {
            $material = $this->materialRepository->find($item->getMaterialId());
            $calculationType = $material->getCalculationType()->getName();

            if ($calculationType === 'by area') {
                $cost = 'у.е. на м²';
            } elseif ($calculationType === 'by peace') {
                $cost = 'штук';
            } else {
                $cost = 'у.е. на м';
            }
            $materials[] = [
                'id' => $material->getId(),
                'name' => $material->getName(),
                'description' => $material->getDescription(),
                'src' => $material->getSrc(),
                'count' => $item->getCount() . ' ' . $cost
            ];
        }

        return [
            'id' => $article->getId(),
            'repairKindId' => $article->getRepairKind()->getId(),
            'article' => $article->getText(),
            'author' => $article->getAuthor()->getName() . ' ' . $article->getAuthor()->getSecondName(),
            'tools' => $tools,
            'materials' => $materials,
            'comments' => $article->getComments()
        ];
    }
}
<?php

namespace App\Service;

use App\Repository\ArticleRepository;

class ArticleService
{
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

    private function parseImage(object $image): string
    {
        $src = $image->data->file->url;
        $caption = $image->data->caption;
        $result = '<figure class="figure">
            <img src="' . $src .
            '" class="figure-img img-fluid rounded shadow-3 mb-3" alt="Taking up Water with a Spoon" width="650" height="430"/>
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
}
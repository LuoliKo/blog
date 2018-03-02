<?php
/**
 * Created by PhpStorm.
 * User: LuoliKo
 * Date: 2018/3/1
 * Time: 10:51
 */

namespace App\Markdown;


class Markdown
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text)
    {
        $html = $this->parser->makeHtml($text);
        return $html;
    }
}
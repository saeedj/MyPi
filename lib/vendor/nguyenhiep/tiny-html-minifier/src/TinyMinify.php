<?php

namespace Nguyenhiep\Minifier;

use Nguyenhiep\Minifier\TinyHtmlMinifier;

class TinyMinify
{
    public static function html(string $html, array $options = []) : string
    {
        $minifier = new TinyHtmlMinifier($options);
        return $minifier->minify($html);
    }
}

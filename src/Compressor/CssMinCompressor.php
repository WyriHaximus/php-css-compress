<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Compressor;

use tubalmartin\CssMin\Minifier as CSSmin;
use WyriHaximus\Compress\CompressorInterface;

use function Safe\substr;
use function strpos;

final class CssMinCompressor implements CompressorInterface
{
    private CSSmin $cssMin;

    public function __construct()
    {
        $this->cssMin = new CSSmin();
    }

    public function compress(string $string): string
    {
        // If there's no selector, this must be an inline CSS attribute.
        if (strpos($string, '{') === false) {
            return $this->minifyInline($string);
        }

        return $this->cssMin->run($string);
    }

    private function minifyInline(string $string): string
    {
        // Get CssMin to compress inline CSS by adding and stripping a selector.
        $mock     = 'body{' . $string . '}';
        $minified = $this->compress($mock);

        if ($minified === '') {
            // Something went wrong, return initial input

            return $string;
        }

        return substr($minified, 5, -1);
    }
}

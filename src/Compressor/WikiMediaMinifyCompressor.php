<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Compressor;

use Wikimedia\Minify\CSSMin;
use WyriHaximus\Compress\CompressorInterface;

final class WikiMediaMinifyCompressor implements CompressorInterface
{
    public function compress(string $string): string
    {
        return CSSMin::minify($string);
    }
}

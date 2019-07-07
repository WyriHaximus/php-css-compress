<?php declare(strict_types=1);

namespace WyriHaximus\CssCompress\Compressor;

use MatthiasMullie\Minify\CSS;
use WyriHaximus\Compress\CompressorInterface;

final class MMMCSSCompressor implements CompressorInterface
{
    /**
     * {@inheritdoc}
     */
    public function compress(string $string): string
    {
        /** @psalm-suppress TooManyArguments */
        return (new CSS($string))->minify();
    }
}

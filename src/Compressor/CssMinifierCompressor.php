<?php declare(strict_types=1);

namespace WyriHaximus\CssCompress\Compressor;

use WebSharks\CssMinifier\Core;
use WyriHaximus\Compress\CompressorInterface;

final class CssMinifierCompressor implements CompressorInterface
{
    public function compress(string $string): string
    {
        return (string)Core::compress($string);
    }
}

<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Compressor;

use WebSharks\CssMinifier\Core;
use WyriHaximus\Compress\CompressorInterface;

use function is_string;

final class CssMinifierCompressor implements CompressorInterface
{
    public function compress(string $string): string
    {
        /**
         * @psalm-suppress MixedAssignment
         */
        $result = Core::compress($string);

        if (is_string($result)) {
            return $result;
        }

        return $string;
    }
}

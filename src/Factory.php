<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress;

use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\Compress\ReturnCompressor;
use WyriHaximus\Compress\SmallestResultCompressor;
use WyriHaximus\CssCompress\Compressor\CssMinCompressor;
use WyriHaximus\CssCompress\Compressor\CssMinifierCompressor;
use WyriHaximus\CssCompress\Compressor\MMMCSSCompressor;
use WyriHaximus\CssCompress\Compressor\WikiMediaMinifyCompressor;

final class Factory
{
    public static function construct(): CompressorInterface
    {
        return new CssMinCompressor();
    }

    public static function constructSmallest(): CompressorInterface
    {
        return new SmallestResultCompressor(
            new MMMCSSCompressor(),
            new CssMinCompressor(),
            new CssMinifierCompressor(),
            new WikiMediaMinifyCompressor(),
            new ReturnCompressor(),
        );
    }
}

<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress;

use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\Compress\ReturnCompressor;
use WyriHaximus\Compress\SmallestResultCompressor;
use WyriHaximus\CssCompress\Compressor\CssMinCompressor;
use WyriHaximus\CssCompress\Compressor\CssMinifierCompressor;
use WyriHaximus\CssCompress\Compressor\MMMCSSCompressor;
use WyriHaximus\CssCompress\Compressor\YUICSSCompressor;

use const WyriHaximus\Constants\Boolean\TRUE_;

final class Factory
{
    public static function construct(): CompressorInterface
    {
        return new CssMinCompressor();
    }

    /**
     * @param  bool $externalCompressors When set to false only use pure PHP compressors.
     */
    public static function constructSmallest(bool $externalCompressors = TRUE_): CompressorInterface
    {
        return new SmallestResultCompressor(
            new MMMCSSCompressor(),
            new CssMinCompressor(),
            new CssMinifierCompressor(),
            $externalCompressors ? new YUICSSCompressor() : new ReturnCompressor(),
            new ReturnCompressor()
        );
    }
}

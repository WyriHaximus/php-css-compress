<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests\Compressor;

use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\Compress\TestUtilities\AbstractCompressorTest;
use WyriHaximus\CssCompress\Compressor\WikiMediaMinifyCompressor;

final class WikiMediaMinifyCompressorTest extends AbstractCompressorTest
{
    protected function getCompressor(): CompressorInterface
    {
        return new WikiMediaMinifyCompressor();
    }
}

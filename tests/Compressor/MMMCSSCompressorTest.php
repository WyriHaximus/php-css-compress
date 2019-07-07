<?php declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests\Compressor;

use WyriHaximus\Compress\AbstractCompressorTest;
use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\CssCompress\Compressor\MMMCSSCompressor;

/**
 * @internal
 */
final class MMMCSSCompressorTest extends AbstractCompressorTest
{
    protected function getCompressor(): CompressorInterface
    {
        return new MMMCSSCompressor();
    }
}

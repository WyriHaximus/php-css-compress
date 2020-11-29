<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests\Compressor;

use ReflectionClass;
use WyriHaximus\Compress\AbstractCompressorTest;
use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\CssCompress\Compressor\YUICSSCompressor;
use YUI\Compressor as YUICompressor;

/**
 * @internal
 */
final class YUICSSCompressorTest extends AbstractCompressorTest
{
    public function testSetCorrectType(): void
    {
        $yui = (new ReflectionClass($this->compressor))->getProperty('yui');
        $yui->setAccessible(true);
        $yuiInstance = $yui->getValue($this->compressor);
        $options     = (new ReflectionClass(
            $yuiInstance
        ))->getProperty('_options');
        $options->setAccessible(true);

        self::assertSame(YUICompressor::TYPE_CSS, $options->getValue($yuiInstance)['type']);
    }

    protected function getCompressor(): CompressorInterface
    {
        return new YUICSSCompressor();
    }
}

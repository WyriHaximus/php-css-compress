<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests\Compressor;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\Compress\TestUtilities\AbstractCompressorTest;
use WyriHaximus\CssCompress\Compressor\CssMinifierCompressor;

final class CssMinifierCompressorTest extends AbstractCompressorTest
{
    /** @return iterable<array<string>> */
    public static function providerReturn(): iterable
    {
        yield [
            'p { background-color: #ffffff; font-size: 1px; }',
            'p{background-color: #FFF;font-size: 1px}',
        ];

        yield [
            '/* comments */
            p { background-color: #ffffff; font-size: 1px; }',
            'p{background-color: #FFF;font-size: 1px}',
        ];

        yield [
            'background-color: #FFFFFF ; ',
            'background-color: #FFF;',
        ];

        yield [
            'background-color: #FFFFFF; font-size: 14px
            ;
            ',
            'background-color: #FFF;font-size: 14px;',
        ];
    }

    #[DataProvider('providerReturn')]
    #[Test]
    public function return(string $input, string $expected): void
    {
        $actual = $this->compressor->compress($input);
        self::assertSame($expected, $actual);
    }

    protected function getCompressor(): CompressorInterface
    {
        return new CssMinifierCompressor();
    }
}

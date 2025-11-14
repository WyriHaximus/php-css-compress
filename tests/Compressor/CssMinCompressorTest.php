<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests\Compressor;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\Compress\TestUtilities\AbstractCompressorTest;
use WyriHaximus\CssCompress\Compressor\CssMinCompressor;

final class CssMinCompressorTest extends AbstractCompressorTest
{
    /** @return iterable<array<string>> */
    public static function providerReturn(): iterable
    {
        yield [
            '',
            '',
        ];

        yield [
            'p { background-color: #ffffff; font-size: 1px; }',
            'p{background-color:#fff;font-size:1px}',
        ];

        yield [
            '/* comments */
            p { background-color: #ffffff; font-size: 1px; }',
            'p{background-color:#fff;font-size:1px}',
        ];

        yield [
            'background-color: #FFFFFF ; ',
            'background-color:#fff',
        ];

        yield [
            'background-color: #FFFFFF; font-size: 14px
            ;
            ',
            'background-color:#fff;font-size:14px',
        ];
    }

    #[DataProvider('providerReturn')]
    #[Test]
    public function cssMinCompress(string $input, string $expected): void
    {
        $actual = $this->compressor->compress($input);
        self::assertSame($expected, $actual);
    }

    protected function getCompressor(): CompressorInterface
    {
        return new CssMinCompressor();
    }
}

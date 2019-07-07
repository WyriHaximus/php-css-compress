<?php declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests\Compressor;

use WyriHaximus\Compress\AbstractCompressorTest;
use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\CssCompress\Compressor\CssMinifierCompressor;

/**
 * CssMinifierCompressorTest.
 *
 * @author Marcel Voigt <mv@noch.so>
 *
 * @internal
 */
final class CssMinifierCompressorTest extends AbstractCompressorTest
{
    public function providerReturn(): iterable
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

    /**
     * @dataProvider providerReturn
     * @param mixed $input
     * @param mixed $expected
     */
    public function testReturn($input, $expected): void
    {
        $actual = $this->compressor->compress($input);
        self::assertSame($expected, $actual);
    }

    protected function getCompressor(): CompressorInterface
    {
        return new CssMinifierCompressor();
    }
}

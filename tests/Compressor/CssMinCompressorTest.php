<?php declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests\Compressor;

use WyriHaximus\Compress\AbstractCompressorTest;
use WyriHaximus\Compress\CompressorInterface;
use WyriHaximus\CssCompress\Compressor\CssMinCompressor;

/**
 * CssMinCompressorTest.
 *
 * @author Marcel Voigt <mv@noch.so>
 *
 * @internal
 */
final class CssMinCompressorTest extends AbstractCompressorTest
{
    public function providerReturn(): iterable
    {
        yield [
            '',
            '',
        ];
        yield [
            'p { background-color: #ffffff; font-size: 1px; }',
            'p{background-color:#ffffff;font-size:1px}',
        ];
        yield [
            '/* comments */
            p { background-color: #ffffff; font-size: 1px; }',
            'p{background-color:#ffffff;font-size:1px}',
        ];
        yield [
            'background-color: #FFFFFF ; ',
            'background-color:#FFFFFF',
        ];
        yield [
            'background-color: #FFFFFF; font-size: 14px
            ;
            ',
            'background-color:#FFFFFF;font-size:14px',
        ];
    }

    /**
     * @dataProvider providerReturn
     * @param mixed $input
     * @param mixed $expected
     */
    public function testCssMinCompress($input, $expected): void
    {
        $actual = $this->compressor->compress($input);
        self::assertSame($expected, $actual);
    }

    protected function getCompressor(): CompressorInterface
    {
        return new CssMinCompressor();
    }
}

<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests;

use WyriHaximus\CssCompress\Factory;
use WyriHaximus\TestUtilities\TestCase;

/**
 * @internal
 */
final class FactoryTest extends TestCase
{
    public function testConstruct(): void
    {
        $compressor = Factory::construct();

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;'
            )
        );
    }

    public function testConstructSmallestDefault(): void
    {
        $compressor = Factory::constructSmallest();

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;'
            )
        );
    }

    public function testConstructSmallestNoExternal(): void
    {
        $compressor = Factory::constructSmallest(false);

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;'
            )
        );
    }

    public function testConstructSmallestExternal(): void
    {
        $compressor = Factory::constructSmallest(true);

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;'
            )
        );
    }

    public function testConstructSmallestExternalCustomVariables(): void
    {
        $compressor = Factory::constructSmallest(true);

        self::assertSame(
            '--a:1em;padding:var(--a);color:blue',
            $compressor->compress(
                '--a: 1em;   padding: var(--a); color: blue;'
            )
        );
    }
}

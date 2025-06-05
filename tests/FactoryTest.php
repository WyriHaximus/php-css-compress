<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests;

use WyriHaximus\CssCompress\Factory;
use WyriHaximus\TestUtilities\TestCase;

final class FactoryTest extends TestCase
{
    public function testConstruct(): void
    {
        $compressor = Factory::construct();

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;',
            ),
        );
    }

    public function testConstructSmallestDefault(): void
    {
        $compressor = Factory::constructSmallest();

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;',
            ),
        );
    }

    public function testConstructSmallestCustomVariables(): void
    {
        $compressor = Factory::constructSmallest();

        self::assertSame(
            '--a:1em;padding:var(--a);color:blue',
            $compressor->compress(
                '--a: 1em;   padding: var(--a); color: blue;',
            ),
        );
    }
}

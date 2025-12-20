<?php

declare(strict_types=1);

namespace WyriHaximus\CssCompress\Tests;

use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\CssCompress\Factory;
use WyriHaximus\TestUtilities\TestCase;

final class FactoryTest extends TestCase
{
    #[Test]
    public function construct(): void
    {
        $compressor = Factory::construct();

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;',
            ),
        );
    }

    #[Test]
    public function constructSmallestDefault(): void
    {
        $compressor = Factory::constructSmallest();

        self::assertSame(
            'background-color:#fff',
            $compressor->compress(
                'background-color: #ffffff;',
            ),
        );
    }

    #[Test]
    public function constructSmallestCustomVariables(): void
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

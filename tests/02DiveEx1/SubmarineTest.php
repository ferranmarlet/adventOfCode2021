<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day02DiveEx1\Submarine;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class SubmarineTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroWhenCommandListIsEmpty(): void
    {
        $commandList = [];
        $sut = new Submarine($commandList);
        self::assertEquals(0, $sut->getTotalMovement());
    }
}

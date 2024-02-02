<?php

namespace BenRead\Tests;

use BenRead\Functions;
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/Functions.php";

final class FunctionsTest extends TestCase
{
    public function testGetFirstDigitFromString(): void
    {
        $functions = new Functions();
        $this->assertSame($functions->getFirstDigitFromString('a123'), 1);
        $this->assertSame($functions->getFirstDigitFromString('one21three'), 2);
        $this->assertSame($functions->getFirstDigitFromString('NoDigit'), 0);
        $this->assertSame($functions->getFirstDigitFromString('1abc2'), 1);
        $this->assertSame($functions->getFirstDigitFromString('abc4efg8hij'), 4);
        $this->assertSame($functions->getFirstDigitFromString('just1digit'), 1);
    }

    public function testGetLastDigitFromString(): void
    {
        $functions = new Functions();
        $this->assertSame($functions->getLastDigitFromString('a123'), 3);
        $this->assertSame($functions->getLastDigitFromString('one21three'), 1);
        $this->assertSame($functions->getLastDigitFromString('NoDigit'), 0);
        $this->assertSame($functions->getLastDigitFromString('1abc2'), 2);
        $this->assertSame($functions->getLastDigitFromString('abc4efg8hij'), 8);
        $this->assertSame($functions->getLastDigitFromString('just1digit'), 1);
    }

    public function testReplaceFirstWordInString(): void
    {
        $functions = new Functions();
        $this->assertSame($functions->replaceFirstWordInString($functions::$wordDigits, 'one2three4five'), '12three4five');
        $this->assertSame($functions->replaceFirstWordInString($functions::$wordDigits, 'twone'), '2ne');
        $this->assertSame($functions->replaceFirstWordInString($functions::$wordDigits, 'NoDigit'), 'NoDigit');
    }
    
    public function testReplaceLastWordInString(): void
    {
        $functions = new Functions();
        $this->assertSame($functions->replaceLastWordInString($functions::$wordDigits, 'one2three4five'), 'one2three45');
        $this->assertSame($functions->replaceLastWordInString($functions::$wordDigits, 'twone'), 'tw1');
        $this->assertSame($functions->replaceLastWordInString($functions::$wordDigits, 'NoDigit'), 'NoDigit');
    }

}
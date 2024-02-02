<?php

namespace BenRead;

class App
{   
    /**
     * @return void
     */
    public function run(): void
    {
        $functions = new Functions();
        $input = $functions->getFileContents('Input');
        $lines = explode("\n", $input);
        printf("Part 1 = '%d'\n", $this->firstPartSolution($lines)); // Part 1 = '53334'
        printf("Part 2 = '%d'\n", $this->secondPartSolution($lines)); // Part 2 = '52834'
    }

    private function firstPartSolution($lines): int {
        $functions = new Functions();
        $sum = 0;
        foreach ($lines as $line) {
            $firstDigit = $functions->getFirstDigitFromString($line);
            $lastDigit = $functions->getLastDigitFromString($line);
            $value = $firstDigit * 10 + $lastDigit;
            $sum += $value;
        }
        return $sum;
    }
    private function secondPartSolution($lines): int {
        $functions = new Functions();
        $sum = 0;
        foreach ($lines as $line) {
            $convertedFirstDigit = $functions->replaceFirstWordInString($functions::$wordDigits, $line);
            $firstDigit = $functions->getFirstDigitFromString($convertedFirstDigit);
            $convertedLastDigit = $functions->replaceLastWordInString($functions::$wordDigits, $line);
            $lastDigit = $functions->getLastDigitFromString($convertedLastDigit);
            $value = $firstDigit * 10 + $lastDigit;
            $sum += $value;
        }
        return $sum;
    }
}

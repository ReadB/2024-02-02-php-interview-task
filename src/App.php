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
        $sum = 0;
        foreach ($lines as $line) {
            $firstDigit = $functions->getFirstDigitFromString($line);
            $lastDigit = $functions->getLastDigitFromString($line);
            $value = $firstDigit * 10 + $lastDigit;
            $sum += $value;
        }
        printf("Part 1 = '%d'\n", $sum); // Part 1 = '53334'
    }
}

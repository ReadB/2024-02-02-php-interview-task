<?php

namespace BenRead;

class Functions
{
    public static $wordDigits = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

    public function getFileContents(string $fileName): string
    {
        $fileContents = file_get_contents(__DIR__ . "/" . $fileName);
        if (is_bool($fileContents)) {
            throw new \RuntimeException(
                "Failed to get contents of " . __DIR__ . "/" . $fileName
            );
        }
        return $fileContents;
    }

    public function getFirstDigitFromString(string $string): int
    {
        $digits = preg_split("/\D+/", $string);
        $filtered = array_values(array_filter($digits)); // remove empty strings and reset keys
        if (!$filtered) return 0; // Check for array with no values
        return intval(substr($filtered[0], 0, 1));
    }

    public function getLastDigitFromString(string $string): int
    {
        $digits = preg_split("/\D+/", $string);
        $filtered = array_values(array_filter($digits)); // remove empty strings and reset keys
        if (!$filtered) return 0; // Check for array with no values
        return intval(substr($filtered[array_key_last($filtered)], -1));
    }

    public function replaceFirstWordInString(array $wordList, string $string): string
    {
        // $replaced = str_replace($wordList, range(1,9), $string);
        /**
         * The line above does not return intended result as it goes in 
         * the order of the wordDigits instead of the string. 
         * For example 'twone' would return 'tw1' instead of '2ne'.
         */
        $forwardRe = '/(' . implode('|', $wordList) . ')/';
        preg_match($forwardRe, $string, $matches);
        $firstWordDigit = $matches[1] ?? null;
        if ($firstWordDigit && strlen($firstWordDigit) > 1) {
            $firstDigit = (array_search($firstWordDigit, $wordList) ?: 0) + 1;
            $string = str_replace($firstWordDigit, $firstDigit, $string);
        }

        return $string;
    }

    public function replaceLastWordInString(array $wordList, string $string): string
    {
        $reversedWordList = array_map(fn($str) => strrev($str), $wordList);
        $reversedString = strrev($string);
        return strrev($this->replaceFirstWordInString($reversedWordList, $reversedString));
    }
}

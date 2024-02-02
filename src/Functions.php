<?php

namespace BenRead;

class Functions
{
    public function getFileContents(string $fileName): string
    {
        $fileContents = file_get_contents(__DIR__ . "/" . $fileName);
        if (is_bool($fileContents)) {
            throw new \RuntimeException(
                "Failed to get contents of " . __DIR__ . $fileName
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
}

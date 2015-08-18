<?php

namespace AppBundle\Service;

class AnagramFinder
{
    public function find(array $dictionnary)
    {
        asort($dictionnary);
        $anagrams = [];
        foreach ($dictionnary as $entry) {
            $matches = [$entry];
            if ($this->inArrayRecursive($entry, $anagrams)) {
                continue;
            }
            foreach ($dictionnary as $potentialMatches) {
                if ($entry === $potentialMatches) {
                    continue;
                }
                if ($this->isAnagram($entry, $potentialMatches)) {
                    $matches[] = $potentialMatches;
                }
            }
            $anagrams[] = $matches;
        }

        return $anagrams;
    }

    public function isAnagram($a, $b)
    {
        $lettersA = str_split($a);
        $lettersB = str_split($b);

        asort($lettersA);
        asort($lettersB);

        return array_values($lettersA) == array_values($lettersB);
    }

    private function inArrayRecursive($needle, $haystacks)
    {
        foreach ($haystacks as $haystack) {
            if (in_array($needle, $haystack)) {
                return true;
            }
        }
        return false;
    }
}

<?php

namespace AppBundle\Tests\Service;

use AppBundle\Service\AnagramFinder;

class AnagramFinderTest extends \PHPUnit_Framework_TestCase
{
    public function testFindAnagrams()
    {
        $dictionnaryString = "kinship pinkish enlist inlets listen silent boaster boaters borates fresher refresh sinks skins knits stink rots sort";
        $dictionnary = explode(' ', $dictionnaryString);

        $anagramFinder = new AnagramFinder();

        $anagrams = $anagramFinder->find($dictionnary);

        $expected = [
            [ "boaster", "boaters", "borates" ],
            [ "enlist", "inlets", "listen", "silent" ],
            [ "fresher", "refresh" ],
            [ "kinship", "pinkish" ],
            [ "knits", "stink" ],
            [ "rots", "sort" ],
            [ "sinks", "skins" ],
        ];
        $this->assertEquals($expected, $anagrams);
    }
}

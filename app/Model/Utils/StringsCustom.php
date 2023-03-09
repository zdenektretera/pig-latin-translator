<?php

namespace App\Model\Utils;

class StringsCustom
{

    /**
     * Returns first index of one of the characters from array, or false
     *
     * @param string    $text
     * @param string[]  $characters
     *
     * @return int|false
     */
    public static function indexOfFirstFoundChar(string $text, array $characters): int|false {
        for ($i = 0; $i < strlen($text); $i++) {
            if (in_array($text[$i], $characters)) {
                return $i;
            }
        }

        return false;
    }

    /**
     * Edit string, to be lowercase and without multiple backspaces
     *
     * @param string $text reference
     *
     * @return void
     */
    public static function cleanPhraseString(string &$text): void {
        $text = strtolower(trim(preg_replace('/\s{2,}/', ' ', $text)));
    }
}

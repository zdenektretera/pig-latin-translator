<?php

namespace App\Model\Services;

use App\Model\Utils\StringsCustom;

class TranslateService
{
    const VOWELS =  [ 'a', 'e', 'i', 'y', 'o', 'u' ];

    /**
     * Pig Latin Translator.
     *
     * Note: Translator doesn't translate words with silent consonants properly
     */
    public function translateToPigLatin(string $text, string $affix = 'ay', string $extraAffix = 'w'): string {

        $pigLatinPhrase = '';

        StringsCustom::cleanPhraseString($text);
        $phraseWords = explode(' ', $text);

        foreach ($phraseWords as $index => $word) {

            // check if word starts with vowel
            if (in_array($word[0], self::VOWELS)) {

                // check last character of word, to find if extra affix is needed
                if (in_array($word[strlen($word) - 1], self::VOWELS)) {
                    $word .= $extraAffix . $affix;
                } else {
                    $word .= $affix;
                }

              // try to find the first vowel character, or don't change the word at all
            } else if (($vowelIndex = StringsCustom::indexOfFirstFoundChar($word, self::VOWELS)) !== false) {

                // take the part of word from start to first vowel, move it to end of the word and add affix
                $wordFirstPart = substr($word, 0, $vowelIndex);
                $wordWithoutFirstPart = str_replace($wordFirstPart, "", $word);

                $word = sprintf('%s-%s%s', $wordWithoutFirstPart, $wordFirstPart, $affix);
            }

            // add backspace before word, except for the first one, in the phrase
            if ($index > 0) {
                $word = ' ' . $word;
            }

            $pigLatinPhrase .= $word;
        }

        return $pigLatinPhrase;
    }

}

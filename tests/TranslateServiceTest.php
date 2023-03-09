<?php

use App\Model\Services\TranslateService;
use Tester\Assert;

require 'bootstrap.php';

test('Translate service: translateToPigLatin: consonants', function () {
    $translateService = new TranslateService();
    Assert::same('east-bay', $translateService->translateToPigLatin('beast'));
    Assert::same('ough-day', $translateService->translateToPigLatin('dough'));
});

test('Translate service: translateToPigLatin: consonant clusters', function () {
    $translateService = new TranslateService();
    Assert::same('ar-stay', $translateService->translateToPigLatin('star'));
    Assert::same('ee-thray', $translateService->translateToPigLatin('three'));
});

test('Translate service: translateToPigLatin: vowels', function () {
    $translateService = new TranslateService();
    Assert::same('eagleway', $translateService->translateToPigLatin('eagle'));
    Assert::same('eagle‘yay', $translateService->translateToPigLatin('eagle', extraAffix: '‘y'));
});

test('Translate service: translateToPigLatin: phrase', function () {
    $translateService = new TranslateService();
    Assert::same(
        'east-bay www w ough-day appy-hay in-way eagle‘yay apple‘yay anana-bay',
        $translateService->translateToPigLatin(
            '   BEAST www w   doUgh happy  win eagle apple bAnAna',
            extraAffix: '‘y'
        )
    );
});

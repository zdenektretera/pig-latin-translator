<?php

namespace App\Controls\TranslateControl;

interface TranslateControlFactory
{
    public function create(): TranslateControl;
}

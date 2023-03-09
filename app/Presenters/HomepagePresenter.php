<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Controls\TranslateControl\TranslateControl;
use App\Controls\TranslateControl\TranslateControlFactory;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private TranslateControlFactory $translateControlFactory
    ) {
        parent::__construct();
    }

    public function createComponentTranslateForm(): TranslateControl
    {
        return $this->translateControlFactory->create();
    }
}

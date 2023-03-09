<?php

namespace App\Controls\TranslateControl;

use App\Model\Services\TranslateService;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

class TranslateControl extends Control
{

    public function __construct(
        private TranslateService $translateService
    ) {
    }

    public function render(): void
    {
        $this->template->render(__DIR__ . '/translate-control.latte');
    }

    public function createComponentTranslateForm(): Form
    {
        $form = new Form();

        $form->addTextArea('text')
             ->addRule($form::PATTERN, 'Pouze textový řetězec', '^[a-zA-Z ]*$')
             ->setMaxLength(250)
             ->setRequired();

        $form->addSubmit('submit', 'Přeložit');

        $form->onSuccess[] = [ $this, 'processForm' ];

        return $form;
    }

    /**
     * @param string[] $values
     */
    public function processForm(Form $form, array $values): void
    {
        if (!empty($values['text'])) {
            $translatedText = $this->translateService->translateToPigLatin($values['text'], extraAffix: '‘y');

            $form->getPresenter()->template->translatedText = $translatedText;
        }
    }
}

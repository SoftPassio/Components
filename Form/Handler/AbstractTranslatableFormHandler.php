<?php

namespace AppVerk\Components\Form\Handler;

use AdminBundle\Mailer\TranslationNotificationMailer;
use AdminBundle\Util\LanguageHelper;
use AppBundle\Entity\Lang;
use Component\Doctrine\TranslationEntityInterface;

abstract class AbstractTranslatableFormHandler extends AbstractFormHandler
{
    /**
     * @var LanguageHelper
     */
    protected $languageHelper;
    /**
     * @var TranslationNotificationMailer
     */
    protected $mailer;

    public function __construct(LanguageHelper $languageHelper, TranslationNotificationMailer $mailer)
    {
        $this->languageHelper = $languageHelper;
        $this->mailer = $mailer;
    }

    public function process()
    {
        $this->validateForm();
        $this->form->handleRequest($this->request);

        if (!$this->isValid()) {
            $this->errors = $this->getErrorsFromForm($this->form);

            return false;
        }

        $response = $this->success();

        if (!$response) {
            $this->errors = $this->getErrorsFromForm($this->form);

            return false;
        }

        $this->postCreateEntity($response);

        return true;
    }

    protected function postCreateEntity(TranslationEntityInterface $entity)
    {
        $addedLocale = $entity->getCurrentLocale();
        if ($entity instanceof TranslationEntityInterface) {
            $languages = $this->languageHelper->getAllSortedLanguages(false);
            /** @var Lang $language */
            foreach ($languages as $language) {
                if ($language->getCode() !== $addedLocale) {
                    $this->sendNewVersionNotification($language->getCode(), $entity);
                }
            }
        }
    }

    private function sendNewVersionNotification(string $langCode, TranslationEntityInterface $entity)
    {
        $this->mailer->sendNewEntityToTranslate($langCode, $entity);
    }
}

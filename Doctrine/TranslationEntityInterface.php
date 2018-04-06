<?php

namespace AppVerk\Components\Doctrine;

interface TranslationEntityInterface
{
    public function getTranslations();

    public function getCurrentLocale();

    public function translate($locale = null, $fallbackToDefault = true);
}

<?php

namespace SoftPassio\Components\Doctrine;

trait TranslatableSupportTrait
{
    public function isLocaleSet($locale)
    {
        return (bool)($this->findTranslationByLocale($locale, false) !== null);
    }

    public function __get($method)
    {
        $callMethod = "get".ucfirst($method);

        try{
            return $this->proxyCurrentLocaleTranslation($callMethod);
        }catch (\Exception $e){
            $callMethod = "is".ucfirst($method);
            return $this->proxyCurrentLocaleTranslation($callMethod);
        }
    }

    public function __set($method, $argument)
    {
        $setter = "set".ucfirst($method);

        if($this->getCurrentLocale() == $this->defaultLocale || $this->id === null){
            $this->$method = $argument;
        }

        $arguments = [$method => $argument];
        return call_user_func_array(
            [$this->translate($this->getCurrentLocale(), false), $setter],
            $arguments
        );
    }
}

<?php
namespace Craft;

class MonerisVariable
{
    public function getProfileId()
    {
        return craft()->moneris->getProfileId();
    }

    public function getUrl()
    {
        return craft()->moneris->getUrl();
    }
}
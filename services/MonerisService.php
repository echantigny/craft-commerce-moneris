<?php
namespace Craft;

class MonerisService extends BaseApplicationComponent
{
    private $settings;

    private function _getSettings() {
        if (!is_null($this->settings)) {
            return $this->settings;
        }
        $criteria = new \CDbCriteria();
        $criteria->addCondition('class = "Moneris"');
        $query = craft()->commerce_paymentMethods->getAllPaymentMethods($criteria);

        $this->settings = $query ? reset($query)['settings'] : [];
        return $this->settings;
    }

    public function getProfileId() {
        $settings = $this->_getSettings();
        if (empty($settings)) { return ''; }
        return $settings['testMode'] ? $settings['testProfileId'] : $settings['profileId'];
    }

    public function getUrl() {
        $settings = $this->_getSettings();
        if (empty($settings)) { return ''; }
        return $settings['testMode'] ? 'https://esqa.moneris.com/HPPtoken/index.php' : 'https://www3.moneris.com/HPPtoken/index.php';
    }

    public function getApiToken() {
        $settings = $this->_getSettings();
        if (empty($settings)) { return ''; }
        return $settings['testMode'] ? $settings['testApiToken'] : $settings['apiToken'];
    }

    public function getStoreId() {
        $settings = $this->_getSettings();
        if (empty($settings)) { return ''; }
        return $settings['testMode'] ? $settings['testStoreId'] : $settings['storeId'];
    }

    public function getOrderIdPrefix()
    {
        $settings = $this->_getSettings();
        if (empty($settings)) { return ''; }
        return $settings['testMode'] ? $settings['orderIdPrefix'].'-DEV-' : $settings['orderIdPrefix'].'-';
    }
}
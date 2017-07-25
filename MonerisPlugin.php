<?php
namespace Craft;

class MonerisPlugin extends BasePlugin
{
    private $commerceInstalled = false;
    
    function getName()
    {
        return 'Moneris';
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Nancy Lussier';
    }

    function getDeveloperUrl()
    {
        return 'http://www.globalia.ca';
    }
       
    public function init()
    {        
       $this->commerceInstalled = craft()->plugins->getPlugin('commerce', true);
    }

    public function commerce_registerGatewayAdapters(){
        if($this->commerceInstalled) {
            require_once CRAFT_PLUGINS_PATH . '/moneris/vendor/autoload.php';
            require_once __DIR__ . '/Moneris_GatewayAdapter.php';
            return ['\Commerce\Gateways\Omnipay\Moneris_GatewayAdapter'];
        }
        return [];
    }
}

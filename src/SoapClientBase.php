<?php

namespace ErgonTech\WsdlToPhp;

use WsdlToPhp\PackageBase\AbstractSoapClientBase;
use ErgonTech\Soap\Client;

/**
 * Class SoapClientBase
 * see https://github.com/WsdlToPhp/PackageBase#abstractsoapclientbase
 * @package ErgonTech\WsdlToPhp
 */
class SoapClientBase extends AbstractSoapClientBase
{

    const WSDL_NTLM_USERNAME = 'wsdl_ntlm_username';
    const WSDL_NTLM_PASSORD = 'wsdl_ntlm_password';

    /**
     * @var string
     */
    const DEFAULT_SOAP_CLIENT_CLASS = Client::class;

    /**
     * Force the NTLM-enabled SOAP client to be used
     * @see \WsdlToPhp\PackageBase\AbstractSoapClientBase::getSoapClientClassName()
     * @return string
     */
    public function getSoapClientClassName($soapClientClassName = null)
    {
        return parent::getSoapClientClassName(static::DEFAULT_SOAP_CLIENT_CLASS);
    }

    /**
     * Adds NTLM information to the wsdl options
     * @return array
     */
    public static function getDefaultWsdlOptions()
    {
        $options =  parent::getDefaultWsdlOptions();
        $options[self::WSDL_NTLM_USERNAME] = null;
        $options[self::WSDL_NTLM_PASSORD] = null;
        return $options;
    }


}
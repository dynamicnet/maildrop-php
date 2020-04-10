<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Maildrop;

use GuzzleHttp\Client;

class Maildrop
{
    static private $default_client_api_key;
    static private $default_partner_api_key;

    private $client_api_key;
    private $partner_api_key;

    private $httpClient=null;
    private $endpoint = 'https://api.dpmail.fr/json/';

    public function __construct()
    {
    }

    protected function getHttpClient()
    {
        if (is_null( $this->httpClient )){
            $this->httpClient = new Client([
                    'base_uri' => $this->endpoint,
                    'connect_timeout' => 5,
                    'timeout' => 25,
                    'http_errors' => false,
                    'headers' => [
                        'User-Agent' => 'maildrop-php/1.0',
                    ]
                ]);
        }

        return $this->httpClient;
    }

    public static function setDefaultClientApiKey( $client_api_key )
    {
        self::$default_client_api_key = $client_api_key;
    }

    public function setClientApiKey( $client_api_key )
    {
        $this->client_api_key = $client_api_key;
    }

    public static function setDefaultPartnerApiKey( $partner_api_key )
    {
        self::$default_partner_api_key = $partner_api_key;
    }

    public function setPartnerApiKey( $partner_api_key )
    {
        $this->partner_api_key = $partner_api_key;
    }

    public function getClientApiKey(){
        if( !is_null($this->client_api_key) )
        {
            return $this->client_api_key;
        }

        return self::$default_client_api_key;
    }

    public function tests()
    {
        return new Api\Tests($this->getClientApiKey(), $this->getHttpClient());
    }

    public function lists()
    {
        return new Api\Lists($this->getClientApiKey(), $this->getHttpClient());
    }

    public function custom_fields()
    {
        return new Api\CustomFields($this->getClientApiKey(), $this->getHttpClient());
    }

    public function segments()
    {
        return new Api\Segments($this->getClientApiKey(), $this->getHttpClient());
    }

    public function subscribers()
    {
        return new Api\Subscribers($this->getClientApiKey(), $this->getHttpClient());
    }

    public function reports()
    {
        return new Api\Reports($this->getClientApiKey(), $this->getHttpClient());
    }

    public function campaigns()
    {
        return new Api\Campaigns($this->getClientApiKey(), $this->getHttpClient());
    }

    public function ip_pools()
    {
        return new Api\IpPools($this->getClientApiKey(), $this->getHttpClient());
    }
}

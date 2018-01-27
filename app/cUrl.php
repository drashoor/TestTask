<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/22/2018
 * Time: 9:45 AM
 */

namespace App;


trait cUrl
{
    protected $client;

    /**
     * Prepare Guzzle Client To Call Api
     * @param $type rentals|tasks|...
     */
    public function prepareApi($type)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => env('TOKEET_API_URL') . '/' . $type . '/',
            'headers' => [
                'Authorization' => env('TOKEET_APP_KEY')
            ],
            'query' => ["account" => env('TOKEET_ACCOUNT_ID')]
        ]);
    }

    protected function getApi($id = null)
    {
        return json_decode($this->request('GET', $id)->getBody(), true);
    }

    protected function request($type, $id = null, $headers = [], $body = '')
    {
        $str = "{$id}?account=" . env('TOKEET_ACCOUNT_ID');

        return $this->client->request($type, $str, [
            'headers' => $headers,
//            'json' => ['name' => 'bar']
        ]);
    }

}
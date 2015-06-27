<?php
namespace Matriphe\Telegrambot;

use GuzzleHttp\Client;

class Telegrambot
{
    /**
     * Telegram bot's API Token
     * @var string
     */
    protected $apikey;
    
    /**
     * Guzzle Client
     * @var Client
     */
    protected $client;
    
    /**
     * Constructor
     * @param $apikey
     */
    public function __construct($apikey)
    {
        $this->apikey = $apikey;
        $this->url = 'https://api.telegram.org/bot'.$this->apikey.'/';
        
        $this->client = new \GuzzleHttp\Client();
    }
    
    /**
     * Call method
     * @param string $method
     * @param array $data
     * @return mixed
     */
    public function call($method, $data = null)
    {
        $headers = [];
        
        if ($data) {
            $headers['Content-Type'] = 'multipart/form-data';
        }
        
        $request = $this->client->createRequest(
            'post',
            $this->url.$method,
            [
                'headers' => [
                    //'Content-Type' => 'multipart/form-data',
                ],
                'body' => $data,
            ]
        );
        $response = $this->client->send($request);
        
        $results = $response->json();
        
        if (!$results['ok']) {
            throw new Exception($results['description'], $results['error_code']);
        }
        
        return $results['result'];
    }
    
    /**
     * Use method as function
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->call($name, $arguments ? $arguments[0] : null);
    }
}
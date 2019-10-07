<?php

namespace Wimil\Gif\Factories;

use Wimil\Gif\Contracts\ClientInterface;
use GuzzleHttp\Client as Http;

class Client implements ClientInterface
{

    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * @param $baseUrl
     * @param $apiKey
     */
    public function __construct($baseUrl, $apiKey)
    {
        $this->client = new HttpClient([
            'base_url' => $baseUrl,
            'defaults' => [
                'query' => ['api_key' => $apiKey]
            ]
        ]);
    }

    /**
     * @param       $endPoint
     * @param array $params
     *
     * @return mixed
     * @throws \Exception
     */
    public function get($endPoint, array $params = [])
    {
        $response = $this->client->get($endPoint, ['query' => $params]);
        switch ($response->getHeader('content-type')) {
            case "application/json":
                return $response->json();
                break;
            default:
                return $response->getBody()->getContents();
        }
    }
}

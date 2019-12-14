<?php

namespace Wimil\Gif\Factories;

use GuzzleHttp\Client as HttpClient;
use Wimil\Gif\Contracts\ClientInterface;

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
        $paramKey = config('gif.driver') == 'giphy' ? 'api_key' : 'key';
        $this->client = new HttpClient([
            'base_uri' => $baseUrl,
            'query' => [$paramKey => $apiKey],
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
        $response = $this->client->get($endPoint, ['query' => array_merge(
            $this->client->getConfig('query'),
            $params
        )]);
        //$response = $this->client->request('GET', $endPoint, ['query' => $params]);
        switch ($response->getHeader('content-type')) {
            case "application/json":
                return $response->json();
                break;
            default:
                return $response->getBody()->getContents();
        }
    }
}

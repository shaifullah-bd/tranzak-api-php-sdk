<?php

namespace Bdtask\Tranzak\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Bdtask\Tranzak\Exceptions\HttpException;

class HttpClient
{
    private Client $client;

    public function __construct(string $baseUri)
    {
        $this->client = new Client([
            'base_uri' => rtrim($baseUri, '/'),
            'timeout'  => 10.0,
        ]);
    }

    /**
     * Send all get method request of tranzak api
     * @param string $endpoint
     * @param array $params
     * @param array $headers
     * @throws \Bdtask\Tranzak\Exceptions\HttpException
     * @return array
     */
    public function get(string $endpoint, array $params = [], array $headers = []): array
    {
        try {
            $response = $this->client->get($endpoint, [
                'query' => $params,
                'headers' => $headers,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            $errorMessage = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
            throw new HttpException("GET request failed: $errorMessage");
        }
    }

    /**
     * Send all post method request of tranzak api
     * @param string $endpoint
     * @param array $data
     * @param array $headers
     * @throws \Bdtask\Tranzak\Exceptions\HttpException
     * @return array
     */
    public function post(string $endpoint, array $data = [], array $headers = []): array
    {
        try {
            $response = $this->client->post($endpoint, [
                'json' => $data,
                'headers' => $headers,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            $errorMessage = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
            throw new HttpException("POST request failed: $errorMessage");
        }
    }
}

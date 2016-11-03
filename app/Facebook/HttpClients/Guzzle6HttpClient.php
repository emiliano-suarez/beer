<?php

namespace App\Facebook\HttpClients;

use Facebook\HttpClients\FacebookHttpClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Facebook\Http\GraphRawResponse;

class Guzzle6HttpClient implements FacebookHttpClientInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send($url, $method, $body, array $headers, $timeOut)
    {
        $request = new Request($method, $url, $headers, $body);
        $response = $this->client->send($request, ['timeout' => $timeOut]);
        
        $responseHeaders = $response->getHeaders();
        foreach ($responseHeaders as $key => $values) {
            $responseHeaders[$key] = implode(', ', $values);
        }
        
        $responseBody = $response->getBody()->getContents();
        $httpStatusCode = $response->getStatusCode();

        return new GraphRawResponse(
                    $responseHeaders,
                    $responseBody,
                    $httpStatusCode);
    }
}

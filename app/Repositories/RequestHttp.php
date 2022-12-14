<?php

namespace App\Repositories;

use App\Interfaces\RequestHttpInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class RequestHttp implements RequestHttpInterface
{
    private string $token;
    private string $url;
    private Client $client;
    public Request $request;
    public function __construct(Client $client, Request $request)
    {
        $this->token = env('API_TOKEN');
        $this->url = env('API_URL');
        $this->client = $client;
        $this->request = $request;
        ini_set('memory_limit', '1024M');
    }

    /**
     * @throws GuzzleException
     */
    public function get($url): object
    {
        return $this->client->get($this->url.str_replace('{token}',$this->token,$url),['verify' => false]);
    }
}

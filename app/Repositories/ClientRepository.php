<?php

namespace App\Repositories;

use App\Interfaces\ClientInterface;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientRepository implements ClientInterface
{
    protected Request $request;
    protected Client $client;

    public function __construct(Client $client, Request $request)
    {
        $this->client = $client;
        $this->request = $request;
    }

    public function all():object
    {
        return $this->client->all();
    }

    public function get(Client $client):object
    {
        return $client;
    }
}

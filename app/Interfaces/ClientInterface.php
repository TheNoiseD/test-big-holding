<?php

namespace App\Interfaces;

use App\Models\Client;

interface ClientInterface
{
    public function all();
    public function get(Client $client);
}

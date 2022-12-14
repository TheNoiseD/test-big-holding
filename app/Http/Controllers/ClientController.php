<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Repositories\ClientRepository;
use App\Repositories\Track;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected ClientRepository $clientRepository;

    public function __construct(Track $track, ClientRepository $clientRepository)
    {
        $track->add();
        $this->clientRepository = $clientRepository;
    }

    public function index():JsonResponse
    {
        $clients = $this->clientRepository->all();
        return response()->json(['clients' => $clients], 200);
    }


    public function show(Client $id):JsonResponse
    {
        $client = $this->clientRepository->get($id);
        return response()->json(['client' => $client], 200);
    }

}

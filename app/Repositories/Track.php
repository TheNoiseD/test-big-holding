<?php

namespace App\Repositories;

use App\Interfaces\TrackInterface;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Track as TrackM;
use Illuminate\Support\Facades\Auth;

class Track implements TrackInterface
{
    protected Request $request;
    protected TrackM $trackM;

    public function __construct(TrackM $trackModel, Request $request)
    {
        $this->request = $request;
        $this->trackM = $trackModel;
    }


    public function add():void
    {
        $this->trackM->create([
            'ip' => $this->request->ip(),
            'user_id' => auth('sanctum')->user()->id,
            'user_agent' => $this->request->userAgent(),
            'route' => $this->request->url(),
            'request_type' => $this->request->method(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

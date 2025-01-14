<?php

namespace App\Clients;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class PaddleClient
{
    private PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::baseUrl(config('paddle.api_base_url'))
            ->timeout(3)
            ->withHeader('Authorization', 'Bearer ' . config('paddle.api_key'));
    }

    /**
     * Retrieves the Paddle customer with the given ID.
     *
     * @param string $id
     * @return array|mixed
     * @throws ConnectionException
     * @throws RequestException
     */
    public function getCustomer(string $id)
    {
        return $this->http->get('/customers/' . $id)->throw()->json();
    }
}

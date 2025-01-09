<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaddleWebhookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaddleWebhookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PaddleWebhookRequest $request)
    {
        Log::channel('paddle')->info('Paddle webhook received', [
            'payload' => $request->all(),
        ]);

        return 'ok';
    }
}

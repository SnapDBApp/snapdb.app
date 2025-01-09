<?php

namespace App\Http\Controllers\API;

use App\Events\Paddle;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaddleWebhookRequest;
use Illuminate\Support\Facades\Log;

class PaddleWebhookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PaddleWebhookRequest $request)
    {
        $payload = $request->all();
        Log::channel('paddle')->info('Paddle webhook received', ['payload' => $payload]);

        match ($request->event_type) {
            'transaction.completed' => Paddle\TransactionCompleted::dispatch($payload)
        };

        return 'ok';
    }
}

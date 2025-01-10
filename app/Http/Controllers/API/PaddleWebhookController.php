<?php

namespace App\Http\Controllers\API;

use App\Events\Paddle\TransactionCompleted;
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

        // Dispatch event based on event type
        switch ($request->event_type) {
            case 'transaction.completed':
                TransactionCompleted::dispatch($payload);
                break;

            default:
                return response('Unsupported event ' . $request->event_type, 400);
        }

        return response('OK', 200);
    }
}

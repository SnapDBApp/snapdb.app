<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaddleWebhookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_id' => ['required', 'string'],
            'event_type' => ['required', 'string'],
            'occurred_at' => ['required', 'string'],
            'notification_id' => ['required', 'string'],
            'data' => ['required', 'array'],
        ];
    }
}

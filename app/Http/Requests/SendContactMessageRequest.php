<?php

namespace App\Http\Requests;

use Coderflex\LaravelTurnstile\Rules\TurnstileCheck;
use Illuminate\Foundation\Http\FormRequest;

class SendContactMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cf-turnstile-response' => ['required', 'string', 'max:2048', new TurnstileCheck],
            'name' => ['required', 'string', 'max:255'],
            'company' => ['present', 'string', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
        ];
    }
}

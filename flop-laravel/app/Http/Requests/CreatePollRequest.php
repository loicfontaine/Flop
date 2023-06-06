<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class CreatePollRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'start_time' => now()->toDateTimeString(),
            'end_time' => now()->addMinutes($this->duration)->toDateTimeString(),
        ]);
        dd($this->all());
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'options' => 'required|array|min:2',
            'user_id' => 'required|integer|exists:users,id',
            'start_date' => 'required|timestamp|after_or_equal:now|min:1',
            'end_date' => 'required|timestamp|after:start_date|min:1',
        ];
    }
}

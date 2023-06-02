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
            'created_by' => auth()->user()->id,
            'start_date' => now()->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse(($this->start_date)->addMinutes($this->duration)->format('Y-m-d H:i:s'))->toDateTimeString(),
        ]);
        dd($this->all());
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required|timestamp|after_or_equal:now|min:1',
            'duration' => 'required|integer|min:1',
            'options' => 'required|array|min:2',
        ];
    }
}

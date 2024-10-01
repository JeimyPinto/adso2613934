<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Game;


class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'image' => ['image', 'file'],
            'developer' => ['required', 'string'],
            'releadedate' => ['required', 'date'],
            'category_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'gender' => ['required', 'string'],
            'slider' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ];
    }
}

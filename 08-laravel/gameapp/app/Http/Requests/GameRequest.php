<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
        if ($this->method() == 'PUT') {
            return [
                'title' => ['required', 'string', Rule::unique('games')->ignore($this->game)],
                'developer' => ['required', 'string'],
                'releasedate' => ['required', 'date'],
                'category_id' => ['required'],
                'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                'gender' => ['required'],
                'slider' => ['required'],
                'description' => ['required'],
            ];
        } else {
            return [
                'title' => ['required', 'unique:games,title'],
                'image' => ['required', 'image'],
                'developer' => ['required', 'string'],
                'releasedate' => ['required', 'date'],
                'category_id' => ['required'],
                'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                'gender' => ['required'],
                'slider' => ['required'],
                'description' => ['required'],
            ];
        }
    }
}

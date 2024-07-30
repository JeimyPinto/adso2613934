<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
            'document' => ['required', 'numeric', 'unique:' . User::class],
            'fullname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'photo' => ['nullable', 'image'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'document.required' => 'El campo documento es obligatorio',
            'document.numeric' => 'El campo documento debe ser numérico',
            'document.unique' => 'El documento ya está registrado',
            'fullname.required' => 'El campo nombre es obligatorio',
            'fullname.string' => 'El campo nombre debe ser texto',
            'gender.required' => 'El campo género es obligatorio',
            'birthdate.required' => 'El campo fecha de nacimiento es obligatorio',
            'photo.image' => 'El archivo debe ser una imagen',
            'phone.required' => 'El campo teléfono es obligatorio',
            'email.required' => 'El campo correo es obligatorio',
            'email.lowercase' => 'El correo debe estar en minúsculas',
            'email.email' => 'El correo no es válido',
            'email.unique' => 'El correo ya está registrado',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ];
    }

    public function attributes(): array
    {
        return [
            'document' => 'documento',
            'fullname' => 'nombre',
            'gender' => 'género',
            'birthdate' => 'fecha de nacimiento',
            'photo' => 'foto',
            'phone' => 'teléfono',
            'email' => 'correo',
            'password' => 'contraseña',
        ];
    }
}

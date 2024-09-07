<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|min:5|max:255',
            'sexo' => 'required|in:F,M',
            'boletin' => 'boolean',
            'descripcion' => 'required|string|min:10|max:500',
            'area_id' => 'nullable|integer'
        ];
    }

    public function validated($key = null , $default = null)
    {
        $data = parent::validated($key,$default);

        $data['boletin'] = $this->has('boletin') ? 1 : 0;

        return $data;
    }
}

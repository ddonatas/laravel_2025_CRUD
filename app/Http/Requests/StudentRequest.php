<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//jei naudotume asm kodo valildavima
//use App\Rules\ValidLithuanianPersonalCode;  

class StudentRequest extends FormRequest
{
    /**
     * Nustatoma, ar vartotojas turi teisę atlikti šį veiksmą.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Grąžina validacijos taisykles.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|min:7|max:20',
            'city_id' => 'required|exists:cities,id',
            //jei naudotume asm kodo valildavima
            //   'personal_code' => ['required', new ValidLithuanianPersonalCode],
        ];
    }

    /**
     * Individualizuoti klaidų pranešimai.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Vardas yra privalomas min 2 simboliai.',
            'surname.required' => 'Pavardė yra privaloma.',
            'address.required' => 'Adresas yra privalomas.',
            'phone.required' => 'Telefono numeris yra privalomas.',
            'phone.min' => 'Telefono numeris turi būti bent 7 simbolių ilgio.',
            'phone.max' => 'Telefono numeris negali būti ilgesnis nei 20 simbolių.',
            'city_id.required' => 'Miesto pasirinkimas yra privalomas.',
            'city_id.exists' => 'Pasirinktas miestas neegzistuoja.',
        ];
    }
}

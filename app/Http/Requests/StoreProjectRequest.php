<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            "title"=> ["required", "string", "unique:projects", "min:3", "max:255"],
            "preview"=>["required", "string", "min:3", "max:250"],
            // esiste nella tabella con la colonna id
            "type_id"=>["required", "integer", "exists:types,id"],
            "technologies"=>["required", "array", "exists:technologies,id"],
            "image"=>["required","image","mimes:jpeg,png,jpg,gif,svg","max:2048"]
        ];
    }
}

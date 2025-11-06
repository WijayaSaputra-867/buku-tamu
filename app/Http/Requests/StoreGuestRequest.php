<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'gender' => ['required','in:male,female'],
            'institution_id' => ['nullable','exists:institutions,id'],
            'institution' => ['nullable','string','max:255'],
            'phone' => ['nullable','string','max:20'],
            'needed_field' => ['required','string','max:255'],
            'meeting_person' => ['nullable','string','max:255'],
            'photo' => ['nullable','image','max:2048'],
        ];
    }
}

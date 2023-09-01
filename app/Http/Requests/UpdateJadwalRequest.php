<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJadwalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "jadwal_id"=> "required",
            "makul"=> "required",
            "jam_mulai"=> "required|date_format:H:i:s",
            "jam_akhir"=> "required|date_format:H:i:s|after:jam_mulai",
            "hari"=> "required"
        ];
    }
}

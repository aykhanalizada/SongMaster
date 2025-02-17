<?php

namespace App\Http\Requests\Songs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSongRequest extends FormRequest
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
            "title" => "required",
            "artist_id" => 'required|array',
            'artist_id.*' => 'integer|exists:artists,id',
            'release_year' => ['required', "date_format:Y"],
            'music_file' => 'nullable|file'
        ];
    }
}

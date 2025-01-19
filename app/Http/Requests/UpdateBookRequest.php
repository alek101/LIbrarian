<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
        $bookId = $this->route('book'); // Retrieve the 'book' parameter from the route
        
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'author_id' => ['required', 'exists:authors,id'],
            'isbn' => ['required', 'string', 'max:255',  Rule::unique('books', 'isbn')->ignore($bookId)],
        ];
    }
}

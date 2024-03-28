<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'title' => 'string|required',
            'body' => 'string|required',
            'file' => 'file|nullable',
            'user_name' => 'string',
            'email' => 'email:rfc,dns',
            'user_id' => 'int'

        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => $this->user()->id,
            'user_name' => $this->user()->name,
            'email' => $this->user()->email,
            'file'  => $this->file('file')? $this->file('file')->store('uploads', 'public'):null
        ]);
    }

}

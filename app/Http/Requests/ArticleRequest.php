<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'article' => ['required', 'array'],
            'article.title' => ['required', 'string', 'max:255'],
            'article.slug' => ['required', 'string', 'max:255'],
            'article.author' => ['required', 'string', 'max:255'],
            'article.text' => ['required', 'string'],
            'article.rubric_id' => ['required', 'integer'],
            'article.is_publish' => ['sometimes', 'boolean'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->method() === "PUT") {
            return [
                "title" => ["required"],
                "content" => ["required"],
            ];
        } else {
            return [
                "title" => ["sometimes", "required"],
                "content" => ["sometimes", "required"],
            ];
        }
    }
}

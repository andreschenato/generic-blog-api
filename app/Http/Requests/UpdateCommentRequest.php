<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->method() === "PUT") {
            return [
                "postId" => ["required"],
                "content" => ["required"],
            ];
        } else {
            return [
                "postId" => ["sometimes", "required"],
                "content" => ["sometimes", "required"],
            ];
        }
    }

    protected function prepareForValidation() {
        $this->merge([
            "post_id" => $this->postId,
        ]);
    }
}

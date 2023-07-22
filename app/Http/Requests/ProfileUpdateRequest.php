<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['max:20'],
            'first_name' => ['max:15'],
            'last_name' => ['max:15'],
            'nickname' => ['max:20'],
            'phone' => ['max:11'],
            'bio' => ['max:255'],
            'facebook' => ['max:50'],
            'github' => ['max:50'],
            'linkin' => ['max:50'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:191',
        'email' => 'required|email|max:191|unique:users,email',
        'password' => 'required|alpha_num|min:8|max:16',
        'password__re' => 'required|same:password',
    ]);

    // ここに保存処理などを記述する
}
}

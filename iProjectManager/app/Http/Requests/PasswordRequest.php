<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PasswordRequest extends Request
{

    protected $user;

    public function __construct() {
        $this->user = Route::current()->parameters()['users'];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->id === $this->user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ( Route::current()->getName('users.edit_password') ) {
            return [];
        }

        //Lembrar de atualizar Model Mutator
        return [
            'old_password' => 'required|oldpassword:' . $this->user->password,
            'password'     => 'required|confirmed|min:6'
        ];
    }

    public function messages()
    {
        return [
            'old_password.oldpassword' => 'The old password does not match'
        ];
    }

}

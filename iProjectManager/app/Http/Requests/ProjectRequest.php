<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ProjectRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2',
            'manager_user_id' => 'required|integer',
            'client_id' => 'required|integer'
        ];
    }
}

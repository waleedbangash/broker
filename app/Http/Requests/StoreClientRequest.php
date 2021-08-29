<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'client_address' => [
                'string',
                'required',
            ],
            'cell_no' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:clients',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}

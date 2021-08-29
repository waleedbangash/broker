<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'employee' => [
                'string',
                'required',
                'unique:drivers',
            ],
            'cell_no' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:drivers',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}

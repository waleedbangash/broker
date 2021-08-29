<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_edit');
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
                'unique:drivers,employee,' . request()->route('driver')->id,
            ],
            'cell_no' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:drivers,email,' . request()->route('driver')->id,
            ],
        ];
    }
}

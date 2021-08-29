<?php

namespace App\Http\Requests;

use App\Models\Truck;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTruckRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('truck_edit');
    }

    public function rules()
    {
        return [
            'truck_no' => [
                'string',
                'required',
                'unique:trucks,truck_no,' . request()->route('truck')->id,
            ],
        ];
    }
}

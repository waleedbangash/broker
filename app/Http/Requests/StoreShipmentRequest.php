<?php

namespace App\Http\Requests;

use App\Models\Shipment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShipmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_create');
    }

    public function rules()
    {
        return [
            'id' => [
                'nullable',

                'min:-2147483648',
                'max:2147483647',
            ],
            'shipment_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'truck_no_id' => [
                'required',
                'integer',
            ],
            'employee_id' => [
                'required',
                'integer',
            ],
            'name_id' => [
                'required',
                'integer',
            ],
            'shipment_status_id' => [
                'required',
                'integer',
            ],
            'estimated_time' => [
                'required',

            ],
            'from_location_id' => [
                'required',

            ],
            'to_location_id' => [
                'required',

            ],
        ];
    }
}

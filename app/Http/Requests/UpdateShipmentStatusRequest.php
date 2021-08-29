<?php

namespace App\Http\Requests;

use App\Models\ShipmentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_status_edit');
    }

    public function rules()
    {
        return [
            'shipment_status' => [
                'string',
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\ShipmentDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_detail_edit');
    }

    public function rules()
    {
        return [
            'shipment_id' => [
                'required',
                'integer',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

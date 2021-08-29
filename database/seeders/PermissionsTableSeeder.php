<?php

namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'admin_control_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'=> 12,
                'title'=>'Features_Access',
            ],
            [
                'id'    => 13,
                'title' => 'service_create',
            ],
            [
                'id'    => 14,
                'title' => 'service_edit',
            ],
            [
                'id'    => 15,
                'title' => 'service_show',
            ],
            [
                'id'    => 16,
                'title' => 'service_delete',
            ],
            [
                'id'    => 17,
                'title' => 'service_access',
            ],
            [
                'id'    => 18,
                'title' => 'bank_access',
            ],
            [
                'id'    => 19,
                'title' => 'bank_create',
            ],
            [
                'id'    => 20,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 21,
                'title' => 'bank_show',
            ],
            [
                'id'    => 22,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 23,
                'title' => 'scouting_data_access',
            ],

            [
                'id'    => 24,
                'title' => 'order_access',
            ],

            [
                'id'    => 25,
                'title' => 'order_create',
            ],
            [
                'id'    => 26,
                'title' => 'order_edit',
            ],
            [
                'id'    => 27,
                'title' => 'order_detail',
            ],
            [
                'id'    => 28,
                'title' => 'order_delete',
            ],
            [
                'id'    => 29,
                'title' => 'total_invoice_access',
            ],
            [
                'id'    => 30,
                'title' => 'total_invoice_create',
            ],
            [
                'id'    => 31,
                'title' => 'total_invoice_edit',
            ],
            [
                'id'    => 32,
                'title' => 'total_invoice_detail',
            ],
            [
                'id'    => 33,
                'title' => 'total_invoice_delete',
            ],
            [
                'id'    => 34,
                'title' => 'admin_access',
            ],
            [
                'id'    => 35,
                'title' => 'admin_create',
            ],
            [
                'id'    => 36,
                'title' => 'admin_edit',
            ],
            [
                'id'    => 37,
                'title' => 'admin_show',
            ],
            [
                'id'    => 38,
                'title' => 'admin_delete',
            ],
            [
                'id'    => 39,
                'title' => 'users_access',
            ],
            [
                'id'    => 40,
                'title' => 'client_access',
            ],
            [
                'id'    => 41,
                'title' => 'client_create',
            ],
            [
                'id'    => 42,
                'title' => 'client_edit',
            ],
            [
                'id'    => 43,
                'title' => 'client_detaile',
            ],
            [
                'id'    => 44,
                'title' => 'client_delete',
            ],
            [
                'id'    => 45,
                'title' => 'provider_access',
            ],
            [
                'id'    => 46,
                'title' => 'provider_create',
            ],
            [
                'id'    => 47,
                'title' => 'provider_edit',
            ],
            [
                'id'    => 48,
                'title' => 'provider_detail',
            ],
            [
                'id'    => 49,
                'title' => 'provider_delete',
            ],
            [
                'id'    => 50,
                'title' => 'information_access',
            ],
            [
                'id'    => 51,
                'title' => 'information_edit',
            ],
            [
                'id'    => 52,
                'title' => 'information_show',
            ],
            [
                'id'    => 53,
                'title' => 'information_delete',
            ],
            [
                'id'    => 54,
                'title' => 'application_setting_access',
            ],
            [
                'id'    => 55,
                'title' => 'ads_access',
            ],
            [
                'id'    => 56,
                'title' => 'ads_create',
            ],
            [
                'id'    => 57,
                'title' => 'ads_edit',
            ],
            [
                'id'    => 58,
                'title' => 'ads_show',
            ],

            [
                'id'    => 59,
                'title' => 'ads_delete',
            ],
            [
                'id'    => 60,
                'title' => 'occation_time_access',
            ],
            [
                'id'    => 61,
                'title' => 'occation_time_create',
            ],
            [
                'id'    => 62,
                'title' => 'occation_time_show',
            ],
            [
                'id'    => 63,
                'title' => 'occation_time_edit',
            ],
            [
                'id'    => 64,
                'title' => 'occation_time_delete',
            ],
            [
                'id'    => 65,
                'title' => 'pages_access',
            ],
            [
                'id'    => 66,
                'title' => 'who_are_we_access',
            ],
            [
                'id'    =>67 ,
                'title' => 'privacy_access',
            ],
            [
                'id'    => 68,
                'title' => 't_and_c_access',
            ],

        ];

        Permission::insert($permissions);
    }
}

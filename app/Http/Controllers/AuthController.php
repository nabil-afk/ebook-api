<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return[
            'NIS' => '3103119130',
            'Name' => 'Nabil Dzakwan Bernadine',
            'Gender' => 'Laki',
            'Phone' => '08979281777',
            'Class' => 'XII RPL 4',
        ];
    }
}

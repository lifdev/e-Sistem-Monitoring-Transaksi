<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minusan;

class MinusanController extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Data Minusan',
            'menuMinusan'   => 'active',
            'minusan'       => Minusan::get(),

        );
        return view('minusan/index', $data);
    }
}

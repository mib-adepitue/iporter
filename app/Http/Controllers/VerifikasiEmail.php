<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiEmail extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function porter_create()
    {
        return redirect()->route('porter.create');
    }

    public function order_create()
    {
        return redirect()->route('order.create');
    }

    public function template()
    {
        return redirect()->back();
    }
}

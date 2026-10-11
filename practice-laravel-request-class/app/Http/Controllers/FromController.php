<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FromController extends Controller
{
    public function index()
    {
        return view('Home');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email',
            'phone'         => 'required|string',
            'ticket_type'   => 'required|string',
            'promo_code'    => 'nullable|string',
        ]);

        $allInputData = $request->only([
            'full_name',
            'email',
            'phone',
            'ticket_type',
            'promo_code',
        ]);

        return view('Welcome', [
            'data' => $allInputData,
        ]);
    }
}
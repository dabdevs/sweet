<?php

namespace App\Http\Controllers;

class WebController extends Controller
{

    /**
     * Show the landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
}

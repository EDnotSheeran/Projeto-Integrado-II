<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function __invoke(Request $request)
    {
        return view(view: 'teste');
    }

    public function teste(Request $request)
    {
        return view(view: 'site.home.index');
    }
}

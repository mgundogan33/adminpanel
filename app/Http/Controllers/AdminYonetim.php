<?php

namespace App\Http\Controllers;

use App\Models\Moduller;
use Illuminate\Http\Request;

class AdminYonetim extends Controller
{
    function __construct()
    {
        view()->share('moduller',Moduller::whereDurum(1)->get());
    }
    public function home(){
        return view('admin.include.home');
    }
}

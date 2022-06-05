<?php

namespace App\Http\Controllers;

use App\Models\Moduller;
use Illuminate\Http\Request;

class AdminYonetim extends Controller
{
    function __construct()
    {
        view()->share('moduller', Moduller::whereDurum(1)->get());
    }
    public function home()
    {
        return view('admin.include.home');
    }
    public function liste($modul)
    {
        $kontrol = Moduller::whereDurum(1)->whereSeflink($modul)->first();
        if ($kontrol) {
            return view('admin.include.liste');
        } else {
            return redirect()->route('home');
        }
    }
    public function ekle($modul)
    {
        $modulBilgisi = Moduller::whereDurum(1)->whereSeflink($modul)->first();
        if ($modulBilgisi) {
            return view('admin.include.ekle',compact('modulBilgisi'));
        } else {
            return redirect()->route('home');
        }
    }
}

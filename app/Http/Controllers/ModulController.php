<?php

namespace App\Http\Controllers;

use App\Models\Moduller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModulController extends Controller
{
    public function index()
    {
        return view('admin.include.moduller');
    }
    public function modulekle(Request $request)
    {
        $request->validate([
            'baslık' => 'required|string',

        ]);
        $baslık = $request->baslık;
        $selflink = Str::of($baslık)->slug('');
        Moduller::create([
            'baslık' => $baslık,
            'selflink' => $selflink
        ]);
        return redirect()->route('moduller');
    }
}

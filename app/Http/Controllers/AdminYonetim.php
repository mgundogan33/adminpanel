<?php

namespace App\Http\Controllers;

use App\Models\Moduller;
use App\Models\Kategoriler;
use Illuminate\Support\Str;
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
        $dinamikModul = Moduller::whereDurum(1)->whereSeflink($modul)->first();
        if ($dinamikModul) {
            $dinamikModel = "App\Models\\" . ucfirst($dinamikModul->seflink);
            $veriler = $dinamikModel::get();
            return view('admin.include.liste', compact(['veriler','dinamikModul']));
        } else {
            return redirect()->route('home');
        }
    }
    public function ekle($modul)
    {
        $modulBilgisi = Moduller::whereDurum(1)->whereSeflink($modul)->first();
        $kategoriBilgisi = Kategoriler::whereTablo('modul')->whereSeflink($modul)->get();
        if ($modulBilgisi && $kategoriBilgisi) {
            return view('admin.include.ekle', compact(['modulBilgisi', 'kategoriBilgisi']));
        } else {
            return redirect()->route('home');
        }
    }
    public function eklePost($modul, Request $request)
    {
        $modulBilgisi = Moduller::whereDurum(1)->whereSeflink($modul)->first();
        if ($modulBilgisi) {
            $modelDosyaAdi = ucfirst($modulBilgisi->seflink);
            $request->validate([
                'baslik' => 'required|string',
                'kategori' => 'required',
                'anahtar' => 'required',
                'description' => 'required'
            ]);
            $baslik = $request->baslik;
            $seflink = Str::slug($baslik, '');
            $metin = $request->metin;
            $kategori = $request->kategori;
            $anahtar = $request->anahtar;
            $description = $request->description;
            $sirano = $request->sirano;
            $dinamikModel = "App\Models\\" . $modelDosyaAdi;
            $resimDosyasi = $request->file('resim');
            if (isset($resimDosyasi)) {
                $resim = uniqid() . "." . $resimDosyasi->getClientOriginalExtension();
                $resimDosyasi->move(public_path("images/" . $modulBilgisi->seflink), $resim);
                $kaydet = $dinamikModel::create([
                    'baslik' => $baslik,
                    'seflink' => $seflink,
                    'metin' => $metin,
                    'kategori' => $kategori,
                    'resim' => $resim,
                    'anahtar' => $anahtar,
                    'description' => $description,
                    'sirano' => $sirano
                ]);
            } else {
                $kaydet = $dinamikModel::create([
                    'baslik' => $baslik,
                    'seflink' => $seflink,
                    'metin' => $metin,
                    'kategori' => $kategori,
                    'anahtar' => $anahtar,
                    'description' => $description,
                    'sirano' => $sirano
                ]);
            }

            return redirect()->route('ekle', $modulBilgisi->seflink)->with('basarili', 'İşleminiz başarıyla kaydedildi');
        } else {
            return redirect()->route('home');
        }
    }
}

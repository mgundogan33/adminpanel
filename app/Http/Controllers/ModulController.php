<?php

namespace App\Http\Controllers;

use App\Models\Moduller;
use App\Models\Kategoriler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ModulController extends Controller
{
    public function index()
    {
        return view('admin.include.moduller');
    }
    public function modulekle(Request $request)
    {
        $request->validate([
            'baslik' => 'required|string',

        ]);
        $baslik = $request->baslik;
        $seflink = Str::of($baslik)->slug('');
        // 1 modul olusturma
        Moduller::create([
            'baslik' => $baslik,
            'seflink' => $seflink
        ]);
        // 2 ci adım Kategori kayıt işlemi
        Kategoriler::create([
            'baslik' => $baslik,
            'seflink' => $seflink,
            'tablo' => 'modul',
            'sirano' => 1
        ]);
        // 3 cu adım dınamık tablo olusturma işlemi
        Schema::create($seflink, function (Blueprint $table) {
            $table->id();
            $table->string('baslik', 255);
            $table->string('seflink', 255);
            $table->string('resim', 255)->nullable();
            $table->longText('metin')->nullable();
            $table->unsignedBigInteger('kategori')->nullable();
            $table->string('anahtar', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->enum('durum', [1, 2])->default(1);      /*1 aktıf 2 pasıf*/
            $table->integer('sirano')->nullable();
            $table->timestamps();
            $table->foreign('kategori')->references('id')->on('kategoriler')->onDelete('cascade');
        });
        // 4.cu adım model olusturma

        $modelDosyasi = '<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ' . ucfirst($seflink) . ' extends Model
{
    use HasFactory;
    protected $table = "' . $seflink . '";
    protected $fillable = ["id","baslik","seflink","kategori","resim","metin","anahtar","description","durum","sirano","created_at","updated_at"];
}';
        File::put(app_path('Models') . "/" . ucfirst($seflink) . '.php', $modelDosyasi);/*hizmetler.php */


        return redirect()->route('moduller');
    }
}

@extends('admin.tema')
@section('admintitle')
    Sİte Ayarları
@endsection
@section('css')
@endsection
@section('content')
    <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('basarili'))
                        <div class="alert alert-success">{{ session('basarili') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Site Ayarları</h4>
                            <div class="basic-form">
                                <form action="{{ route('ayarpost') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Site Başlık</label>
                                        <input type="text" class="form-control input-default" placeholder="Başlık" required
                                            name="title" value="{{ $veriler->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Anahtar</label>
                                        <input type="text" class="form-control input-default" placeholder="Anahtar"
                                            name="keywords" value="{{ $veriler->keywords }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control input-default" placeholder="Description"
                                            name="description" value="{{ $veriler->description }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control input-default" placeholder="Resim"
                                            name="logo">
                                    </div>
                                    <div class="form-group">
                                        <label>Favicon</label>
                                        <input type="file" class="form-control input-default" placeholder="Resim"
                                            name="favicon">
                                    </div>
                                    <div class="form-group">
                                        <label>Site Durum</label>
                                        <select type="text" class="form-control input-default" name="bakimmodu">
                                            <option value="1" @if($veriler->bakimmodu==1) selected @endif>Siteyi Yayına Aç / Aktif</option>
                                            <option value="2" @if($veriler->bakimmodu==2) selected @endif>Bakım Modunu Aç / Pasif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="gonder" value="Kaydet" required>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

@extends('admin.tema')
@section('admintitle')
    Ekleme İşlemleri
@endsection
@section('css')
    <link href="{{ asset('admin') }}/plugins/summernote/dist/summernote.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $modulBilgisi->baslik }}</h4>
                            <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>.input-default, input-flat,
                                    .input-rounded</code> for Default input.</p>
                            <div class="basic-form">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control input-default" name="kategori">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" class="form-control input-default" placeholder="Başlık"
                                            name="baslik">
                                    </div>
                                    <div class="summernote">
                                    </div>
                                    <div class="form-group">
                                        <label>Resim</label>
                                        <input type="text" class="form-control input-default" placeholder="Resim Seçiniz"
                                            name="resim">
                                    </div>
                                    <div class="form-group">
                                        <label>Anahtar</label>
                                        <input type="text" class="form-control input-default" placeholder="Anahtar"
                                            name="anahtar">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control input-default" placeholder="Description"
                                            name="description">
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
    <script src="{{ asset('admin') }}/plugins/summernote/dist/summernote.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/summernote/dist/summernote-init.js"></script>
@endsection

@extends('admin.tema')
@section('admintitle')
    Admin Panel
@endsection
@section('css')
@endsection
@section('content')
    <div class="content-body">

        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modül Ekleme</h4>
                        <p class="text-muted">Websiteniz için otomatik tablo,model ve crud eklemenizi sağlar</p>
                        <div class="basic-form">
                            <form action="#" class="form-inline" method="post">
                                @csrf
                                <div class="form-group mb-2">
                                    <label class="sr-only">Modül İsmi</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" class="form-control" placeholder="Modül İsmi">
                                </div>
                                <button type="submit" class="btn btn-dark mb-2">Modül Oluştur</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

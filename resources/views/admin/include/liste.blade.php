@extends('admin.tema')
@section('admintitle')
    Admin Panel
@endsection
@section('css')
    <link href="{{ asset('admin') }}/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('ekle',$dinamikModul->seflink)}}" class="btn btn-success">YENİ EKLE</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$dinamikModul->baslik}} Listesi</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sıra</th>
                                            <th>Başlık</th>
                                            <th>Açıklama</th>
                                            <th>Tarih</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($veriler)
                                            @foreach ($veriler as $bilgiler)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$bilgiler->baslik}}</td>
                                                    <td>{{mb_substr(strip_tags($bilgiler->metin),0,120,'UTF-8')}}...</td>
                                                    <td>{{$bilgiler->updated_at}}</td>
                                                    <td></td>
                                                    <td>
                                                        <a href="" class="btn btn-primary">Düzenle</a>
                                                        <a href="" class="btn btn-danger">Sil</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sıra</th>
                                            <th>Başlık</th>
                                            <th>Açıklama</th>
                                            <th>Tarih</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admin') }}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
@endsection

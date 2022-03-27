@extends('layout.adminLayout')

@section('title', 'Kelola Kamar')

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambahkan Kamar</h3>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="post" action="/admin/kamar/{{ $kamar->id }}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <input type="hidden" name="gambarLama" value="{{ $kamar->gambar }}">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nomor Kamar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="first-name" class="form-control" name="nomor"
                                placeholder="Harga Kamar" value="{{ $kamar->nomor }}" />
                        </div>
                        <div class="col-md-4">
                            <label>Tipe Kamar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="email-id" class="form-control" name="tipe"
                                placeholder="Tipe Kamar" value="{{ $kamar->tipe }}" />
                        </div>
                        <div class="col-md-4">
                            <label>Harga Kamar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="number" id="contact-info" class="form-control" name="harga"
                                placeholder="Harga Kamar" value="{{ $kamar->harga }}" />
                        </div>
                        <div class="col-md-4">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" style="height: 60px;">{{ $kamar->deskripsi }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label>Gambar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" type="file" id="formFile" name="gambar" >
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

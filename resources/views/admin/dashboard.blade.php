@extends('layout.layout')

@section('title', 'Admin - Dashboard')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/admin/kamar.css') }}">
@endpush

@section('main')
<h3>Kelola Kamar</h3>
<div class="row mt-4">
    <div class="col-12 d-flex justify-content-end mb-3">
        <a href="/admin/kamar/create" class="btn btn-primary me-2">Tambah Kamar</a>
    </div>
    @foreach($kamar as $item)
        @if($item->dipesan)
            <div class="col-6 ">
                <div class="card mb-3 shadow" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 gambar-wrapper">
                            <img src="{{ asset('images/kamar/'.$item->gambar) }}"
                                class="img-kamar rounded-start" alt="Kamar">
                        </div>
                        <div class="col-md-8 card-text">
                            <div class="card-body">
                                <div class="wrapper">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title"><em>{{ $item->tipeKamar->nama }}</em> </h5>
                                        <span class="badge bg-secondary">dipesan</span>
                                    </div>
                                    <label class="card-text nomor-kamar"><small class="text-muted">No.
                                            {{ $item->nomor }}</small></label>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <strong>Rp. {{ $item->harga }}/malam</strong>
                                    <div class="d-flex gap-1">
                                        <form action="/admin/kamar/{{ $item->id }}" method="post"
                                            style="display: inline-block;">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0">Hapus</button>
                                        </form>
                                        <a href="/admin/kamar/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-6 ">
                <div class="card mb-3 shadow" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 gambar-wrapper">
                            <img src="{{ asset('images/kamar/'.$item->gambar) }}"
                                class="img-kamar rounded-start" alt="Kamar">
                        </div>
                        <div class="col-md-8 card-text">
                            <div class="card-body">
                                <div class="wrapper">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title"><em>{{ $item->tipeKamar->nama }}</em> </h5>
                                        <span class="badge bg-success">tersedia</span>
                                    </div>
                                    <label class="card-text nomor-kamar"><small class="text-muted">No.
                                            {{ $item->nomor }}</small></label>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <strong>Rp. {{ $item->harga }}/malam</strong>
                                    <div class="d-flex gap-1">
                                        <form action="/admin/kamar/{{ $item->id }}" method="post"
                                            style="display: inline-block;">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0">Hapus</button>
                                        </form>
                                        <a href="/admin/kamar/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    @endforeach
</div>
@endsection

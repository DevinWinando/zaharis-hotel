@extends('layout.layout')

@section('title', 'Reservasi')

@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pesanan</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>Pemesan</h4>
                            <table class="table table-hover table-bordered mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th class="text-start">No</th>
                                        <th>Nama</th>
                                        <th>No. Telepon</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500 text-start">1</td>
                                        <td>{{ $reservasi->client->nama }}</td>
                                        <td class="text-bold-500">{{ $reservasi->client->telepon }}</td>
                                        <td>{{ $reservasi->client->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 mt-4">
                            <h4>Kamar</h4>
                            <table class="table table-hover table-bordered mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th class="text-start">Nomor Kamar</th>
                                        <th>Tipe Kamar</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500 text-start">1</td>
                                        <td>{{ $reservasi->kamar->nomor }}</td>
                                        <td class="text-bold-500">{{ $reservasi->kamar->tipe->nama }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

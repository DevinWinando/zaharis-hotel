@extends('layout.layout')

@section('title', 'Reservasi')

@section('main')
<h3>Data Reservasi</h3>
<div class="table-responsive mt-4">
    <table class="table table-hover table-borderless mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Pemesan</th>
                <th>No. Kamar</th>
                <th>Tanggal Mulai</th>
                <th>Selesai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservasi as $item)
                <tr>
                    <td class="text-bold-500">{{ $loop->iteration }}</td>
                    <td>{{ $item->client->nama }}</td>
                    <td class="text-bold-500">{{ $item->kamar->nomor }}</td>
                    <td>{{ $item->mulai }}</td>
                    <td>{{ $item->selesai }}</td>
                    <td><a href="reservasi/{{ $item->id }}" class="badge bg-primary link-light">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

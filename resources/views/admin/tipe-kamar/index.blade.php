@extends('layout.layout')

@section('title', 'Reservasi')

@section('main')
<h3>Data Tipe Kamar</h3>
<div class="table-responsive mt-4">
    <table class="table table-hover table-borderless mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipeKamar as $item)
                <tr>
                    <td class="text-bold-500">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td><a href="tipe-kamar/{{ $item->id }}" class="badge bg-primary link-light">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
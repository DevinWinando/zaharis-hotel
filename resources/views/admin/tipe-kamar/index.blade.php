@extends('layout.adminLayout')

@section('title', 'Admin - Dashboard')

@push('style')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}" />
@endpush

@section('main')
<div class="d-flex justify-content-between">
    <h3>Data Tipe Kamar</h3>
    <button class="btn btn-primary d-print-none" onclick="window.print()">Print</button>
</div>
<div class="table-responsive mt-4">
    <table class="table table-borderless table-hover" id="tabel-reservasi">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th class="d-print-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipeKamar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-bold-500">{{ $item->nama }}</td>
                    <td class="d-print-none">
                        <a href="reservasi/{{ $item->id }}" class="badge bg-primary link-light">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        const tabel = document.querySelector('#tabel-reservasi');
        const dataTable = new simpleDatatables.DataTable(tabel)
    </script>
@endpush

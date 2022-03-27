@extends('layout.resepsionisLayout')

@section('title', 'Reservasi')

@push('style')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}" />
@endpush

@section('main')
<div class="d-flex justify-content-between">
    <h3>Data Reservasi</h3>
    <button class="btn btn-primary d-print-none" onclick="window.print()">Print</button>
</div>
<div class="table-responsive mt-4">
    <table class="table table-borderless table-hover" id="tabel-reservasi">
        <thead>
            <tr>
                <th>No</th>
                <th>Pemesan</th>
                <th>No. Kamar</th>
                <th>Tanggal Mulai</th>
                <th>Selesai</th>
                <th>Harga Total</th>
                <th>Status</th>
                <th class="d-print-none">Action</th>
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
                    <td>{{ $item->harga_total }}</td>
                    <td>{{ $item->status }}</td>
                    <td class="d-print-none">
                        <a href="reservasi/{{ $item->id }}" class="badge bg-primary link-light">Detail</a>
                        <button class="badge btn bg-info btn-tipe" data-id="{{ $item->id }}"
                            data-id-kamar={{ $item->kamar->id }} data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Proses</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/resepsionis/reservasi" method="post">
                @csrf
                <div class="modal-body">
                    <select name="status" class="form-control frm" id="floatingInput">
                        <option value="" disabled selected hidden>-Pilih Status-</option>
                        <option value="diproses">Diproses</option>
                        <option value="selesai">Ditempati</option>
                        <option value="selesai">Selesai</option>
                        <option value="batal">Batal</option>
                    </select>
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="idKamar" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

    @if (session('success'))
        <div class="position-absolute">
            <div class="d-flex justify-content-center align-items-center" style="width: 100vw">
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        const buttonTipe = document.querySelectorAll('.btn-tipe');

        buttonTipe.forEach((button) => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const idKamar = this.dataset.idKamar;
                const form = document.querySelector('form');
                form.querySelector('input[name=id]').setAttribute('value', id);
                form.querySelector('input[name=idKamar]').setAttribute('value', idKamar);
            })
        })

        const tabel = document.querySelector('#tabel-reservasi');
        const dataTable = new simpleDatatables.DataTable(tabel)
    </script>
@endpush

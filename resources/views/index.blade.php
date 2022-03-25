<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />

    <script src="https://unpkg.com/phosphor-icons"></script>
</head>

<body>
    <div class="container-fluid" id="navbar">
        <nav class="nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 text-dark text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"> Zaharis Hotel
            </a>

            <div class="nav-menu">
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="#" class="px-2 active nav-link">home</a>
                    </li>
                    <li><a href="#products" class="px-2 nav-link">products</a></li>
                    <li><a href="#faq" class="px-2 nav-link">faqs</a></li>
                    <li><a href="#get-started" class="px-2 nav-link">contact</a></li>
                </ul>
            </div>

            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <a href="#" class="link-dark translate">EN</a>
                <button class="btn pt-2 darkmode-toggle">
                    <i class="ph-moon-bold mt-1 position-absolute"></i>
                    <i class="ph-sun-bold mt-1"></i>
                </button>
                <div class="menu d-flex justify-content-center align-items-center position-relative">
                    <input id="menu_toggle" type="checkbox" />
                    <label class="menu_btn" for="menu_toggle">
                        <span></span>
                    </label>
                </div>
            </div>
        </nav>
    </div>

    <section id="home">
        <div class="row align-items-center container-fluid">
            <div class="col-5">
                <h1>Buat liburanmu menjadi lebih menyenangkan</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus dolore at expedita soluta
                    nemo unde ut optio perspiciatis nesciunt sunt</p>
            </div>
        </div>
    </section>

    <section id="pesan">
        <form action="kamar/pesan">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card-pesan shadow bg-white">
                            <div class="py-5 px-5 d-flex justify-content-center">
                                <div class="select me-3">
                                    <label for="mulai" class="ms-2">Tipe Kamar</label>
                                    <select name="tipe" class="form-control frm" id="floatingInput">
                                        <option value="" disabled selected hidden >-Pilih Tipe-</option>
                                        @foreach($tipeKamar as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="select me-3">
                                    <label for="mulai" class="ms-2">Tanggal Mulai</label>
                                    <input type="date" class="form-control date" name="mulai" id="exampleDatepicker1" />
                                </div>
                                <div class="select me-3">
                                    <label for="mulai" class="ms-2">Tanggal Selesai</label>
                                    <input type="date" class="form-control date" name="selesai"
                                        id="exampleDatepicker1" />
                                </div>
                                <button type="submit" class="btn btn-primary align-self-center py-2"
                                    href="#biodata">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <h1>Pesan Kamar</h1>
                    </div>
                </div>

                <div class="row">
                    @foreach($kamar as $item)
                        @if($item->dipesan == 0)
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
                                                    <h5 class="card-title"><em>{{ $item->tipeKamar->nama }}</em> </h5>
                                                    <label class="card-text nomor-kamar"><small class="text-muted">No.
                                                            {{ $item->nomor }}</small></label>
                                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <strong>Rp. {{ $item->harga }}/malam</strong>
                                                    <div>
                                                        <input type="checkbox" class="btn-check" id="btn-check-{{ $loop->iteration }}" name="kamar[]" value="{{ $item->id }}">
                                                        <label class="btn btn-primary" for="btn-check-{{ $loop->iteration }}">Pesan</label>
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
            </div>
        </form>
    </section>

    <footer></footer>

</body>

</html>

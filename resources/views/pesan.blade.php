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

    <link rel="stylesheet" href="{{ asset('css/pesan.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />

    <script src="https://unpkg.com/phosphor-icons"></script>
</head>

<body>
    <div class="container-fluid" id="navbar">
        <nav class="nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 text-dark text-decoration-none">
                <h5>Hotel Transilvania</h5>
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

    {{-- <section id="home" --}}
        {{-- style="background-image: url('asset('images/kamar/'.$kamar->gambar)}}')"> --}}
        {{-- <div class="container-fluid">
        </div>
    </section> --}}

    <section id="pesan">
        <form action="/kamar/pesan{{-- /$kamar->id --}}" method="post">
            @csrf
            <input type="hidden" name="mulai" value="{{ $req['mulai'] }}">
            <input type="hidden" name="selesai" value="{{ $req['selesai'] }}">
            <input type="hidden" name="tipe" value="{{ $req['tipe'] }}">
            @foreach ($req['kamar'] as $kamar)
                <input type="hidden" name="kamar[]" value="{{ $kamar }}">
            @endforeach
            <div class="container">
                {{-- <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="card-pesan shadow bg-white">
                            <div class="py-5 px-5 d-flex justify-content-center">
                                <div class="select me-3">
                                    <label for="mulai" class="ms-2">Tanggal Mulai</label>
                                    <input type="date" class="form-control date" name="mulai" id="exampleDatepicker1" />
                                </div>
                                <div class="select me-3">
                                    <label for="mulai" class="ms-2">Tanggal Selesai</label>
                                    <input type="date" class="form-control date" name="selesai" id="exampleDatepicker1" />
                                </div>
                                <a class="btn btn-primary align-self-center py-2" href="#biodata">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="row justify-content-center">
                    <div class="col-9">
                        <div class="card card-biodata shadow-lg mt-5" id="biodata">
                            <div class="card-header">
                                <h3 class="card-title text-center">Masukkan Biodatamu</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="nama"
                                                placeholder="Nama" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>No. Telepon</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="tel" id="email-id" class="form-control" name="telepon"
                                                placeholder="Nomor Telepon" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email-id" class="form-control" name="email"
                                                placeholder="Email" />
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>



    <footer></footer>

</body>

</html>

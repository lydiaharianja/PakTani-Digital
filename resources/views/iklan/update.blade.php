<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <link href="{{ asset('app.css') }}" rel="stylesheet" media="all">
    <style>
        .button-tambah {
            background-color: green;
            padding: 10px 20px;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="paktanidigital.png" width="50px"><br>
            <a href="#">Pak Tani Digital</a>
            <div class="search_box">
                <input type="text" placeholder="Search">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </div>
        </div>

        <div class="header-icons">
            <i class="fas fa-bell"></i>
            <div class="account">
                <img src="user.png" width="50px"><br>
                <h4>Admin</h4>
            </div>
        </div>
    </header>
    <div class="container">
        <nav>
            <div class="side_navbar" style="height: 100vh">
                <span>Main Menu</span>
                <a href="{{ route('home') }}" class="">Dashboard</a>
                <a class="active" href="{{ route('iklan') }}">Iklan</a>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </nav>

        <div class="main-body" style="width: 100%">
            <a href="/iklan">
                < Kembali</a>
                    <h2>Ubah Iklan</h2>

                    <br>
                    <div class="form-group">
                        <form action="/iklan/edit/{{ $iklan->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" placeholder="Masukan Judul" name="title"
                                value="{{ $iklan->title }}">
                            <input type="text" placeholder="Masukan Deskripsi" name="description"
                                style="margin-top: 16px; height: 120px;" value="{{ $iklan->description }}">
                            <img src="{{ $iklan->image }}" alt="gambar" width="250px" style="margin-top: 20px"
                                srcset="">
                            <input type="file" name="image" style="padding-top: 12px; margin-top: 16px;"
                                id="image">

                            <button class="button-tambah" type="submit">Simpan</button>
                        </form>
                    </div>
        </div>

    </div>
</body>

</html>

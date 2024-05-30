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
            <h2>Iklan</h2>
            <a href="/iklan/create"><button class="button-tambah">Tambah</button></a>
            <br>
            <table style="width: 100%">
                <tr>
                    <td>Id</td>
                    <td>Judul</td>
                    <td>Deskripsi</td>
                    <td>Image</td>
                    <td>Aksi</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                @foreach ($iklan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ $item->image }}" alt="gambar" width="250px"></td>
                        <td><a href="/iklan/update/{{ $item['id'] }}">Edit</a> | <a
                                href="/iklan/delete/{{ $item['id'] }}">Delete</a></td>
                    </tr>
                @endforeach

            </table>
        </div>

    </div>
</body>

</html>

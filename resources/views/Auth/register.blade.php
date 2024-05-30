@extends('Layout.auth')

@section('title')
    Login
@endsection

@section('content')
<head>
	<title>PAkTANI LOGIN</title>
    <link rel="stylesheet" href="login.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="logo-ptd.png">
		</div>
		<div class="login-content">
        <form action="{{route('login')}}" method="POST">
            @csrf

                    <div class="mb-3">
                        <label for="input-name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="input-name" placeholder="Tuliskan nama anda">
                        @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="input-nomorHP" class="form-label">Nomor Hp</label>
                        <input type="text" name="name" class="form-control" id="input-name" placeholder="Nomor Hp">
                        @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="input-role" class="form-label">Role</label>
                        <select id="role" name="role">
                        <option value="Petani">Petani</option>
                        <option value="Konsumen">Konsumen/pembeli</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="input-email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="input-email" placeholder="Email">
                        @error('email')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="input-password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="input-password" placeholder="Password">
                    </div>

                    <div class="mb-3">
                        <label for="input-password" class="form-label">Ulangi Password</label>
                        <input type="password" name="password" class="form-control" id="input-password" placeholder="Ulangi Password">
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

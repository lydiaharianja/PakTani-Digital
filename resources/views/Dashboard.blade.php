<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <link href="{{ asset('app.css') }}" rel="stylesheet" media="all">
    <style>
        /* Add some basic styling for the slider container and images */
        .slider-container {
            position: relative;
            margin-top: 24px;
        }

        .slider-image {
            width: 100%;
            height: 300px;
            display: none;
            object-fit: cover;
            object-position: center;
        }

        /* Add styles for the navigation arrows */
        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 24px;
            padding: 10px;
            /* background-color: rgba(0, 0, 0, 0.5); */
            color: #fff;
        }

        .prev {
            left: 50px;
        }

        .next {
            right: 50px;
        }

        /* Add styles for the image text and button wrapper */
        .slide-content {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
            text-align: left;
            color: #fff;
            padding: 20px;
            padding-left: 150px;
        }

        .slider-button {
            /* Adjust the margin as needed */
            padding: 10px 20px;
            border-radius: 30px;
            background: #F2991D;
            color: #FFF;
            font-size: 14px;
            font-weight: 600;
        }

        .slider-button:hover {
            color: white;
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
            <div class="side_navbar">
                <span>Main Menu</span>
                <a href="{{ route('home') }}" class="active">Dashboard</a>
                <a href="{{ route('iklan') }}">Iklan</a>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </nav>

        <div class="main-body">
            <h2>Dashboard</h2>
            {{-- <div class="slider-container">
                @foreach ($iklans as $iklan)
                    <img class="slider-image" src="{{ $iklan->image }}" alt="Image 1">
                    <div class="slide-content">
                        <h1>{{ $iklan->title }}</h1>
                        <p>{{ $iklan->description }}</p>
                        <br>
                        <br>
                        <a class="slider-button" href="#">BACA SELENGKAPNYA</a>
                    </div>
                @endforeach



                <span class="prev" onclick="changeSlide(-1)">&#10094;</span>
                <span class="next" onclick="changeSlide(1)">&#10095;</span>
            </div> --}}
            <div style="display: flex; flex-wrap: wrap;">
                <div style="flex: 1;">
                    <h1 style="margin: 2rem 0 2rem; text-align: center;">Registered User</h1>
                    <canvas id="lineChart"></canvas>
                </div>
                <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                    <h1 style="margin: 2rem 0 2rem; text-align: center;">Statistic Ads</h1>
                    <table style="border-collapse: collapse; width: 80%;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #000; padding: 8px;">Produk</th>
                                <th style="border: 1px solid #000; padding: 8px;">Jumlah Postingan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisementStats as $data)
                                <tr>
                                    <td style="border: 1px solid #000; padding: 8px;">{{ $data->kategori }}</td>
                                    <td style="border: 1px solid #000; padding: 8px;">{{ $data->count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="max-width: 600px;">
                <h1 style="margin: 2rem 0 2rem;text-align:center">Statistic Region</h1>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="sidebar">
            <h4>Feedback</h4>

            <div class="feedback">
                <i class="fas user icon"></i>
                <div class="info">
                    <h5>Jekson Pardosi</h5>
                    <span><i class=""></i>Keren</span>
                </div>
            </div>

            <div class="feedback">
                <i class="fas user icon"></i>
                <div class="info">
                    <h5>Esra Aruan</h5>
                    <span><i class=""></i>Kurang memuaskan, karena tidak ada yang jual ikan</span>
                </div>
            </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Include jQuery and Slick slider library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

{{-- <script>
    let slideIndex = 0;
    showSlide(slideIndex);

    function changeSlide(n) {
        showSlide(slideIndex += n);
    }

    function showSlide(n) {
        const slides = document.getElementsByClassName("slider-image");
        const slidesContent = document.getElementsByClassName("slide-content");
        if (n >= slides.length) {
            slideIndex = 0;
        }
        if (n < 0) {
            slideIndex = slides.length - 1;
        }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            slidesContent[i].style.display = "none";
        }
        slides[slideIndex].style.display = "block";
        slidesContent[slideIndex].style.display = "block";
    }
</script> --}}
<script>
    // Data from the controller
    var userRegistrationData = @json($userRegistrations);
    var agricultureData = @json($wilayahData);
    var petaniData = @json($userRegistrationsPetani);
    var pedagangData = @json($userRegistrationsPedagang);

    // Line Chart
    var ctxLine = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: userRegistrationData.map(data => 'Month ' + data.month),
            datasets: [{
                    label: 'Petani Registrations',
                    data: petaniData.map(data => data.count),
                    borderColor: 'blue',
                    fill: false
                },
                {
                    label: 'Pedagang Registrations',
                    data: pedagangData.map(data => data.count),
                    borderColor: 'red',
                    fill: false
                }
            ]
        }
    });

    // Bar Chart for Wilayah Data
    var ctxBarWilayah = document.getElementById('barChart').getContext('2d');
    var provinsiData = @json($wilayahData['provinsi']['data']);
    var provinsiCount = {{ $wilayahData['provinsi']['count'] }};
    var provinsiDataCount = @json($wilayahData['provinsi']['count_data']);
    var adjustedCountData = [];
    for (var i = 0; i < provinsiData.length; i++) {
        adjustedCountData.push(provinsiDataCount[i]);
    }

    var barChartWilayah = new Chart(ctxBarWilayah, {
        type: 'bar',
        data: {
            labels: provinsiData.map(function(provinsi) {
                return provinsi.nama;
            }),
            datasets: [{
                label: 'Jumlah Wilayah',
                data: adjustedCountData,
                backgroundColor: Array(provinsiCount).fill('blue'),
                categoryPercentage: 0.8,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                }
            },
            plugins: {
                legend: false, // Hide the legend
            },
        }
    });

    // Display count labels above each bar
    var chartArea = barChartWilayah.chartArea;
    var ctx = ctxBarWilayah;
    var fontSize = 12; // Adjust the font size as needed

    ctx.font = fontSize + 'px Arial';
    ctx.textAlign = 'center';
    ctx.fillStyle = 'black'; // Set the label color

    for (var i = 0; i < provinsiData.length; i++) {
        var barX = chartArea.left + i * (chartArea.width / provinsiData.length);
        var barY = chartArea.top - 5;
        var label = adjustedCountData[i].toString(); // Get the count data as a string
        ctx.fillText(label, barX, barY);
    }
</script>

</html>

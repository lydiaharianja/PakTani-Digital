<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <link href="{{ asset('app.css') }}" rel="stylesheet" media="all">
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
                <img src="./pic/img.jpg" alt="">
                <h4>WLCadmin</h4>
            </div>
        </div>
    </header>
    <div class="container">
        <nav>
            <div class="side_navbar">
                <span>Main Menu</span>
                <a href="#" class="active">Dashboard</a>
                <a href="#">Profile</a>
                <a href="#">Product Information</a>
                <a href="#">Orders</a>
                <a href="#">Contact</a>
                <a href="#">Feedback</a>
                <a href="{{route('logout')}}">Logout</a>
            </div>
        </nav>

        <div class="main-body">
            <h2>Dashboard</h2>
            <div class="promo_card">
                <h1>Selamat Datang di Pak Tani Digital</h1>
                <span>Situs pertanian</span>
                <button>Informasi lainnya</button>
            </div>
            <div style="max-width: 800px; margin: 0 auto;">
                <h1 style="margin: 2rem 0 2rem;text-align:center">Registered User</h1>
                <canvas id="lineChart"></canvas>
                <h1 style="margin: 2rem 0 2rem;text-align:center">Statistic Ads</h1>
                <canvas id="pieChart"></canvas>
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
<script>
    // Data from the controller
    var userRegistrationData = @json($userRegistrations);
    var advertisementData = @json($advertisementStats);
    var agricultureData = @json($wilayahData);
    console.log('====================================');
    console.log(agricultureData);
    console.log('====================================');

    // Line Chart
    var ctxLine = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: userRegistrationData.map(data => 'Month ' + data.month),
            datasets: [{
                label: 'User Registrations',
                data: userRegistrationData.map(data => data.count),
                borderColor: 'blue',
                fill: false
            }]
        }
    });

    // Pie Chart
    var ctxPie = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: advertisementData.map(data => data.kategori),
            datasets: [{
                data: advertisementData.map(data => data.count),
                backgroundColor: ['green', 'blue', 'orange', 'yellow', 'black', 'pink', 'purple',
                    'grey', 'red'
                ],
            }]
        }
    });

    // Bar Chart for Wilayah Data
    var ctxBarWilayah = document.getElementById('barChart').getContext('2d');
    var barChartWilayah = new Chart(ctxBarWilayah, {
        type: 'bar',
        data: {
            labels: ['Provinsi', 'Kabupaten', 'Kecamatan', 'Kelurahan'],
            datasets: [{
                label: 'Jumlah Wilayah',
                data: [
                    {{ $wilayahData['provinsi'] }},
                    {{ $wilayahData['kabupaten'] }},
                    {{ $wilayahData['kecamatan'] }},
                    {{ $wilayahData['kelurahan'] }}
                ],
                backgroundColor: ['blue', 'green', 'yellow', 'red'],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</html>

@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-4 mb-5">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h3 text-xm font-weight-bold text-dark text-uppercase mb-1">
                            Mobil
                        </div>
                        <div class="mb-0 font-weight-bold text-gray-800">
                            <h1 class="mdi mdi-truck text-right"></h1>
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $mobil_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-5">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div href="categories" class="h3 text-xm font-weight-bold text-dark text-uppercase mb-1">
                            Categories
                        </div>
                        <div class="mb-0 font-weight-bold text-gray-800">
                            <h1 class="mdi mdi-truck text-right"></h1>
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $category_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-5">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h3 text-xm font-weight-bold text-dark text-uppercase mb-1">
                            Users
                        </div>
                        <div class="mb-0 font-weight-bold text-gray-800">
                            <h1 class="mdi mdi-truck text-right"></h1>
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $user_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bar chart</h4>
            <canvas id="myChart" width="852" height="170" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const chartData = @json($chartData);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Histori Peminjaman Mobil',
                data: chartData,
                borderWidth: 1
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
@endsection
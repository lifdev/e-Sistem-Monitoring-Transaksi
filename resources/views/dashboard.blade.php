@extends('layouts/app')

@section('content')

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow py-2" style="height: 150px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Transaksi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalTransaksi }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Minusan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($totalMinusan, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengguna Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalUser }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Area -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Total Minusan Per Bulan</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartMinusan"></canvas>
            </div>
        </div>
    </div>

    <!-- Table Minusan-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Server</th>
                            <th>Nama</th>
                            <th>SPL</th>
                            <th>Produk</th>
                            <th>Nomor</th>
                            <th>Total</th>
                            <th>Qty</th>
                            <th>Total/Org</th>
                            <th>Keterangan</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($minusan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->server }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->spl }}</td>
                                <td>{{ $item->produk }}</td>
                                <td>{{ $item->nomor }}</td>
                                <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ number_format($item->total_per_orang, 0, ',', '.') }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('minusanEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#modalMinusanDestroy{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('admin/minusan/modal', ['item' => $item])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('sbadmin2/js/chart.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("/chart/minusan")
                .then(res => res.json())
                .then(data => {
                    const labels = data.map(item => item.bulan);
                    const totals = data.map(item => item.total_bulanan);

                    const ctx = document.getElementById("chartMinusan").getContext("2d");
                    new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Total Minusan (Rp)",
                                data: totals,
                                backgroundColor: "rgba(78, 115, 223, 0.1)",
                                borderColor: "rgba(78, 115, 223, 1)",
                                borderWidth: 2,
                                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointRadius: 3,
                                tension: 0.3
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return "Rp " + context.formattedValue.replace(
                                                /\B(?=(\d{3})+(?!\d))/g, ".");
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return "Rp " + value.toLocaleString("id-ID");
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(err => console.error("Gagal ambil data:", err));
        });
    </script>
@endsection

@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('minusanCreate') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i>Tambah Data</a>
            </div>
            <div>
                <a href="{{ route('minusanExcel')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>Excel</a>

                <a href="{{ route('minusanPdf')}}" class="btn btn-sm btn-danger" target='__blank'>
                    <i class="fas fa-file-pdf mr-2"></i>PDF</a>
            </div>
        </div>
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
                                <td>{{ number_format($item->total_per_orang * $item->qty, 0, ',', '.') }}</td>
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
@endsection

@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('minusan') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        <div class="card-body">

        <form action="{{ route('minusanStore') }}" method="post">
        @csrf

            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Tanggal :
                    </label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{old('tanggal')}}">
                    @error('tanggal')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>

                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Server :
                    </label>
                    <select name="server" class="form-control @error('server') is-invalid @enderror">
                        <option selected disabled>Pilih Server</option>
                        <option value="CMP">CMP</option>
                        <option value="CCN">CCN</option>
                        <option value="CWN">CWN</option>
                    </select>
                    @error('server')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Nama :
                    </label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                    @error('nama')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>

                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        SPL :
                    </label>
                    <select name="spl" class="form-control @error('spl') is-invalid @enderror">
                        <option selected disabled>Pilih SPL</option>
                        <option value="IFG7">IFG7</option>
                        <option value="CCN">CCN</option>
                        <option value="HB51">HB51</option>
                    </select>
                    @error('spl')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Produk :
                    </label>
                    <select name="produk" class="form-control @error('produk') is-invalid @enderror">
                        <option selected disabled>Pilih Produk</option>
                        <option value="IFG77">IFG77</option>
                        <option value="DV09">DV09</option>
                        <option value="MCE12">MCE12</option>
                    </select>
                    @error('produk')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>

                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Nomor :
                    </label>
                    <input type="number" name="nomor" class="form-control @error('nomor') is-invalid @enderror">
                    @error('nomor')
                    <small class="text-danger">
                        {{ $message }} 
                    </small> 
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Total :
                    </label>
                    <input type="number" name="total" class="form-control @error('total') is-invalid @enderror">
                    @error('total')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>

                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        QTY :
                    </label>
                    <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror">
                    @error('qty')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>
                
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Total Per Orang :
                    </label>
                    <input type="number" name="total_per_orang" class="form-control @error('total_per_orang') is-invalid @enderror">
                    @error('total_per_orang')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>

                <div class="col-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Keterangan :
                    </label>
                    <select name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                        <option selected disabled>Pilih Keterangan</option>
                        <option value="Dialihkan">Dialihkan</option>
                        <option value="Digagalkan">Digagalkan</option>
                    </select>
                    @error('keterangan')
                    <small class="text-danger">
                        {{ $message }}
                    </small> 
                    @enderror
                </div>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>
        </form>
        </div>
    </div>
@endsection

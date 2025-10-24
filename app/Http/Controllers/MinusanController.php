<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minusan;
use App\Exports\MinusanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class MinusanController extends Controller
{
    public function index()
    {
        $data = array(
            'title'                      => 'Data Minusan',
            'menuAdminMinusan'           => 'active',
            'minusan'                    => Minusan::get(),

        );
        return view('admin/minusan/index', $data);
    }

    public function create(){
        $data = array(
            'title'                        => 'Tambah Data Minusan',
            'menuAdminMinusan'             => 'active',

        );
        return view('admin/minusan/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'tanggal'                           => 'required',
            'server'                            => 'required',
            'nama'                              => 'required',
            'spl'                               => 'required',
            'produk'                            => 'required',
            'nomor'                             => 'required',
            'total'                             => 'required',
            'qty'                               => 'required',
            'total_per_orang'                   => 'required',
            'keterangan'                        => 'required',
        ],[
            'tanggal.required'                  => 'Tanggal Tidak Boleh Kosong',
            'server.required'                   => 'Server Tidak Boleh Kosong',
            'nama.required'                     => 'Nama Tidak Boleh Kosong',
            'spl.required'                      => 'SPL Harus di Pilih',
            'produk.required'                   => 'Produk Harus di Pilih',
            'nomor.required'                    => 'Nomor Tidak Boleh Kosong',
            'total.required'                    => 'Total Tidak Boleh Kosong',
            'qty.required'                      => 'Qty Tidak Boleh Kosong',
            'totaL_per_orang.required'          => 'Total Per Orang Tidak Boleh Kosong',
            'keterangan.required'               => 'Keterangan Harus di Pilih',

        ]);

        $minusan = new Minusan;
        $minusan->tanggal             = $request->input('tanggal');
        $minusan->server              = $request->input('server');
        $minusan->nama                = $request->input('nama');
        $minusan->spl                 = $request->input('spl');
        $minusan->produk              = $request->input('produk');
        $minusan->nomor               = $request->input('nomor');
        $minusan->total               = $request->input('total');
        $minusan->qty                 = $request->input('qty');
        $minusan->total_per_orang     = $request->input('total_per_orang');
        $minusan->keterangan          = $request->input('keterangan');
        $minusan->save();

        return redirect()->route('minusan')->with('success','Data Berhasil di Tambahkan');
    }

    public function edit($id){
        $data = array(
            'title'                        => 'Edit Data Minusan',
            'menuAdminMinusan'             => 'active',
            'minusan'                      => Minusan::findOrFail($id),

        );
        return view('admin/minusan/update', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'tanggal'                           => 'required',
            'server'                            => 'required',
            'nama'                              => 'required',
            'spl'                               => 'required',
            'produk'                            => 'required',
            'nomor'                             => 'required',
            'total'                             => 'required',
            'qty'                               => 'required',
            'total_per_orang'                   => 'required',
            'keterangan'                        => 'required',
        ],[
            'tanggal.required'                  => 'Tanggal Tidak Boleh Kosong',
            'server.required'                   => 'Server Tidak Boleh Kosong',
            'nama.required'                     => 'Nama Tidak Boleh Kosong',
            'spl.required'                      => 'SPL Harus di Pilih',
            'produk.required'                   => 'Produk Harus di Pilih',
            'nomor.required'                    => 'Nomor Tidak Boleh Kosong',
            'total.required'                    => 'Total Tidak Boleh Kosong',
            'qty.required'                      => 'Qty Tidak Boleh Kosong',
            'totaL_per_orang.required'          => 'Total Per Orang Tidak Boleh Kosong',
            'keterangan.required'               => 'Keterangan Harus di Pilih',

        ]);
        $minusan = Minusan::findOrFail($id);
        $minusan->tanggal             = $request->input('tanggal');
        $minusan->server              = $request->input('server');
        $minusan->nama                = $request->input('nama');
        $minusan->spl                 = $request->input('spl');
        $minusan->produk              = $request->input('produk');
        $minusan->nomor               = $request->input('nomor');
        $minusan->total               = $request->input('total');
        $minusan->qty                 = $request->input('qty');
        $minusan->total_per_orang     = $request->input('total_per_orang');
        $minusan->keterangan          = $request->input('keterangan');
        $minusan->save();

        return redirect()->route('minusan')->with('success','Data Berhasil di Update');
    }

    public function destroy($id){
        $minusan = Minusan::findOrFail($id);
        $minusan->delete();

        return redirect()->route('minusan')->with('success','Data Berhasil di Hapus');
    }

    public function excel(){
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new MinusanExport, 'DataMinusan_'.$filename.'.xlsx');
    }

    public function pdf(){
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'minusan' => Minusan::get(),
        );

            $pdf = Pdf::loadView('admin/minusan/pdf', $data);
            return $pdf->stream('DataMinusan_'.$filename.'.pdf');
    }
} 

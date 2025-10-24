<!-- Modal -->
<div class="modal fade" id="modalMinusanDestroy{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title }} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">Tanggal</div>
                    <div class="col-6">: {{ $item->tanggal }}</div>

                    <div class="col-6">Server</div>
                    <div class="col-6">: {{ $item->server }}</div>

                    <div class="col-6">Nama</div>
                    <div class="col-6">: {{ $item->nama }}</div>

                    <div class="col-6">SPL</div>
                    <div class="col-6">: {{ $item->spl }}</div>

                    <div class="col-6">Produk</div>
                    <div class="col-6">: {{ $item->produk }}</div>

                    <div class="col-6">Nomor</div>
                    <div class="col-6">: {{ $item->nomor }}</div>

                    <div class="col-6">Total</div>
                    <div class="col-6">: {{ number_format($item->total, 0, ',', '.') }}</div>

                    <div class="col-6">Qty</div>
                    <div class="col-6">: {{ $item->qty }}</div>

                    <div class="col-6">Total/Org</div>
                    <div class="col-6">: {{ number_format($item->total_per_orang * $item->qty, 0, ',', '.') }}</div>

                    <div class="col-6">Keterangan</div>
                    <div class="col-6">: {{ $item->keterangan }}</div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </button>

                <form action="{{ route('minusanDestroy', $item->id)}}" method="post">
                  @csrf
                  @method('delete') 
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCuti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Cuti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('cuti.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Pegawai</label>
                <select name="pegawai" id="" class="form-control">
                    @foreach($pegawai as $item)
                    <option value="{{$item->kode_pegawai}}">{{$item->kode_pegawai}} - {{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Tanggal Cuti</label>
                <input type="date" class="form-control" name="tgl_cuti">
            </div>

            <div class="form-group">
                <label for="">Lama Cuti</label>
                <input type="number" class="form-control" name="lama">
            </div>

            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" class="form-control" name="keterangan">
            </div>

            <button class="btn btn-info" id="submit">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
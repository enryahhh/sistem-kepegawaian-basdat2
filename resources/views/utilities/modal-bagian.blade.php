<!-- Modal -->
<div class="modal fade" id="bagianModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bagian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            @csrf
            <div id="id-bagian">

            </div>
            <div class="form-group">
                <label for="">Nama Bagian</label>
                <input type="text" class="form-control" name="nama_bagian">
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
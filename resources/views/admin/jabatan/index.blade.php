@extends('layouts.master-admin')
@section('section-header','Data Jabatan')
@section('content-admin')

<div class="card">
    <div class="card-body">
    <button class="btn btn-primary mb-2" id="tambah-jabatan">Tambah</button>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Jabatan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($jabatan as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $item->nama_jabatan }}</td>
      <td>
          <button class="btn btn-success ubah" data-toggle="modal" data-id="{{ $item->id_jabatan }}" data-target="#jabatanModal">Ubah</button>
          {{-- <form action="{{route('jabatan.destroy',$item->id_jabatan)}}" class="d-inline" method="post">
            @csrf
            @method('DELETE')
            <button type="submit"
                onClick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')"
                class="delete btn btn-danger">
                Hapus
            </button>
        </form> --}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>

@endsection
@push('script')
    <script>
        $(document).ready(function(){
            var jabatanUrl = <?php echo json_encode(route('jabatan.store')) ?>;

            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $("#tambah-jabatan").click(function(){
                $("#jabatanModal").modal('show');
                $(".modal-body form").attr('action',jabatanUrl);
                $("#jabatanModal form").trigger("reset");
            })

            // $("#submit").click(function(e){
            //     e.preventDefault();
            //     let namajabatan = $("input[name=nama_jabatan]").val();
            //     $.ajax({
            //         url:jabatanUrl,
            //         method:"POST",
            //         data:namajabatan,
            //         success:function(res){
            //             location.reload();
            //         }
            //     })
            // })

            $('.ubah').click(function(){
                let id = $(this).attr('data-id');
                $(".modal-body form #id-jabatan").html(`<input type="hidden" name="id_jabatan" value="${id}"> <input type="hidden" name="_method" value="PUT">`);
                let namaBag = $(this).closest('tr').find('td:nth-child(2)').text();
                console.log(namaBag);
                $(".modal-body form input[name=nama_jabatan]").val(namaBag);
                $(".modal-title").text('Ubah jabatan');
                $(".modal-body form").attr('action',jabatanUrl+'/'+id);
                $(".modal-body form .btn.btn-info").attr('id','update');
            });

        })
    </script>
@endpush
@include('utilities.modal-jabatan')
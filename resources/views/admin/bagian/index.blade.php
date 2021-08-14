@extends('layouts.master-admin')
@section('section-header','Master Bagian')
@section('content-admin')

<div class="card">
    <div class="card-body">
    <button class="btn btn-primary mb-2" id="tambah-bagian">Tambah</button>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Bagian</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($bagian as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $item->nama_bagian }}</td>
      <td>
          <button class="btn btn-success ubah" data-toggle="modal" data-id="{{ $item->id_bagian }}" data-target="#bagianModal">Ubah</button>
          {{-- <form action="{{route('bagian.destroy',$item->id_bagian)}}" method="post">
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
            var bagianUrl = <?php echo json_encode(route('bagian.store')) ?>;

            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $("#tambah-bagian").click(function(){
                $("#bagianModal").modal('show');
                $(".modal-body form").attr('action',bagianUrl);
                $("#bagianModal form").trigger("reset");
            })

            // $("#submit").click(function(e){
            //     e.preventDefault();
            //     let namaBagian = $("input[name=nama_bagian]").val();
            //     $.ajax({
            //         url:bagianUrl,
            //         method:"POST",
            //         data:namaBagian,
            //         success:function(res){
            //             location.reload();
            //         }
            //     })
            // })

            $('.ubah').click(function(){
                let id = $(this).attr('data-id');
                $(".modal-body form #id-bagian").html(`<input type="hidden" name="id_bagian" value="${id}"> <input type="hidden" name="_method" value="PUT">`);
                let namaBag = $(this).closest('tr').find('td:nth-child(2)').text();
                console.log(namaBag);
                $(".modal-body form input[name=nama_bagian]").val(namaBag);
                $(".modal-title").text('Ubah Bagian');
                $(".modal-body form").attr('action',bagianUrl+'/'+id);
                $(".modal-body form .btn.btn-info").attr('id','update');
            });

            $(".modal-body form").on('click','#update',function(){
                $.ajax({

                })
            });
        })
    </script>
@endpush
@include('utilities.modal-bagian')
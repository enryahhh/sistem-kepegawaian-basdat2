@extends('layouts.master-admin')
@section('section-header','Master Pegawai')
@section('content-admin')

<div class="card">
    <div class="card-body">
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-2">Tambah</a>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th>Kode Pegawai</th>
      <th>Nama Pegawai</th>
      <th>Bagian</th>
      <th>Jabatan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
       @foreach($pegawai as $item)
    <tr>
      <th scope="row">{{$item -> kode_pegawai}}</th>
      <td>{{ $item->nama }}</td>
      <td>{{ $item->nama_bagian }}</td>    
      <td> {{ $item->nama_jabatan }} </td>
      <td>
          <a class="btn btn-success ubah" href="{{ route('pegawai.edit',$item->kode_pegawai) }}">Ubah</a>
          <form action="{{route('pegawai.destroy',$item->kode_pegawai)}}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                onClick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')"
                class="delete btn btn-danger">
                Hapus
            </button>
        </form>
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
       
    </script>
@endpush
@include('utilities.modal-bagian')
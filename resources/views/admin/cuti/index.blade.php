@extends('layouts.master-admin')
@section('section-header','Data Cuti')
@section('content-admin')

<div class="card">
    <div class="card-body">
    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalCuti">Tambah</button>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pegawai</th>
      <th>Tanggal Cuti</th>
      <th>Lama Cuti</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
      @foreach($cuti as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $item->pegawai->nama }}</td>
      <td>{{ $item->tgl_cuti }}</td>
      <td>{{ $item->lama_cuti }}</td>
      <td>{{ $item->keterangan }}</td>
      <td>
      <form action="{{route('cuti.destroy',$item->id_cuti)}}" method="post" class="d-inline">
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
   
@endpush
@include('utilities.modal-cuti')

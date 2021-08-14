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
      <th>Nama Pegawai</th>
      <th>Tanggal Cuti</th>
      <th>Lama Cuti</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
     {{-- @foreach($cuti as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $item->nama }}</td>
      <td>{{ $item->tgl_cuti }}</td>
      <td>{{ $item->lama_cuti }}</td>
      <td>{{ $item->keterangan }}</td>
    </tr>
    @endforeach --}}
  </tbody>
</table>
    </div>
</div>

@endsection
@push('script')
   
@endpush

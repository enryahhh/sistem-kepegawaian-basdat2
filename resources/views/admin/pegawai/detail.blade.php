@extends('layouts.master-admin')
@section('section-header','Detail Pegawai')
@section('content-admin')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <img width="300" src="{{ asset('img/'.$pegawai->photo) }}" alt="">
            </div>

            <div class="col-lg-8">
                <p>Nama Pegawai : <span>{{ $pegawai->nama }}</span></p> 
                <p>Jenis Kelamin : <span>{{ $pegawai->jenis_kelamin }}</span></p>
                <p>Agama : <span>{{ $pegawai->agama }}</span></p>
                <p>Alamat : <span>{{ $pegawai->alamat }}</span></p>
                <p>Tanggal Lahir : <span>{{ $pegawai->tgl_lahir }}</span></p>
                <p>Gaji : <span>{{ $pegawai->gaji }}</span></p>
                <p>No telp : <span>{{ $pegawai->no_telp }}</span></p>
                <p>Status : <span>{{ $pegawai->status }}</span></p>
                <p>Bagian : <span>{{ $pegawai->bagian->nama_bagian }}</span></p>
                <p>Jabatan : <span>{{ $pegawai->jabatan->nama_jabatan }}</span></p>

                <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
    <script>
       
    </script>
@endpush
@include('utilities.modal-bagian')
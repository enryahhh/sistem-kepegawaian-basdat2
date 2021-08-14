@extends('layouts.master-admin')
@section('section-header','Data Pegawai')
@section('content-admin')

<div class="card">
            <div class="card-body">
            @if (@session('pesan'))
            <div class="alert alert-success pesan">
                <p>{{ session('pesan') }}</p>
            </div>
            @endif
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <div class="row">
                    <div class="col-md-12">
                    <form method="POST" action="{{route('pegawai.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label>Kode Pegawai</label>
                            <input type="text" name="kode" value="{{ $kode }}" readonly="" class="form-control" >
                        </div>
                       
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama" class="form-control" id="formGroupExampleInput" >
                            @error('nama')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="d-block">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="jk" type="radio" id="inlineradio1" value="Pria">
                                <label class="form-check-label" for="inlineradio1">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="jk" type="radio" id="inlineradio2" value="Wanita">
                                <label class="form-check-label" for="inlineradio2">Wanita</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Agama</label>
                            <select name="agama" id="" class="form-control">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" id="" cols="30" rows="20"></textarea>
                            <!-- <input type="number" class="form-control" id="formGroupExampleInput2" min="1"> -->
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="inlineFormInputGroup" min="1">
                            <!-- <input type="number" class="form-control" id="formGroupExampleInput2" min="1"> -->
                        </div>

                        <div class="form-group">
                            <label>Nomor Telp</label>
                            <input type="text" name="no_telp" class="form-control" id="inlineFormInputGroup" min="1">
                            <!-- <input type="number" class="form-control" id="formGroupExampleInput2" min="1"> -->
                        </div>

                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="status" type="radio" id="inlineradio1" value="Menikah">
                                <label class="form-check-label" for="inlineradio1">Menikah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="status" type="radio" id="inlineradio2" value="Belum Menikah">
                                <label class="form-check-label" for="inlineradio2">Belum Menikah</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" id="inlineFormInputGroup" >
                            <!-- <input type="number" class="form-control" id="formGroupExampleInput2" min="1"> -->
                        </div>

                        <div class="form-group">
                            <label for="">Bagian</label>
                            <select name="bagian" id="" class="form-control">
                                <option value="">Pilih Bagian</option>
                                @foreach($bagian as $itemB)
                                <option value="{{ $itemB->id_bagian }}">{{ $itemB->nama_bagian }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <select name="jabatan" id="" class="form-control">
                            <option value="">Pilih Jabatan</option>
                                @foreach($jabatan as $itemJ)
                                    <option value="{{ $itemJ->id_jabatan }}">{{ $itemJ->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Gaji</label>
                            <input type="number" name="gaji" class="form-control" id="inlineFormInputGroup" min="1">
                            <!-- <input type="number" class="form-control" id="formGroupExampleInput2" min="1"> -->
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </div>
                </div>
            </div>
</div>

@endsection
@push('script')
<script>
</script>
@endpush
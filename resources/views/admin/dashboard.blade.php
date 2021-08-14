@extends('layouts.master-admin')
@section('section-header','Dashboard')
@section('content-admin')

<div class="row">
    <!-- card stok -->
    <div class="col-md-3 d-flex align-items-stretch">
        <div class="card card-statistic-1 pt-3">
            <div class="card-icon bg-primary">
            <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Pegawai</h4>
                </div>
                <div class="card-body">
                {{ $jmlh }}
                   
                </div>
            </div>
        </div>
    </div>
    <!-- end card stok -->


</div>


@endsection
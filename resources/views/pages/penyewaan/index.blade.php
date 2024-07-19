@extends('layouts.app')

@section('title', 'Penyewaan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')





<!--end breadcrumb-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penyewaan</h1>
            <div class="section-header-button">
                <a href="{{ route('penyewaan.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Penyewaan</a></div>
                <div class="breadcrumb-item"><a href="#">All Penyewaan</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
        </div>
        <div class="float-right">
            <form method="GET" action="{{route('penyewaan.index')}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="search" name="name">
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix mb-3">
            <a class="btn btn-sm btn-success px-2" style="margin-bottom:10px"
                href="{{ route("penyewaan.cetak") }}">
    <ion-icon name="add"></ion-icon> Print PDF</a>
        </div>
                        <div class="table-responsive">
                            <table class="table-striped mb-0 table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>nomor_sewa</th>
                                        <th>customer</th>
                                        <th align="center">total_penyewaan</th>
                                        <th align="center">status_penyewaan</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>

                                @foreach ($penyewaan as $penyewaan)

                                <tr>
                                    <td>{{ $penyewaan->id }}</td>
                                    <td>{{ $penyewaan->nomor_sewa }}</td>
                                    <td>{{ $penyewaan->customer }}</td>
                                    <td align="right">{{ number_format($penyewaan->total_penyewaan) }}</td>
                                    <td align="center">{{ $penyewaan->status_penyewaan }}</td>
                                    <td>
                                    <a class="btn btn-info" href="{{ route('penyewaandetail.list', ['id' => $penyewaan->id]) }}">
                                    <ion-icon name="bag-handle-sharp"></ion-icon> Detail</a>
                                        @if($penyewaan->total_pembelian==0)
                                        <a class="btn btn-primary" href="{{ route('penyewaan.edit',$penyewaan->id) }}">
                                            <ion-icon name="pencil-sharp"></ion-icon> Edit</a>
                                        <a class="btn btn-danger" href="{{ route('penyewaan.show',$penyewaan->id) }}">
                                            <ion-icon name="trash-outline"></ion-icon> Delete</a>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush

@extends('layouts.app')

@section('title', 'Penyewaan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')<!--start breadcrumb-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Advanced Forms</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Advanced Forms</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Komik</h2>


                    <div class="card">

                        <form action="{{ route('penyewaandetail.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">penyewaan_id:&nbsp;{{ $id }}</label>
                                        <input type="hidden" name="penyewaan_id" class="form-control" placeholder="penyewaan_id" value="{{$id}}">
                                        @error('penyewaan_id')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="search">search:</label>
                                        <input type="text" id="search" name="search" class="form-control" placeholder="search" autocomplete="off">
                                        <div id="suggestions" class="autocomplete-suggestions"></div>
                                        @error('search')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="search">kode_komik:</label>
                                        <input type="text" id="kode_komik" name="kode_komik" class="form-control" placeholder="kode_komik" autocomplete="off">
                                        @error('kode_komik')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="search">nama_komik:</label>
                                        <input type="text" id="nama_komik" name="nama_komik" class="form-control" placeholder="nama_komik" autocomplete="off">
                                        @error('nama_komik')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">tanggal_sewa:</label>
                                        <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" autocomplete="off" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">tanggal_dikembalikan:</label>
                                        <input type="date" name="tanggal_dikembalikan" id="tanggal_dikembalikan" class="form-control" autocomplete="off" value="0">

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">harga:</label>
                                        <input type="text" name="harga" id="harga" class="form-control" placeholder="harga" value="0">
                                        @error('harga')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Quantity:</label>
                                        <div class="col-1">
                                            <input type="text" name="qty" id="qty" class="form-control" placeholder="qty" value="1" required min="1" onchange="hitungSubtotal()">
                                        </div>
                                        @error('qty')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">subtotal:</label>
                                        <input type="text" name="subtotal" id="subtotal" class="form-control" placeholder="subtotal">
                                        @error('subtotal')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                </div>
                           </form>
                    </div>




        </div>
    </section>
</div>
@endsection

@push('scripts')


    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/aa/qiwul.js') }}"></script>




    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

@endpush

@extends('layouts.app')

@section('title', 'PenyewaanDetail')

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
                <a href="{{ route('penyewaandetail.create', ['id' => $id]) }}" class="btn btn-primary">Add New</a>
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
        <div class="card-body">
            <a class="btn btn-sm btn-success px-2" style="margin-bottom:10px"
                href="{{ route("penyewaandetail.cetak") }}">
    <ion-icon name="add"></ion-icon> Print PDF</a>
        <div class="clearfix mb-3"></div>

        <div class="card-header py-2">
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class="">
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">penyewaan ID</strong><br>
                            <strong class="text-inverse">Nomor Sewa</strong><br>
                            <strong class="text-inverse">Customer</strong><br>
                            <strong class="text-inverse">Jenis Pembayaran</strong><br>
                            <strong class="text-inverse">Total Pembelian</strong><br>
                            <strong class="text-inverse">Status Pembayaran</strong><br>
                        </address>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <address class="m-t-5 m-b-5">
                        @if ($penyewaan->isNotEmpty())
                            @php
                                $detail = $penyewaan->first();
                                $total = number_format($detail->total_penyewaan,2);
                                $lunas = $detail->status_penyewaan;
                            @endphp
                            {{ $detail->id }}<br>
                            {{ $detail->nomor_sewa }}<br>
                            {{ $detail->customer }}<br>
                            {{ $detail->jenis_penyewaan }}<br>
                            {{ $total }}<br>
                            {{ $lunas }}<br>

                        @endif
                        </address>
                    </div>
                </div>
                <div class="col">
                @if($lunas=='LUNAS')
                    <img <img src="{{ asset('images/lunas1.png') }}" class="logo-icon" alt="Lunas Image">
                @endif
                </div>
            </div>
        </div>
                        <div class="table-responsive">
                            <table class="table-striped mb-0 table">
                                <div class="d-flex align-items-center" style="display: flex; justify-content: space-between;">
                                    <h5 class="mb-0" id="Title" style="float: left;">Data penyewaan Detail</h5>
                                    <div id="display" style="float: right;">
                                        <div id="nilai"><h1>{{ $total }}</h1></div>
                                    </div>
                                </div>
                                @if ($message = Session::get("success"))
                                    <div id="alert" class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                    <script>
                                        // Timeout function to hide the alert after 2 seconds
                                        setTimeout(function() {
                                            document.getElementById('alert').style.display = 'none';
                                        }, 2000); // 2000 milliseconds = 2 seconds
                                    </script>
                                @endif
                                <div class="table-responsive mt-3">
                                @if($lunas!='LUNAS')
                                    <a class="btn btn-sm btn-success px-2" style="margin-bottom:10px"
                                    href="{{ route('penyewaandetail.create',['id' => $id]) }}">
                                    <ion-icon name="add"></ion-icon> Tambah Data</a>
                                @endif

                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>id</th>
                                                <th>kode_komik</th>
                                                <th>nama_komik</th>
                                                <th>tanggal_sewa</th>
                                                <th>tanggal_dikembalikan</th>
                                                <th>qty</th>
                                                <th>harga</th>
                                                <th>subtotal</th>
                                                @if($lunas!='LUNAS')
                                                <th width="280px">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($penyewaandetail as $penyewaandetail)
                                            <tr>
                                                <td>{{ $penyewaandetail->id }}</td>
                                                <td>{{ $penyewaandetail->kode_komik }}</td>
                                                <td>{{ $penyewaandetail->komik->nama_komik }}</td>
                                                <td>{{ $penyewaandetail->tanggal_sewa }}</td>
                                                <td>{{ $penyewaandetail->tanggal_dikembalikan }}</td>
                                                <td>{{ $penyewaandetail->qty }}</td>
                                                <td>{{ number_format($penyewaandetail->harga) }}</td>
                                                <td>{{ number_format($penyewaandetail->subtotal) }}</td>
                                                @if($lunas!='LUNAS')
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <form method="POST" action="{{ route('penyewaandetail.destroy', ['detail_id' => $penyewaandetail->id, 'penyewaan_id' => $penyewaandetail->penyewaan_id]) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <ion-icon name="trash-outline"></ion-icon> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                    @if($lunas!='DIKEMBALIKAN' && $total<>0)
                                    <div class="d-flex align-items-center" style="display: flex; justify-content: flex-end;">
                                        <a class="btn btn-sm btn-primary px-2" style="margin-top: 10px;" href="{{ route('penyewaandetail.lunas',['id' => $id]) }}">
                                        <ion-icon name="bag-check-sharp"></ion-icon> Set Lunas</a>
                                    </div>
                                    @endif
                                </div>
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

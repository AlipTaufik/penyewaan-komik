@extends('layouts.app')

@section('title', 'Komik')

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
            <h1>Komik</h1>
            <div class="section-header-button">
                <a href="{{ route('komik.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Komik</a></div>
                <div class="breadcrumb-item"><a href="#">All Komik</a></div>
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
            <form method="GET" action="{{route('komik.index')}}">
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
                href="{{ route("komik.cetak") }}">
    <ion-icon name="add"></ion-icon> Print PDF</a>
        </div>
                        <div class="table-responsive">
                            <table class="table-striped mb-0 table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>kode_komik</th>
                                        <th>nama_komik</th>
                                        <th>harga per sewa</th>
                                        <th>genre</th>
                                        <th>image</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>

                                @foreach ($komik as $komiks)
                                <tr>
                                    <td>{{ $komiks->id }}</td>
                                    <td>{{ $komiks->kode_komik }}</td>
                                    <td>{{ $komiks->nama_komik }}</td>
                                    <td>{{ number_format($komiks->harga, 2, '.', ',') }}</td>
                                    <td>{{ $komiks->genre }}</td>
                                    <td>
                                        @if ($komiks->image)
                                            <img src="{{ asset('storage/komik/'.$komiks->image)}}" alt=""
                                            width="250px" class="img-thumbnail">
                                            @else
                                            <span class="badge badge-danger">No image</span>

                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('komik.edit',$komiks->id)}}">
                                            <ion-icon name="pencil-sharp"></ion-icon> Edit</a>
                                        <a class="btn btn-danger" href="{{route('komik.show', $komiks->id)}}">
                                            <ion-icon name="trash-outline"></ion-icon> Delete</a>
                                        <a class="btn btn-secondary" href="{{route('penyewaan.create')}}">
                                            <ion-icon name="bag-check-outline"></ion-icon> Sewa</a>

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

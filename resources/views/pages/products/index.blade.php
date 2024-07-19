@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product</h1>
                <div class="section-header-button">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item"><a href="#">All Product</a></div>
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
                <form method="GET" action="{{route('product.index')}}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="search" name="name">
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Stok</th>
                                            <th>Photo</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                        @foreach ($products as $product )
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->category}}</td>
                                            <td>{{$product->stok}}</td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/products/'.$product->image)}}" alt=""
                                                    width="100px" class="img-thumbnail">
                                                    @else
                                                    <span class="badge badge-danger">No image</span>

                                                @endif
                                            </td>
                                            <td>{{$product->created_at}}</td>
                                            <td >
                                                <div class="d-flex justify-content-center">
                                                <a href='{{route('product.edit', $product->id)}}'
                                                    class="btn btn-sm btn-info btn-icon">
                                                <i class="fas fa-edit"></i>Edit</a>
                                                </div>

                                            <form action="{{route('product.destroy', $product->id)}}" method="POST" class="ml-2">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete"><i class="fas fa-times"></i>
                                                Delete
                                                </button>

                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                </table>
                            </div>
                            <div class="float-right">
                                {{$products->withQueryString()->links()}}
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

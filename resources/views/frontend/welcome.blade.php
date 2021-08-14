@extends('frontend.layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center" style="height: 350px">
            <div class="col-12">
                <div class="card shadow ">
                    <div class="card-header d-flex justify-content-between">
                        Ecommerce 
                        <a href="#" class="btn btn-primary btn-sm"><i class="feather-shopping-bag"></i></a>

                    </div>
                    <div class="card-body px-5">
                        <div class="owl-carousel">
                            @foreach ($carousel as $key => $item)
                                <div class="owl-tem mb-2">
                                   <div class="card shadow">
                                       <div class="card-body p-5">
                                           <p class="d-flex justify-content-center p-0 m-0">
                                             <img src="{{ $item->image }}"  height="100" alt="">
                                           </p>
                                        <hr>
                                        <p class="mb-0 d-flex justify-content-between">
                                            <span class="badge badge-danger "><strong>{{ $item->price}}</strong>KS</span>
                                            <span class=""><strong>{{ $item->name }}</strong></span>
                                        </p>
                                       </div>
                                   </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        All Product
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($product as $item)
                            <div class="col-md-3 col-12 mb-5">
                                <div class="card shadow">
                                    <div class="card-header">
                                        {{ $item->name }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-center">
                                            <img src="{{ $item->image }}" width="150" height="130" alt="{{ $item->name }}">
                                        </p>
            
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="feather-eye"></i></a>
                                        <span><strong class="text-info">{{ $item->price }}</strong> MMK</span>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="feather-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 shadow-sm">
                <div class="paginate float-right">{!! $pages !!}</div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                rtl: true,
                margin: 10,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 1500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        loop: true
                    },
                    600: {
                        items: 2,
                        loop: true
                    },
                    1000: {
                        items: 3,
                        loop: true
                    }
                }
            });
        });
    </script>
@endsection

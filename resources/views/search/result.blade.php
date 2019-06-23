@extends('layouts.customer')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row">
                    @foreach($result['rest'] as $item)
                        <div class="card col-md-3">
                            <img class="card-img-top mt-2" src="{{ $item['image_url']['shop_image1'] }}" alt="No Image">
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">{{ $item['name'] }}</h5>
                                </a>
                                <p class="card-text">{{ $item['access']['line'] }}{{ $item['access']['station'] }} {{ $item['access']['walk'] }}分</p>
                                <p class="card-text">{{ $item['category'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
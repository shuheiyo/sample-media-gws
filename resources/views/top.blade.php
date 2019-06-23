@extends('layouts.customer')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4 mb-4">
                <div class="row px-5">
                    <div class="col-md-5 bg-light">
                        <form class="pt-3" action="{{ route('restaurant.search') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="range">現在地からの距離</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="range">
                                        @foreach($range_list as $key => $range_item)
                                            <option value="{{$key}}">{{$range_item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <div class="form-group row">
                                <div class="offset-sm-5 col-sm-7">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-location-arrow"></i> この近くを検索
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div id="location_error"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function() {
            var startPos;
            var geoSuccess = function(position) {
                startPos = position;
                document.getElementById('latitude').value = startPos.coords.latitude;
                document.getElementById('longitude').value = startPos.coords.longitude;
            };
            var geoError = function(error) {
                console.log('Error occurred. Error code: ' + error.code);
                document.getElementById('location_error').innerHTML = "位置情報を取得できませんでした。";
                // error.code can be:
                //   0: unknown error
                //   1: permission denied
                //   2: position unavailable (error response from location provider) ---> httpsでアクセスする必要あり
                //   3: timed out
            };
            navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
        };
    </script>
@endsection
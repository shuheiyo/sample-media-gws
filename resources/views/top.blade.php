@extends('layouts.customer')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4 mb-4">
                <div class="row px-5">
                    <div class="col-md-5 bg-light">
                        <form class="pt-3" action="">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="distance">現在地からの距離</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="distance">
                                        <option value="300">300m</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-5 col-sm-7">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-location-arrow"></i> この近くを検索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
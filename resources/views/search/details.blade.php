@extends('layouts.customer')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9 border-bottom mb-3">
                <div class="row">
                    <div class="col-md-8">
                        <h2>{{ $data->name }}</h2>
                        <div class="row">
                            <dl class="col-md-4 mb-0"><dt style="float: left">最寄駅 :</dt><dd style="margin-left: 4rem">{{ $data->station }}</dd></dl>
                            <dl class="col-md-4 mb-0"><dt style="float: left">ジャンル :</dt><dd style="margin-left: 4rem">{{ $data->category_name }}</dd></dl>
                        </div>
                        <div class="row">
                            <dl class="col-md-4 mb-0"><dt style="float: left">予算 :</dt><dd style="margin-left: 4rem">@if($data->budget === '')不明@else¥{{ $data->budget }}@endif</dd></dl>
                            <dl class="col-md-4 mb-0"><dt style="float: left">定休日 :</dt><dd style="margin-left: 4rem">@if($data->holiday === '')不明@else{{ $data->holiday }}@endif</dd></dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 mb-5">
                <div class="row">
                    <div class="col-md-8 border-bottom pb-2">
                        <div class="row justify-content-center mb-3">
                            <img src="{{ $data->shop_image1 }}" alt="No Image">
                        </div>
                        <div class="row">
                            <h4>{{ $data->pr_short }}</h4>
                        </div>
                        <div class="row">
                            <div>{{ $data->pr_long }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="mb-2">店舗基本情報</div>
                            <table class="table">
                                <tbody>
                                <tr><th scope="row">店名</th><td>{{ $data->name }}</td></tr>
                                <tr><th scope="row">ジャンル</th><td>{{ $data->category_name }}</td></tr>
                                <tr><th scope="row">予約・お問い合わせ</th><td>{{ $data->telephone }}</td></tr>
                                <tr><th scope="row">住所</th><td>{{ $data->address }}</td></tr>
                                <tr><th scope="row">交通手段</th><td>{{ $data->line }} {{ $data->station }} {{ $data->walk }}分</td></tr>
                                <tr><th scope="row">営業時間・定休日</th><td><div style="font-weight: bold">営業時間</div><div>@if($data->open_time === '')不明@else{{ $data->open_time }}@endif</div><div style="font-weight: bold">定休日</div><div>@if($data->holiday === '')不明@else{{ $data->holiday }}@endif</div></td></tr>
                                <tr><th scope="row">予算</th><td>@if($data->budget === '')不明@else¥{{ $data->budget }}@endif</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
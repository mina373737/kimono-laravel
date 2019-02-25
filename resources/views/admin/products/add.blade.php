{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'販売商品の新規追加'を埋め込む --}}
@section('title', '販売商品の新規追加')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>販売商品の新規追加します</h2>
            </div>
        </div>
    </div>
@endsection

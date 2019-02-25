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
                <form action="#" method="post">
                  <p>商品名:<br>
                  <input type="text" name="name"></p>
                  <p>税込価格:<br>
                  <input type="text" name="price"></p>
                  <p>商品写真:<br>
                    {{ Form::file('thefile') }}
                  <input name="thefile" type="file">
                  {{Form::file('thefile', ['class' => 'field'])}}
                  <input class="field" name="thefile" type="file">
                </form>
            </div>
        </div>
    </div>
@endsection

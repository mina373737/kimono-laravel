{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'販売商品の新規追加'を埋め込む --}}
@section('title', '販売商品の新規追加')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>販売商品の新規追加</h2>
                  <form action="{{ action('Admin\ProductsController@create') }}" method="post" enctype="multipart/form-data">

                @if(count($errors)>0)
                  <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                           @endforeach
                       </ul>
                   @endif

                     <p>商品名:<br>
                     <input type="text" name="name" value="{{ old('productName') }}"></p>
                     <p>税込価格:<br>
                     <input type="text" name="price" value="{{ old('productPrice') }}"></p>
                       <div class="form-group row">
                         <label class="col-md-2" for="title">商品写真</label>
                           <div class="col-md-10">
                             <input type="file" class="form-control-file" name="image">
                           </div>
                       </div>
                       {{ csrf_field() }}
                       <input type="submit" class="btn btn-primary" value="更新">

                    </form>
            </div>
        </div>
    </div>
@endsection

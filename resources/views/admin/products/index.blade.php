@extends('layouts.admin')
@section('title', '登録済み商品の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>登録商品一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProductsController@create') }}" role="button" class="btn btn-primary">商品の新規追加</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProductsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">商品名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-products col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">商品名</th>
                                <th width="20%">税込価格</th>
                                <th width="50%">商品写真</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $products)
                                <tr>
                                    <th>{{ $products->id }}</th>
                                    <td>{{ str_limit($products->name, 30) }}</td>
                                    <td>{{ str_limit($products->price, 10) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ProductsController@edit', ['id' => $products->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\ProductsController@delete', ['id' => $products->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

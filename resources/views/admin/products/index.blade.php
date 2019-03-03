@extends('layouts.admin')
@section('title', '登録済み商品の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>登録商品一覧</h2>
        </div>
        <div class="row">
           <div class="list-products col-md-12 mx-auto">
               <div class="row">
                   <table class="table table-dark">
                       <thead>
                           <tr>
                               <th width="5%">ID</th>
                               <th width="15%">商品名</th>
                               <th width="20%">税込価格</th>
                               <th width="20%">商品説明</th>
                               <th width="30%">商品写真</th>
                               <th width="10%">機能</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($posts as $products)
                               <tr>
                                   <th>{{ $products->id }}</th>
                                   <td>{{ str_limit($products->name, 30) }}</td>
                                   <td>{{ str_limit($products->price, 10) }}</td>
                                   <td>{{ str_limit($products->description, 250) }}</td>
                                   <td>
                                     <img width=100px height=100px src="{{ asset('storage/image/' . $products->image_path) }}" alt="thumbnail">
                                   </td>
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

{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')



{{-- admin.blade.phpの@yield('title')に'販売商品一覧'を埋め込む --}}
@section('title', '販売商品一覧')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>販売商品一覧</h2>
            </div>
            <div class="row">
              <div class="col-md-4">
                <a href="{{ action('Admin\ProductsController@add')}}" role="button" class="btn btn-primary">新規作成</a>
              </div>
              <div class="col-md-8">
                <form action="{{action('Admin\ProductsController@index')}}" method="get">
                  <div class="form-group row">
                    <label class="col-md-2">商品名</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="cond_title" value="{{$cond_title}}">
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
              <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ str_limit($news->title, 100) }}</td>
                                    <td>{{ str_limit($news->body, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;



class ProductsController extends Controller
{
    //

    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if($cond_title !=''){
        //検索されたら検索結果を取得する
        $posts = News::where('title',$cond_title)->get();
      }else{
        //それ以外はすべての商品を取得する
        $posts = News::all();
      }
      return view('admin.products.index',['posts' => $posts, 'cond_title' => $cond_title]);
    }


    public function add()
    {
      return view('admin.products.create');
    }

    public function create(Request $request)
    {
       \Debugbar::info($request);
       \Debugbar::info($request->file('image'));

      // Varidationを行う
      $this->validate($request, Products::$rules);

      $products = new Products;
      $form = $request->all();

       \Debugbar::info($form);

      // フォームから画像が送信されてきたら、保存して、$products->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $products->image_path = basename($path);
      } else {
        $products->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $products->fill($form);
      $products->save();

      return redirect('admin/products/create');
  }

  public function edit()
  {
    return view('admin.lessons.edit');
  }

  public function update()
  {
    return redirect('admin/update/index');
  }

  public function destroy()
  {
    return redirect('admin.lessons.index');
  }
}

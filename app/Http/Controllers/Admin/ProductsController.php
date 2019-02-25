<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //
    public function index()
    {
      return view('admin.products.index');
    }

    public function add()
    {
      return view('admin.products.create');
    }

    public function create(Request $request)
    {

      // Varidationを行う
      $this->validate($request, Products::$rules);

      $products = new Products;
      $form = $request->all();

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
      return view('admin.product.edit');
    }
    public function update()
    {
      return redirect('admin/update/index');
    }
    public function destroy()
    {
      return redirect('admin/products/index');
    }
}

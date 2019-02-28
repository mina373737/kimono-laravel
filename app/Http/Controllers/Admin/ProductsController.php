<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\History;
use Carbon\Carbon;




class ProductsController extends Controller
{
    //

    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if($cond_title !=''){
        //検索されたら検索結果を取得する
        $posts = Products::where('title',$cond_title)->get();
      }else{
        //それ以外はすべての商品を取得する
        $posts = Products::all();
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

  public function edit(Request $request)
  {
    //Products Modelからデータを取得する
    $products = Products::find($request->id);
    if(empty($products)){
      abort(404);
    }
    return view('admin.products.edit',['products_form' => $products]);
  }

  public function update(Request $request)
  {
    //Validationをかける
    $this->validate($request,Products::$rules);
    //Products Modelからデータを取得する
    $products = Products::find($request->id);
    //送信されてきたフォームデータを格納する
    $products_form = $request->all();
    if ($request->remove == 'true') {
            $products_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $products_form['image_path'] = basename($path);
        } else {
            $products_form['image_path'] = $products->image_path;
        }
    unset($products_form['_token']);
    unset($products_form['image']);
    unset($products_form['remove']);

    //該当するデータを上書きして保存する
    $products->fill($products_form)->save();

    $history = new History;
    $history->products_id = $products->id;
    $history->edited_at = Carbon::now();
    $history->save();

    return redirect('/admin/products/');
  }

  public function delete(Request $request)
  {
    $products = Products::find($request->id);
    $products->delete();
    return redirect('admin/products/');
  }
  
}

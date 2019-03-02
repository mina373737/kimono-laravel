<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// 追記
use App\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        // $cond_title が空白でない場合は、商品名を検索して取得する
        if ($cond_title != '') {
            $posts = Products::where('title', $cond_title).orderBy('updated_at', 'desc')->get();
        } else {
            $posts = Products::all()->sortByDesc('updated_at');
        }

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // products/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、 cond_title という変数を渡している
        return view('products.index', ['headline' => $headline, 'posts' => $posts, 'cond_title' => $cond_title]);
    }
}

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
    public function create()
    {
      return redirect('admin/create/index');
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
      return redirect('admin.products.index');
    }
}

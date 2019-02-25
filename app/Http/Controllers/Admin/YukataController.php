<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YukataController extends Controller
{
    //
    public function index()
    {
      return view('admin.yukata.index');
    }
    public function add()
    {
      return view('admin.yukata.create');
    }
    public function create()
    {
      return redirect('admin/create/index');
    }
    public function edit()
    {
      return view('admin.yukata.edit');
    }
    public function update()
    {
      return redirect('admin/update/index');
    }
    public function destroy()
    {
      return redirect('admin.yukata.index');
    }
}

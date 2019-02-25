<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessoriesController extends Controller
{
    //
    public function index()
    {
      return view('admin.accessories.index');
    }
    public function add()
    {
      return view('admin.accessories.create');
    }
    public function create()
    {
      return redirect('admin/create/index');
    }
    public function edit()
    {
      return view('admin.accessories.edit');
    }
    public function update()
    {
      return redirect('admin/update/index');
    }
    public function destroy()
    {
      return redirect('admin.accessories.index');
    }
}

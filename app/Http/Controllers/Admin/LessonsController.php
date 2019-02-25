<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    //
    public function index()
    {
      return view('admin.lessons.index');
    }
    public function add()
    {
      return view('admin.lessons.create');
    }
    public function create()
    {
      return redirect('admin/create/index');
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

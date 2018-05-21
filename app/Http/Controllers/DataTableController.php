<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use App\Usuario;

class DataTableController extends Controller
{    
    public function index()
    {
        return view('datatable');
    }

    public function getPosts()
    {
        return \DataTables::of(Usuario::query())->make(true);
    }
}
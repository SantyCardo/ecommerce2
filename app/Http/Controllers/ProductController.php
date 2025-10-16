<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return view('products.index');
    }

    function create()
    {
        return view('products.create');
    }

    function show($id, $category = null)
    {
        return view('products.show');
            return "Deatlle de cada producto: " . $id;
        } else {
            return "Deatlle de cada producto: " . $id . " de la categoria: " . $category;
        }
    }
}

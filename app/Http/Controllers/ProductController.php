<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return "LISTADO DE PRODUCTOS";
    }

    function create()
    {
        return "FORMULARIO DE CREACIÓN DE PRODUCTOS";
    }

    function show($id, $category = null)
    {
        if ($category == null) {
            return "Deatlle de cada producto: " . $id;
        } else {
            return "Deatlle de cada producto: " . $id . " de la categoria: " . $category;
        }
    }
}

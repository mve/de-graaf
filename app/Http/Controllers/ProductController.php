<?php

namespace App\Http\Controllers;

use App\MainCourse;
use App\Product;
use App\SubCourse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Haal de products, subcourses en maincourses op.
        $products = Product::all();
        $subCourses = SubCourse::all();
        $mainCourses = MainCourse::all();

        // Stuur de products, subcourses en maincourses door naar de menu kaart pagina.
        return view('/menu', compact('products', 'subCourses', 'mainCourses'));
    }

}

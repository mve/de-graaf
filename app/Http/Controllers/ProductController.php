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
        $products = Product::with('subCourse.mainCourse')->get();

        $subCourses = SubCourse::all();

        $mainCourses = MainCourse::all();

        return view('/menu', compact('products', 'subCourses', 'mainCourses'));
    }

}

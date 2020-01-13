<?php

namespace App\Http\Controllers;

use App\MainCourse;
use App\Product;
use App\SubCourse;
use Barryvdh\DomPDF\Facade as PDF;
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

    public function adminindex()
    {
        $products = Product::with('subCourse.mainCourse')->get();

        $subCourses = SubCourse::all();

        $mainCourses = MainCourse::all();

        return view('admin.food', compact('products', 'subCourses', 'mainCourses'));
    }

    public function createProduct()
    {
        $subCourses = SubCourse::all();

        $mainCourses = MainCourse::all();

        return view('admin.addfood', compact('products', 'subCourses', 'mainCourses'));
    }

    public function addProduct(Request $request)
    {
        //Voeg product toe met naam prijs en een subgang
        $product = new Product();
        $product->name= $request->name;
        $product->price = $request->price;
        $product->sub_course_id = $request->subcourse;
        $product->save();

        return redirect('beheer/gerechten');
    }

    public function deleteProduct($id)
    {
        //Verwijder gekozen product
        $product = Product::find($id);

        $product->delete();


        return redirect('beheer/gerechten');
    }

    public function downloadMenu()
    {
        $products = Product::with('subCourse.mainCourse')->get();

        $subCourses = SubCourse::all();

        $mainCourses = MainCourse::all();
        $pdf = PDF::loadView('admin.menupdf', compact('products', 'subCourses', 'mainCourses'));
        return $pdf->download('menu.pdf');

//        return view('admin.menupdf', compact('products', 'subCourses', 'mainCourses'));

    }


}

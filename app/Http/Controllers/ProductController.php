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
        $product = new Product();
        $product->name= $request->name;
        $product->price = $request->price;
        $product->sub_course_id = $request->subcourse;
        $product->save();

        return redirect('beheer/gerechten');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $product->delete();


        return redirect('beheer/gerechten');
    }


}

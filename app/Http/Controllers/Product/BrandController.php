<?php

namespace App\Http\Controllers\Product;

use App\Product\Brand;
use App\Product\Category;
use App\Product\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view( 'product.brand.index', ['brands' => $brands] );
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view( 'product.brand.create', ['categories' => $categories, 'subcategories' => $subcategories] );
    }

    public function post_create(Request $request)
    {
        $this->validate( $request, [
            'category' => 'required',
            'sub_category' => 'required',
            'name' => 'required|max:25|unique:brands,name'
        ] );

        $brand = new Brand( [
            'name' => $request->input( 'name' ),
            'category_id' => $request->input( 'category' ),
            'subcategory_id' => $request->input( 'sub_category' )
        ] );

        $brand->save();
        return redirect()->route( 'brand' );
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brand = Brand::find( $id );
        return view( 'product.brand.edit', ['brand' => $brand, 'categories' => $categories, 'subcategories' => $subcategories] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'category' => 'required',
            'sub_category' => 'required',
            'name' => 'required|max:25|unique:brands,name'
        ] );

        $brand = Brand::find( $request->input( 'brandId' ) );
        $brand->name = $request->input( 'name' );
        $brand->category_id = $request->input( 'category' );
        $brand->subcategory_id = $request->input( 'sub_category' );
        $brand->save();
        return redirect()->route( 'brand' );
    }

    public function delete($id)
    {
        $brand = Brand::find( $id );
        return view( 'product.brand.delete', ['brand' => $brand] );
    }

    public function post_delete(Request $request)
    {
        $brand = Brand::find( $request->input( 'brandId' ) );
        $brand->delete();
        return redirect()->route( 'brand' );
    }
}
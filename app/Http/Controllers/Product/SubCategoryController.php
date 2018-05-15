<?php

namespace App\Http\Controllers\Product;

use App\Product\Category;
use App\Product\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view( 'product.subcategory.index', ['subcategories' => $subcategories] );
    }

    public function create()
    {
        $categories = Category::all();
        return view( 'product.subcategory.create', ['categories' => $categories] );
    }

    public function post_create(Request $request)
    {
        $this->validate( $request, [
            'category' => 'required',
            'name' => 'required|max:25|unique:sub_categories,name'
        ] );

        $subcategory = new SubCategory( [
            'name' => $request->input( 'name' ),
            'category_id' => $request->input( 'category' )
        ] );

        $subcategory->save();
        return redirect()->route( 'subcategory' );
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::find( $id );
        return view( 'product.subcategory.edit', ['subcategory' => $subcategory, 'categories' => $categories] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'category' => 'required',
            'name' => 'required|max:25|unique:sub_categories,name'
        ] );

        $subcategory = SubCategory::find( $request->input( 'subcategoryId' ) );
        $subcategory->name = $request->input( 'name' );
        $subcategory->category_id=$request->input('category');
        $subcategory->save();
        return redirect()->route( 'subcategory' );
    }

    public function delete($id)
    {
        $subcategory = SubCategory::find( $id );
        return view( 'product.subcategory.delete', ['subcategory' => $subcategory] );
    }

    public function post_delete(Request $request)
    {
        $subcategory = SubCategory::find( $request->input( 'subcategoryId' ) );
        $subcategory->delete();
        return redirect()->route( 'subcategory' );
    }
}
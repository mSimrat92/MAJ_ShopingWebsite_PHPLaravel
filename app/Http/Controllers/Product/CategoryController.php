<?php

namespace App\Http\Controllers\Product;

use App\Product\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        //$categories = DB::table( 'categories' )->get();
        $categories = Category::all();
        return view( 'product.category.index', ['categories' => $categories] );
    }

    public function create()
    {
        return view( 'product.category.create' );
    }

    public function post_create(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required|max:25|unique:categories,name'
        ] );

        $category = new Category( [
            'name' => $request->input( 'name' )
        ] );

        $category->save();
        return redirect()->route( 'category' );
    }

    public function edit($id)
    {
        //$category = DB::select( 'select * from categories where id = :id', ['id' => $id] );
        //$category = DB::table( 'categories' )->where( 'id', $id )->first();
        $category = Category::find( $id );
        return view( 'product.category.edit', ['category' => $category] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required|max:25|unique:categories,name'
        ] );

        $category = Category::find( $request->input( 'categoryId' ) );
        $category->name = $request->input( 'name' );
        $category->save();
        return redirect()->route( 'category' );
    }

    public function delete($id)
    {
        $category = Category::find( $id );
        return view( 'product.category.delete', ['category' => $category] );
    }

    public function post_delete(Request $request){
        $category = Category::find( $request->input( 'categoryId' ) );
        $category->delete();
        return redirect()->route( 'category' );
    }
}
<?php

namespace App\Http\Controllers\Product;

use App\Product\Brand;
use App\Product\Category;
use App\Product\Item;
use App\Product\ItemImages;
use App\Product\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $products = DB::table( 'items' )
            ->where( 'suppliers_id', 1 )
            ->get();
        return view( 'product.item.index', ['products' => $products] );
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view( 'product.item.create', ['categories' => $categories, 'subcategories' => $subcategories, 'brands' => $brands] );
    }

    public function post_create(Request $request)
    {
        $this->validate( $request, [
            'title' => 'required|max:100|unique:items,title',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required',
            'description' => 'required|max:255',
            'details' => 'required|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'discount_percentage' => 'required|numeric'
            //'product_image' => 'sometime|image|max:5120'
        ]/*,
            [
                'title.required' => 'Please enter title'
            ]*/ );

        $product = new Item( [
            'title' => $request->input( 'title' ),
            'category_id' => $request->input( 'category' ),
            'subcategory_id' => $request->input( 'sub_category' ),
            'brand_id' => $request->input( 'brand' ),
            'suppliers_id' => 1,
            'description' => $request->input( 'description' ),
            'details' => $request->input( 'details' ),
            'quantity' => $request->input( 'quantity' ),
            'selling_price' => $request->input( 'price' ),
            'discount_percentage' => $request->input( 'discount_percentage' )

        ] );
        $product->save();
        $inserted_ProductId = $product->id;
        if ($inserted_ProductId > 0) {
            if ($file = $request->hasFile( 'product_image' )) {
                foreach ($request->file( 'product_image' ) as $image) {
                    $fileName = $image->getClientOriginalName();
                    $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'product';
                    $image->move( $destinationPath, $fileName );
                    $productImage = new ItemImages( [
                        'item_id' => $inserted_ProductId,
                        'image_name' => $fileName
                    ] );
                    $product->itemImages()->save( $productImage );
                }
            }
        }
        return redirect()->route( 'product' );
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $product = Item::find( $id );
        return view( 'product.item.edit', ['product' => $product, 'categories' => $categories, 'subcategories' => $subcategories, 'brands' => $brands] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'title' => 'required|max:100',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required',
            'description' => 'required|max:255',
            'details' => 'required|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'discount_percentage' => 'required|numeric'
            //'product_image' => 'sometimes|image|max:5120'
        ] );

        $product = Item::find( $request->input( 'productId' ) );
        $product->title = $request->input( 'title' );
        $product->category_id = $request->input( 'category' );
        $product->subcategory_id = $request->input( 'sub_category' );
        $product->brand_id = $request->input( 'brand' );
        $product->suppliers_id = 1;
        $product->description = $request->input( 'description' );
        $product->details = $request->input( 'details' );
        $product->quantity = $request->input( 'quantity' );
        $product->selling_price = $request->input( 'price' );
        $product->discount_percentage = $request->input( 'discount_percentage' );
        $product->save();
        if ($request->input( 'productId' ) > 0) {
            if ($file = $request->hasFile( 'product_image' )) {
                //Delete Files
                foreach ($product->itemImages()->get() as $image) {
                    $filetodelete = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . $image->image_name;
                    \File::delete( $filetodelete );
                }
                $product->itemImages()->delete();
                //Add new Files
                foreach ($request->file( 'product_image' ) as $image) {
                    $fileName = $image->getClientOriginalName();
                    $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'product';
                    $image->move( $destinationPath, $fileName );
                    $productImage = new ItemImages( [
                        'item_id' => $request->input( 'productId' ),
                        'image_name' => $fileName
                    ] );
                    $product->itemImages()->save( $productImage );
                }
            }
        }
        return redirect()->route( 'product' );
    }

    public function delete($id)
    {
        $product = Item::find( $id );
        return view( 'product.item.delete', ['product' => $product] );
    }

    public function post_delete(Request $request)
    {
        $product = Item::find( $request->input( 'productId' ) );
        //echo $product->itemImages()->get();
        foreach ($product->itemImages()->get() as $image) {
            $filetodelete = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . $image->image_name;
            \File::delete( $filetodelete );
        }
        $product->itemImages()->delete();
        $product->delete();
        return redirect()->route( 'product' );
    }
}
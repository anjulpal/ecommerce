<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\color;
use App\Models\Product_attribute;
use App\Models\size;
use App\Models\category;

class Product_attributeController extends Controller
{

    // public function index(Request $request){
    //     $rows = Product::with('category')->get();
    //     return view('admin.product.index', compact('rows'));
    // }


    // public function create(Request $request){
    //     if($request->input()){
    //         $filename = time(). '.' . $request->file_uploads->extension();
    //         $request->file_uploads->move(public_path('uploads'), $filename);
    //         $product = Product::create([
    //           'category_id' => $request->input('category'),
    //           'name' => $request->input('name'),
    //           'slug' => $request->input('slug'),
    //           'brand' => $request->input('brand'),
    //           'model' => $request->input('model'),
    //           'short_desc' => $request->input('short_desc'),
    //           'desc' => $request->input('desc'),
    //           'keywords' => $request->input('keywords'),
    //           'technical_specification' => $request->input('technical_specification'),
    //           'uses' => $request->input('uses'),
    //           'warranty' => $request->input('warranty'),
    //           'productstatus' => ($request->input('productstatus') == 'on') ? 1 : 0,
    //           'file_uploads' => $filename, // Store the file path if a file is uploaded
    //         ]);
    //       return redirect()->route('admin.product.productlist')->with('success', 'Product created successfully!');
    //     }

    //    $category = category::all();
    //    $product = null;
    //    $color = Color::get();
    //    $size = Size::get();
    //    $products = Product::get();
    //    return view('admin.product.create', compact('category', 'product', 'color','size'));
    // }

    // public function delete(Request $request, $id){
    //     $id = $request->id;
    //     $data = Product::find($id);
    //     $data->delete();
    //     return redirect()->route('admin.product.productlist')->with('success', 'Product deleted successfully!');
    // }

public function edit(Request $request, $id){
    if ($request->input()) {
        $categories = $request->input('category'); 
        $color_id = $request->input('color');
        $size_id = $request->input('size');
        $existingAttributes = Product_attribute::where('product_id', $id)->pluck('id')->toArray();
        if(!empty($categories)){
            foreach ($categories as $key => $category) {
                if(isset($existingAttributes[$key])){
                        Product_attribute::where('id', $existingAttributes[$key])->update([
                            'category_id' => $category,
                            'color_id' => $color_id[$key],
                            'size_id' => $size_id[$key]
                        ]);
                }else{
                    Product_attribute::create([
                        'product_id' => $id,
                        'category_id' => $category,
                        'color_id' => $color_id[$key],
                        'size_id' => $size_id[$key]
                    ]);
                }
            }
        }
    }
    $product = Product::where('id', $id)->first();
    $product_attribute = Product_attribute::where('product_id', $id)->get();
    $category = Category::all();
    $color = Color::all();
    $size = Size::all();
    return view('admin.product.create', [
        'product_attribute' => $product_attribute,
        'category' => $category,
        'product' => $product,
        'color' => $color,
        'size' => $size,
    ]);
}

public function productremove(Request $request){
    $id = $request->id;
    $data = Product_attribute::where('id', $id)->first();

    if ($data) {
        $data->delete();
        return response()->json(['status' => 'success', 'message' => 'Attribute deleted.']);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Attribute not found.'], 404);
    }
}

}

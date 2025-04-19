<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{

    public function index(){

        $rows= Color::get();
       
         return view('admin.color.index',[
 
             'rows' => $rows,
         ]);
        }



    public function create(Request $request)
{
 
    if ($request->input()) {

     $validatedData = $request->validate([
            'color' => 'required|unique:color,color', 
        ]);

      
        $color = new Color();
        $color->color = $request->input('color');
        $color->colorstatus = $request->colorstatus == 'on' ? 1 : 0; 
        $color->save();

        return redirect()->route('admin.color.colorlist')->with('success', 'Color created successfully!');
    }
    $color = new Color();
    return view('admin.color.create', [
        'color' => $color,
    ]);
}

public function delete(Request $request, $id){

  $id = $request->id;
 $color = Color::find($id);
 $color->delete();
 return redirect()->route('admin.color.colorlist')->with('success', 'Color created successfully!');
}

public function edit(Request $request, $id)
{
if($request->input()){

    $validatedData = $request->validate([
        'color' => 'required|unique:color,color', 
    ]);

    $id = $request->id;
   $color = Color::find($id);
   $color->colorstatus = $request->colorstatus == 'on' ? 1 : 0;
   $color->color = $request->color;
   $color->save();
   return redirect()->route('admin.color.colorlist')->with('success', 'Color created successfully!');

    }
 $color = Color::find($id);
   return view('admin.color.create', [
     'color' => $color,
    ]);
  }

  public function colorstatus(Request $request){
    $id = $request->id;
    $colorstatus = $request->size == 'true' ? 1 : 0;
    $color = color::find($id);
    if($color){
         $color->colorstatus = $colorstatus;
        $color->save();
        return response()->json(['success' => 'Status updated successfully']);
    }
}
 
}

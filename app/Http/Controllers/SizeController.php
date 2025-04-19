<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
   
    public function index(){

        $rows= Size::get();
         return view('admin.size.index',[
 
             'rows' => $rows,
         ]);
        }


 public function create(Request $request)
{
    if ($request->input()) {
        $validatedData = $request->validate([
            'size' => 'required|unique:size,size', 
        ]);

      
        $size = new Size();
        $size->size = $request->input('size');
        $size->sizestatus = $request->has('sizestatus') ? 1 : 0; 
        $size->save();

        return redirect()->route('admin.size.sizelist')->with('success', 'Size created successfully!');
    }
    $size = new Size();
    return view('admin.size.create', [
        'size' => $size,
    ]);
}

    public function delete(Request $request, $id){
        $data = Size::find($id);
        $data->delete();
        return redirect()->route('admin.size.sizelist');
     }

     public function edit(Request $request, $id)
     {


        if($request->input()){

            $size = Size::find($id);
            $validatedData = $request->validate([
                'size' => 'required|string|unique:Size,size,' . $size->id, ]);

            $size = Size::find($id);
            $size->size = $request->size;
            $size->sizestatus = $request->sizestatus === 'on' ? 1 : 0;
            $size->save();
           return redirect()->route('admin.size.sizelist');
        }
        $size = Size::find($id);
       return view('admin.size.create',[
        'size' => $size,
        ]);
    }

    public function sizestatus(Request $request){
       
         $id = $request->id;
        $sizestatus = $request->size == "true" ? 1 : 0;
        $size = Size::find($id);
        if($size){
         $size->sizestatus= $sizestatus;
           $size->save();
           return response()->json(['success' => 'Status updated successfully']);
        }
        
        }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Boys;
use App\Models\girl; 
use App\Models\AdminLogin;
use App\Models\Category;

class Couponcontroller extends Controller
{

    public function index(){

       $rows= Coupon::get();
        return view('admin.coupon.index',[

            'rows' => $rows,
        ]);
       }


    public function show(){

        $post =null;
       return view('admin.coupon.create',
        [
            'post' => $post
        ]);
    }

    public function create(Request $request){
       
        $validatedData = $request->validate([
            'coupon_tittle' => 'required|unique:coupon',
            'coupon' => 'required',
            'coupon_value' => 'required'
            
        ]);

       if($request->input()){
         $coupon = new Coupon();
          $coupon->coupon_tittle = $request->input('coupon_tittle');
          $coupon->couponstatus = ($request->input('couponstatus') == 'on') ? 1 : 0;
          $coupon->coupon = $request->input('coupon');
          $coupon->coupon_value = $request->input('coupon_value');
          $coupon->save();
         return redirect()->back()->with('success', 'Coupon created successfully!');
        }
        return response()->json(['error' => 'Invalid input'], 400);
    }

    public function delete(Request $request, $id){
       $data = coupon::find($id);
       $data->delete();

    }

    public function edit(Request $request, $id){


        if($request->input()){
            $coupon = coupon::find($id);
            $validatedData = $request->validate([
                'coupon_tittle' => 'required|string|unique:coupon,coupon_tittle,' . $coupon->id,
                'coupon' => 'required',
                'coupon_value' => 'required',
                 
             ]);
            $post = coupon::find($id);
            
            $post->coupon_tittle = $request->coupon_tittle;
           $post->coupon = $request->coupon;
           $post->coupon_value = $request->coupon_value;
           $post->couponstatus = $request->couponstatus === 'on' ? 1 : 0;
           $post->save();
           return redirect()->route('admin.coupon.couponlist');
        }
        $post = coupon::find($id);
      
        return view('admin.coupon.create',[

            'post' => $post,
        ]);
    }

    public function couponstatus(Request $request){

        $id = $request->id;
        $couponstatus = $request->coupon == "true" ? 1 : 0;
        $coupon = coupon::find($id);
        if( $coupon){

           $coupon->couponstatus= $couponstatus;
           $coupon->save();
           return response()->json(['success' => 'Status updated successfully']);
        }
        
        }
}

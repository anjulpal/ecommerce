<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Boys;
use App\Models\girl; 
use App\Models\AdminLogin;
use App\Models\Category;
class UserController extends Controller
{
    public function index()
    {
        
        $users = User::with('books')->get();
        
        // echo "<pre>";
        // print_r($users->toArray());
        // echo "</pre>";
        // die();
        // $usersArray = $users->toArray();
       return view('index', compact( 'users'));
    }

    public function one_to_one()
    {
           $data = Boys::with('girl')->get();
         return view('one_to_one', compact( 'data' ));

         
    }

    public function dashboard(){

       return view('view.admin.dashboard');
    }

    public function create(){

         return view('admin.create');
    }

    public function adminlogin(){
       return view('admin.user.create');
    }

    public function login(Request $request){
        return view('admin.user.login');
    }

    public function postlogin(Request $request){

        if($request->input()){

            if (Auth::attempt($request->only('email', 'password'))) {

                return redirect()->route('admin.user.create');
            }
            return redirect()->route('admin.loginpage')->withErrors([
                'email' => 'Invalid credentials.',
            ]);
           
        }
    }

    public function category() {

      
        
        $post =  null;
    
        return view('admin.category', [
            'post' => $post
        ]);
    }
    

    public function categorycreate(Request $request){

        $validatedData = $request->validate([
            'category_name' => 'required|unique:Category',
            'category_url' => 'required',
            
        ]);

       if($request->input()){
          $category = new Category();
          $category->categorystatus = ($request->input('categorystatus') == 'on') ? 1 : 0;
          $category->category_name = $request->input('category_name');
          $category->category_url = $request->input('category_url');
          $category->save();
         return redirect()->back()->with('success', 'Category created successfully!');
        }
        return response()->json(['error' => 'Invalid input'], 400);
    }

    public function categorylist(Request $request){
        $rows=  Category::get();

        return view('admin.categorylist',
        [
            'row' => $rows,
        ]);

        }

    public function categorydelete(Request $request, $id){
            $data = Category::find($id);
            $data->delete();
            return redirect()->route('admin.user.categorylist');
         }

         public function categoryedit(Request $request, $id)
         {
            
           
             if($request->input()){
                $category = Category::find($id);
                $validatedData = $request->validate([
                    'category_name' => 'required|string|unique:category,category_name,' . $category->id,
                    'category_url' => 'required',
                     
                 ]);

                $post = Category::find($id);
                $post->category_name = $request->category_name;
                $post->category_url = $request->category_url;
                $post->categorystatus = $request->categorystatus === 'on' ? 1 : 0;
                $post->save();
                return redirect()->route('admin.user.categorylist');
             }
              $Category = Category::find($id); 
          return view('admin.category',[

            'post' => $Category,
          ]);
         }

         public function categorystatus(Request $request){
      
            $id = $request->id;
            $categoryedit = $request->statusid;
           
          
            $category = Category::find($id);
            if( $category){
                $category->categoryStatus = $categoryedit;
                $category->save();
                return response()->json(['success' => 'Status updated successfully']);

            }
           
         }
}


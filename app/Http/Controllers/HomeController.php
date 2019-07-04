<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductImage;
use File;
use App\Customer;
use App\CustomerRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function categoryshow(){
    $cate=Category::all();
    return view('category',compact('cate'));

   }

   public function categorycreated(Request $request){
        $this->validate($request,[
            'name'=>'required',
            
            
        ]);

        $category=new Category();
        $category->name=$request['name'];
        if($category->save()){
                   return redirect()->back()->with('success',' Category Added successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }

   public function edit_category($id){
    $user=Category::where('id',$id)->first();
    return view('editcategory',compact('user'));

   }

    public function category_update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            
        ]);

        $category=$user=Category::where('id',$id)->first();
        $category->name=$request['name'];
        if($category->update()){
                   return redirect()->route('category'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
            }

    public function del_category($id){
    
    if(Category::where('id',$id)->delete()){
                   return redirect()->back()->with('success',' Category deleted successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }


public function brandshow(){
    $brand=Brand::all();
    return view('brand',compact('brand'));

   }

   public function brandcreated(Request $request){
        $this->validate($request,[
            'name'=>'required',
            
            
        ]);

        $newbrand=new Brand();
        $newbrand->name=$request['name'];
        if($newbrand->save()){
                   return redirect()->back()->with('success',' brand Added successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }

   public function edit_brand($id){
    $user=Brand::where('id',$id)->first();
    return view('editbrand',compact('user'));

   }

    public function brand_update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            
        ]);

        $newbrand=$user=Brand::where('id',$id)->first();
        $newbrand->name=$request['name'];
        if($newbrand->update()){
                   return redirect()->route('brand'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
            }

    public function del_brand($id){
    
    if(Brand::where('id',$id)->delete()){
                   return redirect()->back()->with('success',' Brand deleted successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }

   public function productshow(){
    $pro=Product::all();
    return view('product',compact('pro'));

   }

   public function productcreated(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            
            'interest'=>'required',
            'price'=>'required',
            
            
        ]);
        $product=new Product();
        $product->name=$request['name'];
        $product->category_id=$request['category_id'];
        $product->brand_id=$request['brand_id'];
        $product->interest=$request['interest'];
        $product->price=$request['price'];
        $product->description=$request['description'];
        if($request->file('image')){
            $upload=$request->file('image');
        $fileformat= time().'.'.$upload->getClientOriginalName();
                if($upload->storeAs('product',$fileformat)){
                  $product->image=$fileformat;
         }
        }
        if($files=$request->file('images')){
        foreach($files as $file){
            $name=time().'.'.$file->getClientOriginalName();
            $file->storeAs('image',$name);
            $product_image=new ProductImage();
            $product_image->product_id=$request['product_id'];
            $product_image->images=$name;
            $product_image->save();
         }
        }
         if($product->save()){
            
                   return redirect()->back()->with('success',' product Added successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
     }

   public function edit_product($id){
    $user=Product::where('id',$id)->first();
    return view('editproduct',compact('user'));

   }

    public function product_update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
           
            'interest'=>'required',
            'price'=>'required',
            
            
        ]);

        $product=$user=Product::where('id',$id)->first();
        $product->name=$request['name'];
        $product->category_id=$request['category_id'];
        $product->brand_id=$request['brand_id'];
        $product->interest=$request['interest'];
        $product->price=$request['price'];
        $product->description=$request['description'];
        if($request->file('image')){
            $upload=$request->file('image');
        $fileformat= time().'.'.$upload->getClientOriginalName();
                if($upload->storeAs('product',$fileformat)){
                  $product->image=$fileformat;
         }
        }
        if($files=$request->file('images')){
        foreach($files as $file){
            $name=time().'.'.$file->getClientOriginalName();
            $file->storeAs('image',$name);
            $product_image=ProductImage::where('id',$id)->first();
            $product_image->product_id=$request['product_id'];
            $product_image->images=$name;
            $product_image->save();
         }
        }
         if($product->update()){
            
                  return redirect()->route('product');
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
            }

     public function del_product($id){
    
    if(Product::where('id',$id)->delete()){
                   return redirect()->back()->with('success',' Product deleted successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }

   public function customer(){
    $customer=Customer::all();
    return view('customer',compact('customer'));
   }


   public function del_customer($id){
    
    if(Customer::where('id',$id)->delete()){
                   return redirect()->back()->with('success',' Category deleted successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }

   public function customer_request(){
    $cust_req=CustomerRequest::all();
    return view('register_customer',compact('cust_req'));
   }

   public function request_detail($id){
    $cust=CustomerRequest::where('id',$id)->first();
    return view('register_details',compact('cust'));
   }
}   


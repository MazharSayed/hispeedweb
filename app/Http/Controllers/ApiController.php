<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\CustomerRequest;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    
    public function register(Request $request)
    {
        $user = Customer::create([
             'first_name' => $request->first_name,
             'last_name' => $request->last_name,
             'referal_id' => $request->reference_id,
             'email' => $request->email,
             'mobile_number' => $request->mobile_number,
             'reference_code' => $request->reference_code,
             'password' => bcrypt($request->password),
         ]);

        $token = auth()->login($user);

        return response()->json([ 
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user=Customer::where('email',$request->email)->first();
        if ($token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([ 
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function customer_request(Request $request)
    {
        $cust_req =new CustomerRequest();
        $cust_req->customer_id=$request['customer_id'];
        $cust_req->dob=$request['dob'];
        $cust_req->gender=$request['gender'];
        $cust_req->reference_code=$request['reference_code'];
        $cust_req->current_address=$request['current_address'];
        $cust_req->permanant_address=$request['permanant_address'];
        $cust_req->pin_code=$request['pin_code'];
        $cust_req->residence_type=$request['residence_type'];
        $cust_req->aadhar_number=$request['aadhar_number'];
        if($request->file('aadhar_photo')){
            $upload=$request->file('aadhar_photo');
        $fileformat= time().'.'.$upload->getClientOriginalName();
                if($upload->storeAs('aadhar',$fileformat)){
                  $cust_req->aadhar_photo=$fileformat;
         }
        }
        $cust_req->pan_number=$request['pan_number'];
        if($request->file('pan_photo')){
            $upload=$request->file('pan_photo');
        $fileformat= time().'.'.$upload->getClientOriginalName();
                if($upload->storeAs('pan',$fileformat)){
                  $cust_req->pan_photo=$fileformat;
         }
        }
        if($request->file('bank_passbook_photo')){
            $upload=$request->file('bank_passbook_photo');
        $fileformat= time().'.'.$upload->getClientOriginalName();
                if($upload->storeAs('bank_passbook',$fileformat)){
                  $cust_req->bank_passbook_photo=$fileformat;
         }
        }

        $cust_req->employment_type=$request['employment_type'];
        $cust_req->family_member_name=$request['family_member_name'];
        $cust_req->family_member_number=$request['family_member_number'];
        $cust_req->family_member_relation=$request['family_member_relation'];
        $cust_req->guarantor_name=$request['guarantor_name'];
        $cust_req->guarantor_mobile_number=$request['guarantor_mobile_number'];
        $cust_req->status=$request['status'];
        if($request->file('image')){
            $upload=$request->file('image');
        $fileformat= time().'.'.$upload->getClientOriginalName();
                if($upload->storeAs('image',$fileformat)){
                  $cust_req->image=$fileformat;
         }
        }
         if($token=$cust_req->save()){
                    return $this->respondWithToken($token);
                }
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function product_all(){
        $product=Product::all();
        $token= $product;
        return response()->json([ 
            'product' => $product,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);

    }

    public function category_all(){
        $category=Category::all();
        $token= $category;
        return response()->json([ 
            'category' => $category,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);

    }
}

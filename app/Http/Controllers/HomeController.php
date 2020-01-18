<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Supplier;
use App\Company;
use Auth;
use Carbon\Carbon;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $company = DB::table('company')->get();
            $supplier = DB::table('supplier')->where('status',0)->get();
            return view('home', compact('company','supplier'));
        }
    }
    public function deliveredProduct($id)
    {
        $productId = Supplier::find($id);
        $productId->status=1;
        $productId->save();
        $userMember = User::where('user_type',1)->first();
        $saveToCompany = new Company();
        $saveToCompany->product_name = $productId->product_name;
        $saveToCompany->supplier_name = $userMember->name;
        $saveToCompany->received_date= Carbon::now();
        $saveToCompany->save();
        return redirect()->route('home');
    }
}

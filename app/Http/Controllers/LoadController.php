<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\customorder;
use App\Models\DeliveryOptions;
use App\Models\DetailTransaction1;
use App\Models\PaymentCategory;
use App\Models\PaymentCatMethod;
use App\Models\PaymentMethod;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class LoadController extends Controller
{
    function homepage(){
        return view('homepage');
    }
    function productdetailpage(Request $request,$id){
        $detail=Product::where('id',$id)->first();
        return view('detail')->with('detail',$detail);
    }
    function transactionpage(){
        $user=User::find(Auth::user()->id);
        $tran=Transaction::all()->where('user_id', Auth::user()->id);
        return view('transaction')->with('transaction',$tran);
    }
    function reportpage(){
        $report=Transaction::all();
        $count=DB::table('detail_transaction1s')->count();
        return view('report')->with('transaction',$report)->with('count',$count);
    }
    function checkoutpage(){
        $user=User::find(Auth::user()->id);
        $cart=Cart::where('user_id',$user->id)->get();
        return view('checkout')->with('cart',$cart)->with('user',$user);
    }
    function customorder(){
        $user=User::find(Auth::user()->id);
        return view('custom_order');
    }
    function profilepage(){
        $user=User::find(Auth::user()->id);
        return view('profile')->with('user',$user);
    }

    function cartpage(){
        $user=User::find(Auth::user()->id);
        $cart=Cart::where('user_id',$user->id)->get();
        return view('cart')->with('cart',$cart);
    }
    function updateprofilepage(){
        $user=User::find(Auth::user()->id);
        return view('update_profile')->with('user',$user);
    }
    function loginpage(){
        return view('login');
    }
    function registerpage(){
        return view('register');
    }
    function categorypage(){
        $cat=Category::all();
        return view('manage_category')->with('category',$cat);
    }
    function paymentcategorypage(){
        $cat=PaymentCatMethod::all();
        return view('manage_payment')->with('payment',$cat);
    }
    function deliveryoptionpage(){
        $cat=DeliveryOptions::all();
        return view('manage_delivery')->with('delivery',$cat);
    }
    function detailpage(){
        return view('detail');
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
    function searchpage(Request $request){
        $search  = $request->search == null ? '' : $request->search;
        $product = Product::where('name','like', '%'.$search.'%')->orWhere('description','like', '%'.$search.'%')->get();
        return view('search')->with('product',$product)->with('search',$search);
    }
    function reportfilter(Request $request){
        $request->validate([
            'fromDate'=>'required|date',
            'toDate'=>'required|date|after_or_equal:fromDate',
        ]);

        $date1 = $request->input('fromDate');
        $date2 = $request->input('toDate');
        $report=Transaction::whereBetween('created_at',[
            $date1, $date2,
        ])->get();
        return view('reportfilter')->with('transaction',$report);

    }
    function addproductpage(){
        return view('add_product');
    }
    function editproductpage($id){
        $p=Product::find($id);
        return view('edit_product')->with('product',$p);
    }
    function productpage(){
        $product=Product::where('stock','>',0)->paginate(12);
        return view('product')->with('product',$product);
    }
    function aboutpage(){
        return view('about');
    }
    function orderdetail($id){
        // $data=DetailTransaction1::all()->find($id);
         $data = Transaction::find($id);
         return view('orderdetail', compact('data', 'id'));
        // return view('orderdetail')->with('data',$data);
    }
    function generateInvoice($id){
        $data = Transaction::find($id);
        $pdf = Pdf::loadView('invoice', ['data' => $data])
        ->setPaper('a4', 'potrait');

        return $pdf->download('invoice.pdf');
    }
}

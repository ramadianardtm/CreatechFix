<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\DeliveryOptions;
use App\Models\DetailTransaction;
use App\Models\DetailTransaction1;
use App\Models\PaymentCategory;
use App\Models\PaymentCatMethod;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class CrudController extends Controller
{
    function doaddproduct(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => ['required', 'min:5'],
            'price' => ['required', 'integer', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'integer', 'min:1', 'max:10000'],
            'description' => ['required', 'min:15', 'max:500'],
            'category' => ['required', 'min:0'],
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $image = str_replace(' ', '', $request->name) . $request->file('image')->getClientOriginalExtension();
        $request->image->storeAs(
            '\public\\',
            $image
        );
        $product->image = $image;
        $product->save();
        return redirect('/product');
    }

    function doupdateprofile(Request $request)
    {
        $request->validate([
            'name' => ['required|regex:/^[a-zA-Z][a-zA-Z\s]*$/|max:255'],
            'image' => 'max:2048|image',
            'password' => ['min:8', 'required'],
            'address' => ['min:15', 'required'],
            'phone' => ['min:11', 'required', 'numeric'],
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        if ($request->image) {
            $image = str_replace(' ', '', $request->name) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs(
                '\public\\',
                $image
            );
            $user->image = $image;
        }else{
            $user->image = '';
        }

        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect('/profile');
    }

    function doeditproductpage(Request $request, $id)
    {
        $product = Product::find($request->id);
        $request->validate([
            'description' => ['required', 'min:15', 'max:500'],
            'price' => ['required', 'integer', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'integer', 'min:1', 'max:10000'],
            'image' => 'required|image',
        ]);


        if ($request->image) {
            $image = str_replace(' ', '-', $request->name) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs(
                '\public\\',
                $image
            );

            $product->image = $image;
        }

        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return redirect('/product');
    }

    function doregister(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z][a-zA-Z\s]*$/|max:255',
            'image' => 'max:2048',
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'same:confirm'],
            'address' => ['required', 'min:15'],
            'phone' => ['required', 'numeric', 'min:11'],
        ]);

        $user = new User();
        $user->name = $request->name;
        if ($request->image) {
            $image = str_replace(' ', '', $request->name) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs(
                '\public\\',
                $image
            );
            $user->image = $image;
        }else{
            $user->image = '';
        }
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role = 'member';
        $user->save();
        return redirect('/login');
    }

    function docheckout(Request $request)
    {
        $request->validate([
            'code' => ['required', 'same:correct'],
            'payment' => ['required', 'min:0'],
            'delivery' => ['required', 'min:0'],
        ]);
        $cart = Cart::all()->where('user_id', Auth::user()->id);
        // Ambil transaction 
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        // Loop transaction detailnya 
        foreach ($cart as $c) {
            $transaction_detail = new DetailTransaction1();
            $transaction_detail->transaction_id = $transaction->id;
            $transaction_detail->user_id = Auth::user()->id;
            $transaction_detail->product_id = $c->product_id;
            $transaction_detail->payment_id = $request->payment;
            $transaction_detail->delivery_id = $request->delivery;
            $transaction_detail->quantity = $c->quantity;
            $transaction_detail->save();
        }

        // Mail::send('emails.productCreated',$transaction->toArray(),
        // function($message){
        //         $message->to('ramadianarditama66@gmail.com','Code Online')
        //         ->subject('Transaction Created');
        // });

        // Hapus semua cart user skrg
        foreach ($cart as $c) {
            $c->delete();
        }

        return redirect('/');
    }

    function doaddcart(Request $request, $id)
    {
        $request->validate([
            'qty' => ['required', 'integer', 'min:1', 'max:10000'],
        ]);

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->quantity = $request->qty;
        $cart->save();
        return redirect('/product');
    }

    function doremoveproduct(Request $request, $id)
    {
        $p = Product::find($id);
        $p->delete();
        return redirect('/product');
    }

    function doaddcategory(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name'],
        ]);
        $cat = new Category();
        $cat->name = $request->name;
        $cat->save();
        return redirect('/manage');
    }

    function doaddpayment(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:payment_cat_methods,name'],
            'recipient' => ['required'],
            'account' => ['required', 'integer', 'min:1'],
        ]);
        $cat = new PaymentCatMethod();
        $cat->name = $request->name;
        $cat->recipient = $request->recipient;
        $cat->account = $request->account;
        $cat->save();
        return redirect('/manage-payment');
    }

    function doadddelivery(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        $cat = new DeliveryOptions();
        $cat->name = $request->name;
        $cat->save();
        return redirect('/manage-delivery');
    }

    function dologin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $cookie = $request->remember == 'on';

        if (Auth::attempt(['email' => $email, 'password' => $password], $cookie)) {
            $token = Auth::getRecallerName();
            Cookie::queue($token, Cookie::get($token), 1290);
            return redirect('/');
        } else {
            $errors = ValidationException::withMessages([
                'login' => ['Invalid login information, try again'],
            ]);
            throw $errors;
        }
        return redirect('/');
    }
}

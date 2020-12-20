<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(6);
        return view('shop',compact('stocks'));
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart',$data);
    }
    
    public function addMycart(Request $request,Cart $cart)
    {
 
        //カートに追加の処理
        $stock_id=$request->stock_id;
        $message = $cart->addCart($stock_id);
 
        //追加後の情報を取得
        $data = $cart->showCart();
 
        return view('mycart',$data)->with('message',$message); //追記
 
    }
 
    public function deleteCart(Request $request,Cart $cart)
    {
 
        //カートから削除の処理
        $stock_id=$request->stock_id;
        $message = $cart->deleteCart($stock_id);
 
        //追加後の情報を取得
        $data = $cart->showCart();
 
        return view('mycart',$data)->with('message',$message);//追記
 
    }

    public function checkout(Cart $cart)
    {
        return view('checkout');
    }
}

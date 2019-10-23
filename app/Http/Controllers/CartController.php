<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function index(){
      $all_cart = \Cart::content();
      $totalHargaProduk = \Cart::total();
      return view('cart.index', compact('all_cart', 'totalHargaProduk'));
    }

    public function add(Request $request)
    {
       $product = Product::find($request->id);
       // $request->jumlah = 1;
       if($product && $product->stock > 0 && $product->stock >= $request->jumlah){
         \Cart::add(['id' => $product->id,
                      'name' => $product->name,
                      'price' => $product->price,
                      'qty' => $request->jumlah,
                      'weight' => 1,
                      'options' => ['image'=> $product->image,
                                  'slug' => $product->slug],
           ]);
         return $product->name;
       }
       return false;
    }


    public function basket()
    {
       $response = \Cart::getTotalQuantity();
       return $response;
    }

    public function total(){
      return \Cart::total();
    }

    public function checkout()
    {
        if (\Cart::count() == 0) {
            return Redirect::to('/');
        } else {
            return View::make('cart.checkout')
                       ->with('title', 'Cart &rarr; Checkout');
        }
    }

    public function remove(Request $request)
    {
        $rowid = $request->rowId;
        $remove = \Cart::remove($rowid);
        if($remove)
        {
          return 'Success';
        }
        return 'Failed';
    }

    public function destroy()
    {
        \Cart::clear();
        return redirect()->back()->with('alert-class', 'alert-success')->with('flash_message', 'Cart successfully deleted');;
    }

    public function update(Request $request)
    {
        $qty = $request->qty;
        $rowId = $request->rowId;
        if(\Cart::count() > 0)
        {
          for ($i=0; $i<count($rowId); $i++) {
              $update = \Cart::update($rowId[$i], $qty[$i]);
          }
          if($update){
              return redirect()->route('cart.index')->with('alert-class', 'alert-success')->with('flash_message', 'Cart updated successfully');
          }
        }
        return redirect()->route('cart.index')->with('alert-class', 'alert-danger')->with('flash_message', 'Cart failed to updated');
    }
}

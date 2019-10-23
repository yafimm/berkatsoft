<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    protected function orderDetail($id)
    {
          $order = \Auth::user()->order->find($id);
          if($order)
          {
              $order_product = $order->product;
              return view('order.show_user', compact('order', 'order_product'));
          }
          return abort(404);
    }


        //fungsi ini ngambil data detail transaksi dari cart
        private function data_detail_order()
        {
               $price = $amount = $product_id = $dataproductTransaksi = array();
               $all_data = \Cart::content(); // ngambil semua data cart dari class Cart

              if($all_data->count() > 0){
                  foreach ($all_data as $key => $data) {
                    array_push($product_id, $data->id);
                    array_push($price, $data->price);
                    array_push($amount, $data->qty);

                    $product = Product::find($data->id);
                    if($product->stock >= $data->qty){
                        $product->update(['stock' => $product->stock - $data->qty]);
                    }else{
                        return false;
                    }
                  }

                  //Fungsi biar array jadi "nama" => nilai , soalnya data ini digunakan untuk attach ke tabel relasinya
                  $price = Yaf_give_indexArr("sub_total", $price);
                  $amount = Yaf_give_indexArr("amount", $amount);

                  // kombinasi dari semua array jadi satu array sesuai dengan indexnya
                  foreach($product_id as $key=>$val){ // Loop though one array
                    $dataproductTransaksi['detail'][$key] =  $price[$key] + $amount[$key];
                  }

                  $dataproductTransaksi['product_id'] = $product_id;

                  return $dataproductTransaksi;
              }else{
                  return false;
              }

        }

    public function index()
    {
        $all_order = Order::orderBy('created_at', 'desc')->where('status', '=', 'Unpaid')->Paginate(16);
        return view('order.index', compact('all_order'));
    }

    public function index_user(Request $request)
    {
          $all_order = User::find(\Auth::user()->id)->order()->orderBy('status', 'desc')->Paginate(6);

          // if yang ini untuk menampilkan detailnya
          if($all_order && \Auth::check())
          {
            if(isset($request->id))
            {
                return $this->orderDetail($request->id);
            }
            else
            {
                return view('order.index_user', compact('all_order'));
            }
          }
          return abort(404);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['id'] = setOrderId();
        $data['user'] = \Auth::user()->id;
        $data['total'] = integer_format(\Cart::total());
        $order = Order::create($data);
        if($order)
        {
            $OrderDetailData = $this->data_detail_order();
            if($OrderDetailData)
            {
                foreach ($OrderDetailData['product_id'] as $key => $data) {
                  $order->product()->attach($OrderDetailData['product_id'][$key], $OrderDetailData['detail'][$key]);
                }
                \Cart::destroy();
                return redirect()->route('order.index_user', ['id' => $data['id']])
                                          ->with('flash_message', 'Order successfully created, pay immediately to complete the transaction process')
                                          ->with('alert-class', 'alert-success');
            }
            return redirect()->back()->with('alert-class', 'alert-danger')
                                     ->with('flash_message', 'One of your order is out of stock !!');

        }
        return redirect()->back()->with('alert-class', 'alert-danger')
                                 ->with('flash_message', 'Order failed to created !!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $order = Order::find($id);
        if($order)
        {
            return view('order.edit', compact('order'));
        }
        return abort(404);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }
}

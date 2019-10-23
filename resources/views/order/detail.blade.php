@extends('layouts.dashboard.template')

@section('content')
<div class="card">
    <div class="card-body informasi-transaksi">
      <!-- TOP CAMPAIGN-->
      <div class="top-campaign">
          @if(Auth::user()->isAdmin())
          <div class="">
            <form class="" action="{{ route('route.update.status') }}" method="post">
              @csrf
              @method('post')
              <input type="hidden" name="id" value="{{$order->id  }}">
            </form>
            <button type="submit" class="btn btn-success btn-block">Update Status (PAID)</button>
          </div>
          @endif
          <h3 class="title-3 m-b-30">Total Belanja</h3>
          <div class="table-responsive">
              <table class="table table-top-campaign" id="data-product">
                @foreach($order->product as $product)
                  <tr>
                      <td>{{$product->name}}</td>
                      <td>{{$product->pivot->amount}}</td>
                      <td>Rp. {{yaff_money_format($product->pivot->sub_total)}}</td>
                  </tr>
                @endforeach
                  <tr>
                    <td class="font-weight-bold">Total :</td>
                    <td class="font-weight-bold" colspan="4">Rp. {{ yaff_money_format($order->total) }}</td>
                  </tr>
              </table>
          </div>
        <div class="row">
          <div class="py-3 col-md-6 col-sm-6 col-12">
            <div class="row py-1">
              <div class="col-12 col-sm-4 col-md-5">ID Transaksi :</div>
              <div class="col-12 col-sm-8 col-md-7">{{ $order->id }}</div>
            </div>
            <div class="row py-1">
              <div class="col-12 col-sm-4 col-md-5">User Pemesan :</div>
              <div class="col-12 col-sm-8 col-md-7 font-weight-bold">{{ $order->user_user->username }}</div>
            </div>
            <div class="row py-1">
              <div class="col-12 col-sm-4 col-md-5">Phone Number :</div>
              <div class="col-12 col-sm-8 col-md-7 font-weight-bold">{{ $order->user_user->phone_number }}</div>
            </div>
            <div class="row py-1">
              <div class="col-12 col-sm-4 col-md-5">Order date  :</div>
              <div class="col-12 col-sm-8 col-md-7 font-weight-bold"> {{ $order->created_at->format('d/m/Y (H:m)') }} </div>
            </div>
            <div class="row py-1">
              <div class="col-12 col-sm-4 col-md-5">Address  :</div>
              <div class="col-12 col-sm-8 col-md-7 font-weight-bold"> {{  $order->user_user->address }} </div>
            </div>
            <div class="row py-1">
              <div class="col-12 col-sm-4 col-md-5">Approved by  :</div>
              <div class="col-12 col-sm-8 col-md-7 text-info"> {{ ($order->user_admin != null) ? $order->user_admin->username : '-' }} </div>
            </div>
            <div class="row py-1">
              <div class="col-12 col-sm-4 col-md-5">Status  :</div>
              <div class="col-12 col-sm-8 col-md-7 {{ ($order->status == 'Paid') ? 'text-success': 'text-danger' }}"> {{ $order->status }} </div>
            </div>
          </div>
          <div class="py-2 col-md-6 col-sm-6 col-12">
            <div class="card border border-primary">
                <div class="card-body">
                  there is only one payment method
                  <p class="text-danger">*Still under development</p>
                  <hr>
                  <img src="{{ asset('images/Bank_Mandiri_logo.svg') }}" height="300px"  alt="">
                  <hr>
                  <p class="card-text text-center">
                    Mandiri <b>1370012937000</b><br>
                    a/n <b>PT yafimm </b><br>
                    Untuk aktivasi instan,<br>
                    tuliskan berita transfer: <br>
                        <b>{{ $order->id }}</b>
                  </p>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
@endsection

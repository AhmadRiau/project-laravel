@extends('layouts.app')

@section('content')
<style>
   .receipt-container {
      font-family: 'Arial', sans-serif;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 4px;
      background: #fff;
   }
   .receipt-header {
      border-bottom: 2px dashed #ccc;
      margin-bottom: 20px;
      padding-bottom: 10px;
   }
   .receipt-subheader {
      font-size: 14px;
      color: #555;
   }
   .receipt-body {
      margin-bottom: 20px;
   }
   .receipt-item {
      border-bottom: 1px solid #eee;
      padding: 10px 0;
   }
   .receipt-total {
      font-size: 18px;
      font-weight: bold;
      text-align: right;
   }
</style>   
<div>
   <div style="max-width: 600px; margin: 0 auto;" class="mb-3">
      <a href="{{ route('show_profile')}}" class="btn btn-secondary">Kembali</a>
   </div>
   
   <?php $totalPrice = 0 ?>   
   <div class="receipt-container shadow p-3 bg-white rounded">      
      <div class="receipt-header">
         <h3>Order ID : {{$order->id}}</h3>
         <sub class="receipt-subheader">Waktu Order : {{$order->created_at}}</sub>
      </div>
      <div class="receipt-body">
         <p>User : {{$order->user->name}}</p>
         
         <div class="receipt-item">
            <table class="table">
               <thead>
                  <td>Produk ID</td>
                  <td>Nama Produk</td>
                  <td>Qty</td>
                  <td>Harga</td>
               </thead>
               <tbody>
                  @foreach ($order->transactions as $transaction)
                  <tr>
                     <td>{{$transaction->product->id}}</td>
                     <td>{{$transaction->product->name}}</td>
                     <td>{{$transaction->amount}}</td>
                     <td>Rp. {{number_format($transaction->product->price, 2, ',', '.') }}</td>
                     <?php $totalPrice += $transaction->product->price ?>
                  </tr>
                  @endforeach
               </tbody>
            </table>            
         </div>        
      </div>
      <div class="row">
         <div class="col-3">
            @if ($order->payment_receipt != null)
               <a href="{{ url('storage/order/'.$order->payment_receipt) }}" class="input-group-text" style="text-decoration : unset">
                  Lihat Receipt
               </a>
            @endif
         </div>
         <div class="col-9">
            <div class="receipt-total">
               Total: Rp. {{number_format($totalPrice  , 2, ',', '.') }}
            </div>
         </div>
      </div>
      

      <br>
      {{-- form upload payment --}}
      @if ($order->is_paid == false && $order->payment_receipt == null)            
      <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data" >
         @csrf            
         <div class="input-group mb-3">
            <input type="file" class="form-control" name="payment_receipt">
            <button class="btn btn-outline-secondary" type="submit">Upload</button>
         </div>
      </form>      
      @endif
      {{-- form upload payment end --}}
   </div>
</div>
@endsection
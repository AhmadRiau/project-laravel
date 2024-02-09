@extends('layouts.app')

@section('content')
<div>
   <div class="card p-3 shadow m-3 rounded">
      <table class="table table-bordered">
         <thead>
            <tr>
               <th class="col">ID</th>
               <th class="col-4">Nama Pemesan</th>
               <th class="col" style="text-align: center">Waktu Order</th>
               <th class="col" style="text-align: center">Status Order</th>
               <th class="col" style="text-align: center">Receipt</th>
               <th class="col-2" style="text-align: center">Aksi</th>
            </tr>
         </thead>
   
         <tbody>
            @foreach ($orders as $order)
            <tr>
               <td>{{ $order->id }}</td>
               <td>{{ $order->user->name }}</td>
               <td style="text-align: center">{{ $order->created_at }}</td>
               <td style="text-align: center">
                  @if ($order->is_paid == true)
                     <span class="badge bg-success">Paid</span>
                  @else
                     <span class="badge bg-warning">Unpaid</span>                  
                  @endif
               </td>
               <td style="text-align: center">
                  @if ($order->payment_receipt != null)
                  <a href="{{ url('storage/order/'.$order->payment_receipt) }}">
                     <i class="fa-solid fa-receipt fa-2x"></i>
                  </a>
                  @else
                     <i class="fa-solid fa-file-excel fa-2x"></i>
                  @endif
               </td>
               <td style="text-align: center">
                  <form action="{{route('confirm_payment', $order)}}" method="post">
                     @csrf
                     @if ($order->is_paid == true)
                        <button type="submit" class="btn btn-danger mb-3">Batalkan</button>
                     @else
                        <button type="submit" class="btn btn-primary mb-3">Confirm</button>        
                     @endif
                     
                  </form>
               </td>
   
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   <script src="https://kit.fontawesome.com/3f63669769.js" crossorigin="anonymous"></script>
</div>
@endsection

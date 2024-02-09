@extends('layouts.app')

@section('content')
<div class="px-3">
  <?php $totalAmount = 0 ?>
  
  {{-- parent --}}
  <div class="row">
    <div class="col-8">
  
      {{-- cart item loop --}}
      @foreach ($carts as $cart)
      <div class="card shadow mb-3 p-3 bg-white rounded" >
        <div class="row">
  
          {{-- image --}}
          <div class="col-3">
            <img src="{{ url('storage/'.$cart->product->image) }}" style="max-height: 150px; object-fit: cover" class="card-img-top rounded" alt="Product Image">
          </div>
  
          {{-- body --}}
          <div class="col-9">
            <div class="card-body">
              <h5 class="card-title">{{ $cart->product->name }}</h5>
              <?php $totalAmount += $cart->product->price * $cart->amount ?>
  
              {{-- amount input --}}
              <form action=" {{route('update_cart', $cart)}} " method="post">
                @method('patch')
                @csrf
                <div class="form-group row mb-3" style="width: 50%">                                      
                    <div class="input-group">                              
                      <input name="amount" value="{{$cart->amount}}" min="1" type="number" class="form-control">
                      <div class="input-group-append">
                          <div class="input-group-text">
                            <button type="submit" class="btn">Update</button>
                          </div>
                      </div>                      
                  </div>
                </div> 
              </form>
              {{-- amount input end--}}
  
              <form action=" {{route('delete_cart', $cart)}} " method="post">
              @method('delete')
              @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
  
            </div>
          </div>
          {{-- body end --}}
  
        </div>
      </div>
      @endforeach
      {{-- cart item loop --}}
  
    </div>
    
    {{-- Amount total --}}
    <div class="col-4">
      <div class="card shadow p-3 bg-white rounded">
        <div class="card-body">
          <h5 class="card-title">Total Pembayaran</h5>
          <p class="card-text">Rp. {{number_format($totalAmount, 2, ',', '.') }} </p>
          <form action=" {{route('checkout')}} " method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Check Out</button>
            @if (session('message'))
              <div class="alert alert-info mt-3">
                {{ session('message') }}
              </div>
            @endif
          </form>
        </div>
      </div>
      {{-- error counter --}}
      @if (count($errors) > 0)
      
      <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
          </ul>
      </div>
    @endif
    </div>
  </div>
</div>
@endsection
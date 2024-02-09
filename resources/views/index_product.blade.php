@extends('layouts.app')

@section('content')
<div class="px-4">
   <div class="row">
      @foreach ($products as $product)
      <div class="col-3 mb-3 d-flex">
         <div class="card shadow p-3 bg-white rounded" style="width: 100%">
            <img src="{{ url('storage/'.$product->image) }}" class="card-img-top rounded" alt="foto produk" style="height: 200px; width: 100%; object-fit: cover;">
            <div class="card-body d-flex flex-column gap-2">
               <button type="button" class="btn btn-outline-danger btn-block" data-bs-toggle="modal" data-bs-target="#productDetail{{ $product->id }}">
                  {{ $product->name }}
               </button>               
            </div>
         </div>

         @include('show_product')
      </div>
      @endforeach 
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</div>
@endsection

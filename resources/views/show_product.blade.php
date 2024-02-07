<div class="modal fade bd-example-modal-lg" id="productDetail{{ $product->id }}" 
   data-bs-backdrop="static"
   tabindex="-1" role="dialog" 
   aria-labelledby="productDetail{{ $product->id }}CenterTitle" 
   aria-hidden="true">

   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">   
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="productDetail{{ $product->id }}LongTitle">{{ $product->name }}</h5>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-4">
                  <p class="card-text"><strong>Price:</strong> Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
                  <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                  <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
               </div>
               <div class="col-8">
                  <img class="card-img-top" src="{{ url('storage/'.$product->image) }}"  alt="{{ $product->name }}" style="max-height: 400px; width: 100%; object-fit: cover;">
               </div>               
            </div>            
         </div>
         <div class="modal-footer">
            
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <a class="btn btn-primary" href=" {{route('edit_product', $product->id)}} ">Edit</a>
         </div>
      </div>
   </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <title>{{$product->name}}</title>
</head>
<body>
   <br>
   <div class="d-flex justify-content-center">
      <div class="row">
         
         {{-- image part--}}
         <div class="col-6">
            <img class="card-img-top" src="{{ url('storage/'.$product->image) }}"  alt="{{ $product->name }}" style="max-height: 500px; width: 100%; object-fit: cover;">
         </div>

         {{-- form part --}}
         <div class="col-6">
            <form action=" {{route('update_product', $product)}} " enctype="multipart/form-data" method="post" class="form-control shadow p-3 mb-5 bg-white rounded">
               @method('patch')
               @csrf
               <div style="height: 20px; text-align: center">
                  <h2>Edit Produk</h2>
               </div>
               <br>
               <hr>

               {{-- name input --}}
               <div class="form-group row mb-3">
                  <label class="col-4 col-form-label" for="name">Nama Produk</label> 
                  <div class="col-8">
                     <input id="name" name="name" placeholder="masukkan nama produk" value="{{$product->name}}" type="text" required="required" class="form-control">
                  </div>
               </div>

               {{-- price input --}}
               <div class="form-group row mb-3">
                  <label class="col-4 col-form-label" for="price">Harga Produk</label> 
                  <div class="col-8">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">Rp</div>
                        </div> 
                        <input id="price" name="price"  value="{{$product->price}}" placeholder="masukkan harga produk" type="number" class="form-control">
                     </div>
                  </div>
               </div>

               {{-- stock input --}}
               <div class="form-group row mb-3">
                  <label for="stock" class="col-4 col-form-label">Stok Produk</label> 
                  <div class="col-8">
                     <input id="stock" name="stock" value="{{$product->stock}}" placeholder="masukkan stok produk" type="number" class="form-control">
                  </div>
               </div>

               {{-- description input --}}
               <div class="form-group row mb-3">
                  <label for="description" class="col-4 col-form-label">Deskripsi Produk</label> 
                  <div class="col-8">
                     <textarea id="description" name="description" cols="40" rows="5" aria-describedby="descriptionHelpBlock" class="form-control">{{$product->description}}</textarea> 
                     <span id="descriptionHelpBlock" class="form-text text-muted">masukkan deskripsi produk</span>
                  </div>
               </div>

               {{-- image input --}}               
               <div class="form-group row mb-3" style="padding: 0px 10px">
                  <input type="file" name="image" class="form-control" required>
               </div> 

               {{-- action button --}}            
               <div class="d-flex bd-highlight mb-3">
                  <div class="me-auto p-2 bd-highlight">
                     <a href="{{ route('index_product') }}" class="btn btn-secondary">Go Back</a>
                  </div>
                  <div class="p-2 bd-highlight">
                     <button  type="submit" class="btn btn-primary">Edit Produk</button>
                  </div>                  
            </form>
                  <div class="p-2 bd-highlight">
                     <form action="{{ route('delete_product', $product) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                     </form>    
                  </div>
               </div>

            {{-- error counter --}}
            @if (count($errors) > 0)
               <hr>
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
</body>
</html>
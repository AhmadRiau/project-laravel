<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Tambah Produk Baru</title>
</head>
<body style="padding: 30px">
   <div class="d-flex justify-content-center">
      <form action=" {{route('store_product')}} " enctype="multipart/form-data" method="post" class="form-control shadow p-3 mb-5 bg-white rounded" style="width: 40%">
         @csrf
         <div style="height: 20px; text-align: center">
            <h2>Tambah Produk Baru</h2>
         </div>
         <br>
         <hr>
         <div class="form-group row mb-3">
            <label class="col-4 col-form-label" for="name">Nama Produk</label> 
            <div class="col-8">
               <input id="name" name="name" placeholder="masukkan nama produk" type="text" required="required" class="form-control">
            </div>
         </div>
         
         <div class="form-group row mb-3">
            <label class="col-4 col-form-label" for="price">Harga Produk</label> 
            <div class="col-8">
               <div class="input-group">
               <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
               </div> 
               <input id="price" name="price" placeholder="masukkan harga produk" type="number" class="form-control">
               </div>
            </div>
         </div>
         
         <div class="form-group row mb-3">
            <label for="stock" class="col-4 col-form-label">Stok Produk</label> 
            <div class="col-8">
               <input id="stock" name="stock" placeholder="masukkan stok produk" type="text" class="form-control">
            </div>
         </div>
   
         <div class="form-group row mb-3">
            <label for="description" class="col-4 col-form-label">Deskripsi Produk</label> 
            <div class="col-8">
               <textarea id="description" name="description" cols="40" rows="5" aria-describedby="descriptionHelpBlock" class="form-control"></textarea> 
               <span id="descriptionHelpBlock" class="form-text text-muted">masukkan deskripsi produk</span>
            </div>
         </div>
         
         <div class="form-group row mb-3" style="padding: 0px 10px">
            <input type="file" name="image" class="form-control">
         </div> 
         
         <div class="form-group row mb-3">
            <div class="offset-4 col-8">
               <button  type="submit" class="btn btn-primary">Tambah Produk</button>
            </div>
         </div>
         <hr>
      @if (count($errors) > 0)
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $err)
                  <li>{{$err}}</li>
               @endforeach
            </ul>
         </div>
      @endif
      </form>
      
   </div>

</body>
</html>
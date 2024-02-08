<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Daftar Produk</title>
</head>
<body style="padding: 15px">  
   <div class="row p-4">
      @foreach ($products as $product)
      <div class="col-3 mb-3 d-flex">
         <div class="card shadow p-3 bg-white rounded">
            <img src="{{ url('storage/'.$product->image) }}" class="card-img-top" alt="foto produk" style="height: 200px; width: 100%; object-fit: cover;">
            <div class="card-body d-flex flex-column gap-2">
               <button type="button" class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#productDetail{{ $product->id }}">
                  {{ $product->name }}
               </button>               
            </div>
         </div>

         @include('show_product')
      </div>
      @endforeach 
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
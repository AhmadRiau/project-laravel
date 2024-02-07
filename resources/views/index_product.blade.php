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
   <div class="col-4 mb-3 d-flex">
      <div class="card" style="max-height: 600px">
         <img src="{{ url('storage/'.$product->image) }}" class="card-img-top" alt="foto produk" style="max-height: 200px; width: 100%; object-fit: cover;">
         <div class="card-body d-flex flex-column gap-2">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Price: Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
            <p class="card-text">Stock: {{ $product->stock }}</p>
            <p class="card-text">Description: {{ $product->description }}</p>
         </div>
      </div>
   </div>
@endforeach
</div>
</body>
</html>
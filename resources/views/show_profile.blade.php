<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <title>Profile  {{$user->name}} </title>
</head>
<body>
   <div class="row d-flex justify-content-center p-2">
      {{-- profile part --}}
      <div class="col-4">
         <div class="card shadow mb-3 rounded">
            <div class="card-header">
               <h4>Informasi Profil</h4>
            </div>
            <div class="card-body">
               <table>
                  <tr> <td>Nama </td> <td>: {{$user->name}}</td> </tr>
                  <tr> <td>Email </td> <td>: {{$user->email}}</td> </tr>
                  <tr> <td>Status Akun</td> <td>: {{$user->is_admin ? 'Admin' : 'Member'}} </td> </tr>
               </table>    
               <hr>
               <p><b>Ubah Password</b></p>
               <form action="{{route('edit_profile') }}" method="post">
                  @csrf
                  <table>
                     <tr>
                        <td><label for="name">Nama Baru </label></td>
                        <td>: <input type="text" name="name" value="{{$user->name}}"></td>
                     </tr>
                     <tr>
                        <td><label for="password">Password Baru </label></td>
                        <td>: <input type="password" name="password"></td>
                     </tr>
                     <tr>
                        <td><label for="password_confirmation">Konfirmasi Password</label> </td>
                        <td>: <input type="password" name="password_confirmation"></td>
                     </tr>
                  </table>
                  <button type="submit" class="btn btn-primary ">Ubah</button>
               </form>  
            </div>
         </div>

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
      {{-- profile part end --}}    

      {{-- order list --}}  
      <div class="col-6">
         <div class="card shadow mb-3 rounded">
            <div class="card-header">
               <h4>Order Akun</h4>
            </div>
            <div class="card-body">
               @foreach ( $user->orders as $order)
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Order ID</th>
                           <th>Waktu Order</th>
                           <th>Status</th>                     
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($user->orders as $order)
                        <tr>
                           <td>{{ $order->id }}</td>
                           <td>{{ $order->created_at}}</td>
                           <td>
                              @if ($order->is_paid == true)
                                 <span class="badge bg-success">Paid</span>
                              @else
                                 <span class="badge bg-warning">Unpaid</span>                  
                              @endif
                           </td>
                           <td>
                              <a href="{{ route('show_order', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               @endforeach                                                    
            </div>
         </div>
      </div>
      {{-- order list end --}}

   </div>
</body>
</html>
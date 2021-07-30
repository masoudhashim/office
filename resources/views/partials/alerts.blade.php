@if(session('success'))

 <div class="alert alert-success" role ="alert">
     {{ session('success') }}
 </div>
@endif

@if(session('erorr'))

 <div class="alert alert-danger" role ="alert">
     {{ session('erorr') }}
 </div>
@endif
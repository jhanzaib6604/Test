<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >

    </head>
    <body>
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="">
                    @auth
                    <h3>Welcome {{Auth::user()->name}}<h3>

                        <a href= "create" class= "btn btn-primary mt-3">Add New </a>

                    @else
                     <ul>
                    <li class="nav-item">

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-primary mt-3"
                        >
                            Log in
                        </a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">

                            <a
                                href="{{ route('register') }}"
                                class="btn btn-primary mt-3">
                                Register
                            </a>
                            </li>
                            </ul>    

                        @endif
                    @endauth
                </nav>
            @endif

        <div class="container">
                <div class="col-5 mt-5">
       
        @foreach($products as $add) 
<!-- Products -->    
<div class="text-center">
<div class="row">

      <div class="col-lg-6 col-md-6 mb-4">
        <div class="card">
            
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-dark ms-2">NEW</span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
            <a href="{{route('update',$add->id)}}" class="text-reset " >
            <img src="{{ Storage::url($add->image) }}" alt="Product Image">
            </a>

          </div>
          <div class="card-body">
            <a href="{{route('update',$add->id)}}" class="text-reset" style = "text-decoration:none">
              <h5 class="card-title mb-2">{{$add->name}}</h5>
            </a>  
            <h6 class="mb-3 price">Price: ${{$add->price}}</h6>
          </div>
        </div>
      </div>
    </div>
</div>

@endforeach
</section>

@if (Route::has('login'))
@auth


                <a href= "{{ route('logout')}}" class= "btn btn-danger mt-3">Logout</a>
                @endauth

            @endif

                        @if($errors->any())
                                <div class="card-footer text-body-secondary">
                                    <div class=" alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}} </li>
                                            @endforeach  
                                        </ul>      
                                    </div>
                                </div>
                        @endif
                </div>
            </div>
        </div>

    </body>
    </html>
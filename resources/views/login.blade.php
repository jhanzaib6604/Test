<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >

    </head>
    <body>
        <div class="container">
        <a href= "\" class= "btn btn-secondary mt-5"> Dashboard</a>

            <div class="row">
                <div class="col-5 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Login<h3>
                        </div>
                        <div class="card-body">
                            <form action = "{{ route('loginmatch')}}"  method ="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for = "useremail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="useremail" placeholder="Email">
                                </div> 
                                <div class="mb-3">
                                    <label for = "userpassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary" >Login</button>
                            </form>    
                            <a href= "register" class= "btn btn-secondary mt-3">Signup</a>

                        </div>
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
        </div>

    </body>
    </html>
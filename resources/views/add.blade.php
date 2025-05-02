<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Products</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >

    </head>
    <body>
        <div class="container">
        <a href= "\" class= "btn btn-secondary mt-5">Back To Dashboard</a>

            <div class="row">
            @if (Route::has('login'))

                    @auth

                <div class="col-5 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Products<h3>
                        </div>

                          <div class="container mt-5">
                                <form action="{{route('added')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Article Name : </label>
                                    <input type='text' class="form-control" name='name'>
                                </div>
                                <div class="form-group">
                                    <label>Description : </label>
                                    <input type='text' class="form-control" name='description'>
                                </div>
                    
                                <div class="form-group">
                                    <label>Price : </label>
                                    <input type='int' class="form-control" name='price'>
                                </div>
                                <div class="form-group">
                                    <label>Quantity : </label>
                                    <input type='int' class="form-control" name='quantity'>
                                </div>
                                <div class="form-group">
                                    <label>Article Picture : </label>
                                    <input type='File' class="form-control" name='image' accept=".jpg,.png,.jpeg">
                                    @error('photo')
                                    <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <br />
                                <button type='submit' class="btn btn-primary">Submit</button>
                                <br />
                            </form>
                            <div>

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
                            
                            @else
                            <script>window.location = "{{ route('login') }}";</script>
                            <?php exit; ?>

                            @endauth
                </nav>
            @endif                                

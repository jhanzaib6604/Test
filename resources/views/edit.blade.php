<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >

    </head>
    <body>
    <a href= "\" class= "btn btn-secondary mt-5">Back To Dashboard</a>

    @if (Route::has('login'))
                <nav class="">
                    @auth
<div class="container">
        
        <h1>Edit Product </h1>       
         <a href= "{{ route('delete', $product->id) }}" class= "btn btn-danger mt-3">Delete This Product</a>

        

        <form action="{{ route('edit', $product->id) }}" method="POST
        " enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mt-3">
                <label for="name"><b>Product Name</b></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="description"><b>Description</b></label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="price"><b>Price</b></label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ $product->price }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="quantity"><b>Quantity</b></label>
                <input type="number" name="quantity" id="quantity" class="form-control" step="0.01" min="0" value="{{ $product->quantity }}" required>
            </div>

            <div class="form-group mt-3">
               <br><label><b>Current Image</b></label>
            </br>
                @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="mt-3">
                @else
                    <p>No image uploaded</p>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="image"><b>New Product Image</b> (Leave blank to keep current)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Product</button>
            <a href="{{ route('welcome') }}" class="btn btn-danger mt-3">Cancel</a>
        </form>
        
    </div>
    @endauth
    @else
        <div class="container">

                            <div class="bg-image text-center mt-5"
                                    data-mdb-ripple-color="light">
                                    <img src="{{ Storage::url($product->image) }}" alt="Product Image">
                            </div>
                               <div class = "col-12   mt-5 ">
                                <h1>{{$product->name}}</h1>
                                <hr class = " mt-3"/>
                                <label for="price"><b>Price :</b> ${{$product->price}}</label>
                                <hr class = ""/>
                                <label for="price"><b>Description :</b> {{$product->description}}</label>
                                <hr class = "hr"/>

                                <label for="price"><b>Quantity :</b> 
                                <div class="quantity">
                                    <form>
                                        <input type="number" class="number" value="1" />
                                    </form>
                                </div>
                                </label>    
                                <hr class = "hr"/>
                                <h6><b>Size: <b></h6>
                                <button type="button" class="btn btn-outline-dark btn-sm">XS</button>
                                <button type="button" class="btn btn-outline-dark btn-sm">S</button>
                                <button type="button" class="btn btn-outline-dark btn-sm">M</button>
                                <button type="button" class="btn btn-outline-dark btn-sm">L</button>
                                <button type="button" class="btn btn-outline-dark btn-sm">XL</button>
                                <div class="mt-5 text-center">
                                <button type='submit' class="btn btn-primary" action="{{ route('cart', $product->id) }}" method="POST">
                                 <i class=" btn btn-primary btn-lg link-under-line light">Add To Cart</i>
                                </button>
                                <form action="{{ route('cart', $product->id) }}" method="post">
                                    <input type="hidden" name="product_id" value="1">
                                    <button type="submit">Add to Cart</button>
                                </form>

                                </div>
                            </div>
                        </div>

                            @endif

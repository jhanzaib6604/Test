<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function index() 
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
    
    public function create() 
    {
        return view('welcome');
    }
    
    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('uploads', $filename, 'public');
            $product->image = 'uploads/' . $filename;
        }
    
        $product->save();
        return redirect()->route('welcome');
        with('status','New Product Added successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view("single",compact('product'));
    }
   
    public function update($id) 
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }
    

    public function edit(Request $request, $id)
    {
        $product = new Product();
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        
        if ($request->image) {
            // Delete old image if exists
            if ($product->image) {
                $image_path = storage_path('app/public/uploads/' . $product->image);
                if (file_exists($image_path)) {
                    @unlink($image_path);
                }
            }
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('uploads', $filename, 'public');
                $product->image = 'uploads/' . $filename;
            }
        }
    
        $product->save();
        
        return redirect()->route('welcome')->with('status', 'Item Updated Successfully');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('welcome')->with('error', 'Product not found!');
        }

        // Add product to cart
        $cart = session()->get('cart', []);
        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->quantity,

        ];
        session()->put('cart', $cart);

        return redirect()->route('welcome')->with('success', 'Product added to cart successfully!');
    }


    public function destroy($id) 
    {
        Product::destroy($id);
        return redirect()->route('welcome');
    }
}

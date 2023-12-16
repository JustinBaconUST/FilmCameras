<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /*
    public function index()
    {
        $products = Product::all();
        return view('admin.products.manageproducts', compact('products'));
    } */

    public function create()
    {
        return view('admin.products.create');
    } 

    public function index()
    {
        // Fetch only non-archived products
        $products = Product::where('archive', false)->get();

        return view('products', compact('products'));
    }

    public function manageProducts()
    {
        $products = Product::all();
        return view('admin.products.manageproducts', compact('products'));
    }


/*   
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and maximum size as needed
    ]);

    $product = new Product;
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');
    $product->archive = false;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('product_images', 'public');
        $product->image = $imagePath;
    }
    $product->save();

    return redirect()->route('admin.products.manageproducts')->with('success', 'Product created successfully.');
} */

public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other validation rules for your product fields
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        // File handling for product image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $uploadPath = public_path('productpicture');
            $file->move($uploadPath, $fileName);

            // Store the product image path in the 'image' column of the products table
            $product->image = 'productpicture/' . $fileName;
        }

        // Set the default value for 'archive' to false
        $product->archive = false;

        $product->save();

        return redirect()->route('admin.products.manageproducts')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'new_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for the new image
        ]);
    
        $product = Product::find($id);
    
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
    
        // Check if a new image was uploaded
        if ($request->hasFile('new_image')) {
            $newImage = $request->file('new_image');
            $imageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('product_images'), $imageName);
            $product->image = 'product_images/' . $imageName;
        }
    
        $product->save();
    
        return redirect()->route('admin.products.manageproducts')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.manageproducts');
    }

    //archive 
    public function archive($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        $product->archive = true;
        $product->save();

        return redirect()->route('admin.products.manageproducts')->with('success', 'Product archived successfully.');
    }

    public function showProducts($id)
    {
        // Your logic to retrieve a specific product based on the $id parameter
        $product = Product::find($id);
    
        // Check if the product is found
        if (!$product) {
            abort(404); // Or handle it in a way that makes sense for your application
        }
    
        return view('products.show', compact('product'));
    }

    


}

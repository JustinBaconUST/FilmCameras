<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'stock'];

    //added archive functionality
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
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}

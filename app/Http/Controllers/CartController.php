<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = auth()->user()->id;

        $existingCartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('products')->with('success', 'Product added to cart successfully.');
    }

    public function showCart()
    {
        $userId = auth()->user()->id;
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        return view('cart.show', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->route('cart.show')->withErrors($validator)->withInput();
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $userId = auth()->user()->id;
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $quantity]);
        }

        return redirect()->route('cart.show')->with('success', 'Cart updated successfully.');
    }

    public function removeFromCart($itemId)
    {
        try {

            Cart::destroy($itemId);

            return redirect()->route('cart.show')->with('success', 'Product removed from cart successfully.');
        } catch (\Exception $e) {

            return redirect()->route('cart.show')->with('error', 'Error removing product from cart.');
        }
    }

    public function moveToLikes($itemId)
    {
        try {
            // Get the cart item
            $cartItem = Cart::findOrFail($itemId);

            // Check if the product is already in the wishlist
            $wishlistItem = Wishlist::where('product_id', $cartItem->product_id)
                ->where('user_id', auth()->id())
                ->first();

            if (!$wishlistItem) {
                Wishlist::create([
                    'product_id' => $cartItem->product_id,
                    'user_id' => auth()->id(),
                ]);
            }

            $cartItem->delete();

            return redirect()->route('cart.show')->with('success', 'Product moved to Wishlist successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cart.show')->with('error', 'Error moving product to Wishlist.');
        }
    }


}

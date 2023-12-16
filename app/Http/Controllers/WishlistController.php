<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);

    if (auth()->guest()) {
        return redirect()->route('login')->with('error', 'You must be logged in to add to wishlist');
    }

    $user = auth()->user();
    $product_id = $request->input('product_id');

    if ($user->wishlist()->where('product_id', $product_id)->exists()) {
        return redirect()->back()->with('info', 'Product is already in the wishlist');
    }

    $user->wishlist()->create(['product_id' => $product_id]);

    return redirect()->back()->with('success', 'Product added to wishlist');
}

    public function showWishlist()
    {
        $user = Auth::user();
        $wishlistItems = $user->wishlist()->with('product')->get();

        return view('wishlist.show', compact('wishlistItems'));
    }

    public function removeFromWishlist($wishlistItemId)
    {
        $wishlistItem = Wishlist::findOrFail($wishlistItemId);

        if ($wishlistItem->user_id === Auth::id()) {
            $wishlistItem->delete();

            return redirect()->back()->with('success', 'Product removed from wishlist.');
        }

        return redirect()->back()->with('error', 'Unauthorized to remove the product from wishlist.');
    }
}

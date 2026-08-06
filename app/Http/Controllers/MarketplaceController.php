<?php

namespace App\Http\Controllers;

use App\Models\AffiliateCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarketplaceController extends Controller
{
    /**
     * Display the green marketplace listing.
     */
    public function index(Request $request): View
    {
        $query = Product::with('affiliateCategory');

        if ($request->filled('category')) {
            $query->whereHas('affiliateCategory', function ($q) use ($request) {
                $q->where('slug', $request->input('category'));
            });
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->latest()->paginate(12);
        $categories = AffiliateCategory::withCount('products')->get();

        return view('marketplace.index', compact('products', 'categories'));
    }

    /**
     * Display a single product detail.
     */
    public function show(Product $product): View
    {
        $product->load('affiliateCategory');

        return view('marketplace.show', compact('product'));
    }
}

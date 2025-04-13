<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function showHome(Request $request)
    {
        $categories = Category::with('product')->get();
        $query = Product::query();
        $latestProducts = Product::orderBy('id', 'desc')->take(5)->get();


        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('price_range')) {
            switch ($request->price_range) {
                case '1':
                    $query->where('price', '<', 20000);
                    break;
                case '2':
                    $query->whereBetween('price', [50000, 100000]);
                    break;
                case '3':
                    $query->whereBetween('price', [100000, 200000]);
                    break;
                case '4':
                    $query->where('price', '>', 200000);
                    break;
            }
        }

        $products = $query->take(10)->get();

        return view('client.home', compact('categories', 'products', 'latestProducts'));
    }


    public function showList(Request $request)
    {
        $categories = Category::with('product')->get();
        $query = Product::query();
        $latestProducts = Product::orderBy('id', 'desc')->take(5)->get();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('price_range')) {
            switch ($request->price_range) {
                case '1':
                    $query->where('price', '<', 20000);
                    break;
                case '2':
                    $query->whereBetween('price', [50000, 100000]);
                    break;
                case '3':
                    $query->whereBetween('price', [100000, 200000]);
                    break;
                case '4':
                    $query->where('price', '>', 200000);
                    break;
            }
        }



        $products = $query->take(10)->get();
        return view('client.list', compact('categories', 'products', 'latestProducts'));
    }

    public function show(string $id)
    {
        $product = Product::with('category')->where('id', $id)->first();
        $product->increment('views');
        $categories = Category::all();
        $latestProducts = Product::orderBy('id', 'desc')->take(5)->get();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        $topViewedProducts = Product::orderBy('views', 'desc')->take(5)->get();
        return view('client.product-detail', compact('product', 'categories', 'latestProducts', 'relatedProducts', 'topViewedProducts'));
    }
    public function showProducts(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();
        return view('client.product_list', compact('products'));
    }

    public function filterByCategory($id)
    {
        $category = Category::query()->where('id', $id)->first();
        $products = $category->product()->get();
        $categories = Category::all();

        return view('client.product_list', compact('products', 'categories', 'category'));
    }
}

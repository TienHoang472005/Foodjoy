<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        // Lấy cart hiện tại hoặc tạo mới
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id() // nếu chưa đăng nhập thì có thể dùng session_id
        ]);

        // Kiểm tra xem sản phẩm đã có trong giỏ chưa
        $item = $cart->items()->where('product_id', $productId)->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    public function viewCart()
    {
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();
        return view('client.cart', compact('cart'));
    }

    public function update(Request $request)
{
    $quantities = $request->input('quantities', []);

    foreach ($quantities as $itemId => $qty) {
        DB::table('cart_items')->where('id', $itemId)->update([
            'quantity' => max((int) $qty, 1),
        ]);
    }

    return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công!');
}

public function remove($id)
{
    DB::table('cart_items')->where('id', $id)->delete();

    return redirect()->back()->with('success', 'Đã xoá sản phẩm khỏi giỏ hàng!');
}


}

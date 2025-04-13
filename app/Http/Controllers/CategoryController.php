<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // // Query Builder
        // $query = DB::table('categories')->orderBy('id', 'desc');
        // if($request->has('search')){
        //     $query->where('name', 'like', '%' . $request->search . '%');
        // }
        // $categories = $query->paginate(5);
        // return view('categories.index', compact('categories'));

        // Elo
        $query = Category::query()->orderBy('id', 'desc');
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $categories = $query->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // DB::table('categories')->insert([
        //     'name' => $request->name,
        //     'status' => (bool) $request->status,

        // ]);
        // return redirect()->route('categories.index')->with('success', 'Thêm thành công');

        Category::query()->insert([
            'name' => $request->name,
            'status' => (bool) $request->status,

        ]);
        return redirect()->route('categories.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // lấy ra dữ liệu của ID
        // $category = DB::table('categories')->where('id', $id)->first();
        // return view('categories.show', compact('category'));

            // lấy ra dữ liệu của ID
        $category = Category::query()->where('id', $id)->first();
        return view('admin.categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // lấy ra dữ liệu của ID cần chỉnh sửa
        $category = Category::query()->where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        Category::query()->where('id', $id)->update([
            'name' => $request->name,
            'status' => (bool) $request->status,
        ]);
        return redirect()->route('categories.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soSanPham = DB::table('products')->where('category_id', $id)->count();

        if ($soSanPham > 0) {
            return redirect()->route('categories.index')->with('error', 'Không thể xóa danh mục vì đang có sản phẩm');
        }

        Category::query()->where('id', $id)->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa thành công');
    }
}

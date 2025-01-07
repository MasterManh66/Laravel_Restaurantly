<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::OrderBy('id', 'DESC')->paginate(); //Model

        return view('admin.product.index', compact('data')); //View
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pro = Product::OrderBy('name', 'ASC')->get(); 

        return view('admin.product.create', compact('pro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:products|min:3|max:100',
            'price' => 'required|numeric|min:0|',
            'sale' => 'numeric|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:jpg,jpeg,gif,png,webp',
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'name.min' => 'Tên phải lớn hơn 3 ký tự',
            'name.max' => 'Tên phải nhỏ hơn 100 ký tự',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'price.min' => 'Giá phải lớn hơn 0',
            'sale.numeric' => 'Giảm giá phải là số',
            'sale.min' => 'Giảm giá phải lớn hơn 0',
            'sale.max' => 'Giảm giá phải nhỏ hơn 100',
            'category_id.required' => 'Danh mục không được để trống',
            'category_id.exists' => 'Danh mục hiện tại có tồn tại với bảng categories với trường id không',
            'image.required' => 'Ảnh không được để trống',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, gif, png, webp',
        ];
        $request->validate($rules, $messages);

        $data = $request->only('name', 'price','sale', 'category_id', 'description', 'status');
        // $file_name = $request->image->getClientOriginalName();
        $file_name = $request->image->hashName();
        $request->image->move(public_path('uploads'), $file_name);

        $data['image'] = $file_name;
        
        if (Product::create($data)) { 
            return redirect()->route('product.index');
        } else {
            return redirect()->route('product.create');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $pro = Product::OrderBy('name', 'ASC')->get();
        return view('admin.product.edit', compact('product', 'pro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|min:3|max:100|unique:products,name,'.$product->id,
            'price' => 'required|numeric|min:0',
            'sale' => 'numeric|min:0|max:100',
            'category_id' => 'exists:categories,id',
            'image' => 'mimes:jpg,jpeg,png,gif,webp',
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại trừ thằng hiện tại',
            'name.min' => 'Tên phải lớn hơn 3 ký tự',
            'name.max' => 'Tên phải nhỏ hơn 100 ký tự',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'price.min' => 'Giá phải lớn hơn 0',
            'sale.numeric' => 'Giảm giá phải là số',
            'sale.min' => 'Giảm giá phải lớn hơn 0',
            'sale.max' => 'Giảm giá phải nhỏ hơn 100',
            'category_id.exists' => 'Danh mục hiện tại có tồn tại với bảng categories với trường id không',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, gif, png, webp',
        ];
        $request->validate($rules, $messages);

        $data = $request->only('name', 'price','sale', 'category_id', 'description', 'status');
        // $file_name = $request->image->getClientOriginalName();
        if ($request->hasFile('image')) { // Đảm bảo kiểm tra file tồn tại trước
            $file_name = $request->file('image')->hashName(); // Sử dụng file() thay vì gọi trực tiếp
            $request->file('image')->move(public_path('uploads'), $file_name);
            $data['image'] = $file_name;
        }
        
        $product->update($data); // Không cần kiểm tra điều kiện
        return redirect()->route('product.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // dd($product);
        $product->delete();
        return redirect()->route('product.index');
    }
}

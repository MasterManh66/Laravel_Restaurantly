<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::OrderBy('id', 'DESC')->paginate(); //Model

        return view('admin.category.index', compact('data')); //View
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::OrderBy('name', 'ASC')->get();
        return view('admin.category.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories|min:3|max:100',
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'name.min' => 'Tên phải lớn hơn 3 ký tự',
            'name.max' => 'Tên phải nhỏ hơn 100 ký tự',
            'status.required' => 'Trạng thái không được để trống',
        ];
        $request->validate($rules, $messages);

        $data = $request->only('name', 'status');
        Category::create($data);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data = Category::OrderBy('name', 'ASC')->get();
        return view('admin.category.edit', compact('category','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|min:3|max:100|unique:categories,name,'.$category->id,
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại trừ thằng hiện tại',
            'name.min' => 'Tên phải lớn hơn 3 ký tự',
            'name.max' => 'Tên phải nhỏ hơn 100 ký tự',
            'status.required' => 'Trạng thái không được để trống',
        ];
        $request->validate($rules, $messages);

        $data = $request->only('name', 'status');
        $category->update($data);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$category->pro()->exists()) {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Danh mục đã được xóa.');
        }
        
        return redirect()->route('category.index')->with('error', 'Danh mục không thể xóa vì còn sản phẩm.');
        
    }
}

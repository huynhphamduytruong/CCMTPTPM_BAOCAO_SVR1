<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function editCategory(Request $request, Category $category)
    {
        if ($request->isMethod('get')) {
            return view('backend.category-edit', [
                'category' => $category
            ]);
        }

        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();

        // Remove unnecessary fields from data
        unset($data['id']);
        unset($data['_token']);

        $msg = "";
        if (isset($category->id)) {
            // Update
            $category->update($data);
            $msg = "Cập nhật loại thành công";
        } else {
            $category = new Category($data);
            $category->save();

            $msg = "Tạo mới loại thành công";
        }

        \Session::flash('msg', $msg);
        return redirect()->route('admin.category.index');
    }

    public function deleteCategory(Request $request, Category $category)
    {
        if (!isset($category->id))
            return abort(400);

        $category->forceDelete();
        $msg = "Xoá phân loại thành công";

        \Session::flash('msg', $msg);
        return redirect()->route('admin.category.index');
    }
}

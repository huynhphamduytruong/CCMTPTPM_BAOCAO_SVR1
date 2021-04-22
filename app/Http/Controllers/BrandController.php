<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function editBrand(Request $request, Brand $brand)
    {
        if ($request->isMethod('get')) {
            return view('backend.brand-edit', [
                'brand' => $brand
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
        if (isset($brand->id)) {
            // Update
            $brand->update($data);
            $msg = "Cập nhật thương hiệu thành công";
        } else {
            $brand = new Brand($data);
            $brand->save();

            $msg = "Tạo mới thương hiệu thành công";
        }

        \Session::flash('msg', $msg);
        return redirect()->route('admin.brand.index');
    }

    public function deleteBrand(Request $request, Brand $brand)
    {
        if (!isset($brand->id))
            return abort(400);

        $brand->forceDelete();
        $msg = "Xoá phân loại thành công";

        \Session::flash('msg', $msg);
        return redirect()->route('admin.brand.index');
    }
}

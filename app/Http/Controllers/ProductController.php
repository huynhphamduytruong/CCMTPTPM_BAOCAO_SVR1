<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('home', [
            'products' => DB::table('index')->paginate(10)
        ]);
    }

    public function editProduct(Request $request, Product $product)
    {
        if ($request->isMethod('get')) {
            return view(($request->segment(1) == 'admin') ? 'backend.product-edit' : 'product-details', [
                'product' => $product ?? new Product()
            ]);
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);


        $data = $request->all();

        $data['price'] = doubleval(preg_replace('/[^0-9]/', '', $data['price']));
        if (isset($data['discontinued']))
            $data['discontinued'] = (bool)$data['discontinued'];
        else
            $data['discontinued'] = false;
        $data['category_id'] = ($data['category_id'] == "-1" ? null : $data['category_id']);
        $data['brand_id'] = ($data['brand_id'] == "-1" ? null : $data['brand_id']);
        $data['img_url'] = $product->img_url ?? "https://picsum.photos/seed/SHOP_HUTECH_{$data['name']}/600";
        // Remove unnecessary fields from data
        unset($data['id']);
        unset($data['_token']);

        $msg = "";
        if (isset($product->id)) {
            // Update
            $product->update($data);
            $msg = "Cập nhật sản phẩm thành công";
        } else {
            $product = new Product($data);
            $product->save();

            $msg = "Tạo mới sản phẩm thành công";
        }

        \Session::flash('msg', $msg);
        return redirect()->route('admin.product.index');
    }

    public function deleteProduct(Request $request, Product $product)
    {
        if (!isset($product->id))
            return abort(400);

        $product->delete();
        $msg = "Xoá sản phẩm thành công";

        \Session::flash('msg', $msg);
        return redirect()->route('admin.product.index');
    }
}

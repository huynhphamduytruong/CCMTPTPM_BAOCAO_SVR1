<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function index()
    {
        $cart = \Illuminate\Support\Facades\Session::get('cart', []);

        return view('cart', [
            'cartItems' => array_map(function ($c) {
                $product = Product::find($c['product_id']);

                return (object) [
                    'name' => $product->name,
                    'img_url' => $product->img_url,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $c['qty']
                ];
            }, $cart)
        ]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->get('product_id');
        $qty = $request->get('qty');

        $cart = \Session::get('cart', []);

        if ( \Session::has('cart') && !empty($cart) ) {
            // Check if product exist in session first
            // Use strict check to make sure we're only find based on value
            $flag = false;
            array_walk($cart, function(&$c) use ($productId, $qty, &$flag) {
                if ( !$flag ) {
                    if ( $c['product_id'] == $productId ) {
                        $c['qty'] = (int) $c['qty'] + (int) $qty;
                        $flag = true;
                    }
                }
            });

            // Add product to cart like normal
            if ( !$flag ) {
                $cart[] = [
                    'product_id' => $productId,
                    'qty' => $qty
                ];
            }
        } else {
            $cart[] = [
                'product_id' => $productId,
                'qty' => $qty
            ];
        }

        \Session::put('cart', $cart);
        \Session::flash('msg', "Thêm vào giỏ hàng thành công");
        return redirect()->back();
    }

//    public function subtractFromCart(Request $request)
//    {
//        $productId = $request->get('product_id');
//        $qty = $request->get('qty');
//
//        $cart = \Session::get('cart', []);
//
//        if ( empty($cart) ) {
//            \Session::flash('err', "Yêu cầu không hợp lệ");
//            return redirect()->back();
//        }
//
//        $flag = false;
//        array_walk($cart, function(&$c) use ($productId, $qty, &$flag) {
//            if ( !$flag ) {
//                if ( $c['product_id'] == $productId ) {
//                    if ((int) $qty < (int) $c['qty']) {
//                        \Session::flash('err', "Yêu cầu không hợp lệ");
//                        return redirect()->back();
//                    }
//                    $c['qty'] = (int) $c['qty'] - (int) $qty;
//                    $flag = true;
//                }
//            }
//        });
//
//        if ( $flag ) {
//            \Session::put('cart', $cart);
//            \Session::flash('msg', "Loại bớt hàng thành công");
//            return redirect()->back();
//        } else {
//            \Session::flash('err', "Yêu cầu không hợp lệ");
//            return redirect()->back();
//        }
//    }

    public function updateCart(Request $request) {
        $productId = $request->get('product_id');
        $qty = $request->get('qty');

        if ( (int)$qty == 0 ) {
            // = delete
            return $this->deleteFromCart($request);
        }

        $cart = \Session::get('cart', []);

        if ( empty($cart) ) {
            \Session::flash('err', "Yêu cầu không hợp lệ");
            return redirect()->back();
        }

        $flag = false;
        array_walk($cart, function(&$c) use ($productId, $qty, &$flag) {
            if ( !$flag ) {
                if ( $c['product_id'] == $productId ) {
                    if ( (int) $qty < 0 ) {
                        \Session::flash('err', "Yêu cầu không hợp lệ");
                        return redirect()->back();
                    }
                    $c['qty'] = (int) $qty;
                    $flag = true;
                }
            }
        });

        if ( $flag ) {
            \Session::put('cart', $cart);
            \Session::flash('msg', "Cập nhật số lượng hàng thành công");
            return redirect()->back();
        } else {
            \Session::flash('err', "Yêu cầu không hợp lệ");
            return redirect()->back();
        }
    }

    public function deleteFromCart(Request $request)
    {
        $productId = $request->get('product_id');

        $cart = \Session::get('cart', []);

        if ( empty($cart) ) {
//            return response('Yêu cầu không hợp lệ', 400);

            \Session::flash('err', "Yêu cầu không hợp lệ");
            return redirect()->back();
        }

        $cartAfter = [];
        array_walk($cart, function($c) use (&$cartAfter, $productId) {
            if ( $c['product_id'] == (string) $productId ) {
                // Do nothing
            } else {
                $cartAfter[] = [
                    'product_id' => $c['product_id'],
                    'qty' => $c['qty']
                ];
            }
        });

        \Session::put('cart', $cartAfter);
        \Session::flash('msg', "Xoá hàng thành công");
        return redirect()->back();
    }

}

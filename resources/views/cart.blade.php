<?php /* Happy coding */ ?>

@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            @if (Session::has('err'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('err') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        <div class="card">
            <div class="card-header">
                Giỏ hàng của bạn
            </div>
            <div class="card-body">
                @if ( \Session::has('cart') && !empty($cartItems) )
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="border-top: 0!important;">#</th>
                            <th scope="col" style="border-top: 0!important;">Hình ảnh</th>
                            <th scope="col" style="border-top: 0!important;">Tên sản phẩm</th>
                            <th scope="col" style="border-top: 0!important;">Mã sản phẩm</th>
                            <th scope="col" style="border-top: 0!important;">Giá</th>
                            <th scope="col" style="border-top: 0!important;">Số lượng</th>
                            <th scope="col" style="border-top: 0!important;">Thành tiền</th>
                            <th scope="col" style="border-top: 0!important;">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $cartItems as $cartItem )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="{{ $cartItem->img_url }}" alt="{{ $cartItem->name }}" width="100" height="100"></td>
                            <td><a href="/product/{{ $cartItem->product_id }}">{{ $cartItem->name }}</a></td>
                            <td>{{ $cartItem->product_id }}</td>
                            <td>{{ number_format($cartItem->price) }}₫</td>
                            <td>
                                <div class="row">
                                    <div class="col qty-counter">
                                        <input type="number" class="number-spinner" value="{{ $cartItem->quantity }}" min="0">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-secondary btn-reset-qty" type="reset" data-qty="{{ $cartItem->quantity }}"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format($cartItem->quantity * $cartItem->price) }}₫</td>
                            <td>
                                <div class="row action">
                                    <div class="col">
                                        <form action="/cart/update" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" type="number" value="{{ $cartItem->product_id }}">
                                            <input type="hidden" name="qty" type="number" value="{{ $cartItem->quantity }}">
                                            <button type="submit" class="btn btn-success btn-update">Cập nhật</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="/cart/delete" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" type="number" value="{{ $cartItem->product_id }}">
                                            <button class="btn btn-danger btn-delete">Xoá</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Chưa có món hàng nào trong giỏ hàng</p>
                @endif

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".number-spinner").inputSpinner();

            $(document).on('click', '.btn-reset-qty', function(e) {
                e.preventDefault();
                let target = e.currentTarget;
                $(target.parentElement.previousElementSibling).find('input').val(target.dataset.qty).keyup().change();
            })

            $(document).on('change', '.qty-counter input', function(e) {
                $('input[name="qty"]').val(e.currentTarget.value);
            })
        });
    </script>
@endsection

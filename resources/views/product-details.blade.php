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
        <div class="product-content-wrapper">
            <div class="title">
                <h4><strong>{{ $product->name }}</strong></h4>
            </div>
            <hr />
            <div class="product-content d-inline-flex">
                <div class="image">
                    <img src="{{ $product->img_url }}" alt="{{ $product->name }}" width="400" height="400">
                </div>
                <div class="ml-5 float-right">
                    <div class="price">
                        <span>Giá bán: </span>
                        @if ( $product->discontinued )
                            <strong>NGỪNG KINH DOANH</strong>
                        @else
                            <strong>{{ number_format($product->price) }}₫</strong>
                        @endif
                    </div>
                    <div class="callout callout-primary">
                        <h4><strong>Chính sách bán hàng</strong></h4>
                        <hr />
                        <p>-Bán hàng chính hãng (cam kết hoàn tiền 200% nếu hàng nhái, hàng dựng kém chất lượng)</p>
                        <p>-Bảo hành toàn diện 12 tháng theo chế độ hãng</p>
                        <p>-Cho dùng thử 07 ngày đầu đổi mới</p>
                        <p>-Hỗ trợ bảo hành VIP - 1 đổi 1 trong 12 tháng</p>
                        <p>-Hỗ trợ miễn phí kỹ thuật trọn đời</p>
                    </div>
                    <div class="buy-action">
                        @if ( $product->discontinued )
                            <div>
                                <button href="javascript:void(0);" class="btn btn-secondary" disabled>NGỪNG KINH DOANH</button>
                            </div>
                        @else
                            <form action="/cart/add" method="post">
                                <div class="row">
                                    <div class="col">
                                        <input name="qty" class="number-spinner" type="number" value="1" min="1" step="1"/>
                                    </div>
                                    <div class="col">
                                        @csrf
                                        <input name="product_id" type="hidden" value="{{ $product->id }}">
                                        <button href="javascript:void(0);" class="btn btn-success"><i class="fa fa-shopping-cart"></i><span>THÊM VÀO GIỎ HÀNG</span></button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-wrapper my-3">
            <div class="product-details">
                <div class="card">
                    <div class="card-header">
                        Chi tiết sản phẩm
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {!! nl2br(e($product->description)) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="product-specs">
                <div class="card">
                    <div class="card-header">
                        Thông số kỹ thuật
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row" style="border-top: 0!important;">Tên sản phẩm</th>
                                    <td style="border-top: 0!important;">{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hãng sản xuất</th>
                                    <td>
                                        @if (isset(\App\Models\Brand::find($product->brand_id)->name))
                                            {{ \App\Models\Brand::find($product->brand_id)->name }}
                                        @else
                                            {{ __('N/A') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Màn hình</th>
                                    <td>{{ $product->screen }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Độ phân giải</th>
                                    <td>{{ $product->resolution }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">CPU</th>
                                    <td>{{ $product->cpu }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">GPU</th>
                                    <td>{{ $product->gpu }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bộ nhớ trong</th>
                                    <td>{{ $product->storage }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ram</th>
                                    <td>{{ $product->ram }}</td>
                                </tr>
                            </tbody>
                        </table>
{{--                        <h5 class="card-title">Special title treatment</h5>--}}
{{--                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $(".number-spinner").inputSpinner();
    });
</script>
@endsection

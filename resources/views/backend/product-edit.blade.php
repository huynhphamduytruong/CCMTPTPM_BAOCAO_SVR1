<?php /* Happy coding */ ?>

@extends('layouts.backend.app')

@section('title', (isset($product->id)) ? "Cập nhật sản phẩm" : "Thêm sản phẩm")

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.product.edit', ['product' => $product]) }}" method="POST">
        @csrf
{{--        <input type="hidden" name="id" value="{{ $product->id }}">--}}
        <div class="row">
            <div class="col col-sm-4 col-md-3">
                <div class="form-group">
                    <div class="text-center">
                        <img src="@if ($product->img_url) {{ $product->img_url }} @else https://via.placeholder.com/150x200 @endif" alt="Hình ảnh sản phẩm" width="150">
                    </div>
                    <div class="custom-file my-2">
                        <input type="file" class="custom-file-input" id="product-img" name="img_file" accept="image/x-png,image/gif,image/jpeg">
                        <label class="custom-file-label" for="product-img">Chọn hình cần đăng</label>
                    </div>
                </div>
            </div>
            <div class="col col-sm-8 col-md-9">
                <div class="form-group row">
                    <label for="prod-name" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prod-name" name="name" placeholder="Tên sản phẩm" value="{{ $product->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-desc" class="col-sm-2 col-form-label">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="prod-desc" name="description" rows="10" placeholder="Mô tả sản phẩm">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-price" class="col-sm-2 col-form-label">Đơn giá</label>
                    <div class="input-group mb-3 col-sm-10">
                        <input type="text" class="form-control" id="prod-price" name="price" placeholder="Đơn giá (VND)" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" value="{{ $product->price }}">
                        <div class="input-group-append">
                            <span class="input-group-text">₫</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-screen" class="col-sm-2 col-form-label">Loại màn hình</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prod-screen" name="screen" placeholder="Loại màn hình" value="{{ $product->screen }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-resolution" class="col-sm-2 col-form-label">Độ phân giải</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prod-resolution" name="resolution" placeholder="Độ phân giải" value="{{ $product->resolution }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-ram" class="col-sm-2 col-form-label">RAM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prod-ram" name="ram" placeholder="Dung lượng RAM" value="{{ $product->ram }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-cpu" class="col-sm-2 col-form-label">CPU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prod-cpu" name="cpu" placeholder="Loại CPU" value="{{ $product->cpu }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-gpu" class="col-sm-2 col-form-label">GPU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prod-gpu" name="gpu" placeholder="Loại GPU" value="{{ $product->gpu }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-storage" class="col-sm-2 col-form-label">Dung lượng lưu trữ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prod-storage" name="storage" placeholder="Dung lượng lưu trữ" value="{{ $product->storage }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-discontinued" class="col-sm-2 col-form-label">Ngừng kinh doanh</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="prod-discontinued" name="discontinued" @if($product->discontinued) checked @endif>
                            <label class="form-check-label" for="prod-discontinued">
                                Đã ngừng kinh doanh?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-category" class="col-sm-2 col-form-label">Loại sản phẩm</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="category_id">
                            <option value="-1" selected hidden>Chọn lựa chọn</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prod-brand" class="col-sm-2 col-form-label">Thương hiệu</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="brand_id">
                            <option value="-1" selected hidden>Chọn lựa chọn</option>
                            @foreach(\App\Models\Brand::all() as $brand)
                                <option value="{{ $brand->id }}" @if($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="float-right">
                        <button class="btn btn-primary" type="submit">{{ (isset($product->id)) ? "Cập nhật" : "Thêm sản phẩm" }}</button>
                        <a href="javascript:history.back();" class="btn btn-secondary" type="button">Trở về</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }

        function formatCurrency(input) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // Limit decimal to only 3 digits
                right_side = right_side.substring(0, 3);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

        $(document).ready(function() {
            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this));
                }
            }).blur();

            // $('input[type="checkbox"]').change();
        });
    </script>
@endsection

<?php /* Happy coding */ ?>

@extends('layouts.backend.app')

@section('title', 'Sản phẩm')

@section('action-btn')
    <a href="{{ route('admin.product.edit') }}" class="btn btn-success add-item">
        <i class="fa fa-plus"></i> <span>Thêm</span>
    </a>
@endsection

@section('content')
    @if (Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table with-id-col with-action-col">
        <thead>
        <tr>
            <th scope="col" style="border-top: 0!important;">#</th>
            <th scope="col" style="border-top: 0!important;">Hình ảnh</th>
            <th scope="col" style="border-top: 0!important;">Tên sản phẩm</th>
            <th scope="col" style="border-top: 0!important;">Mô tả</th>
            <th scope="col" style="border-top: 0!important;">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td style="width: 15%;"><img src="{{ $product->img_url }}" alt="{{ $product->name }}" height="150" width="150"></th>
                <td style="width: 15%;">{{ $product->name }}</td>
                <td class="ellipsis">{!! nl2br(e($product->description)) !!}</td>
                <td>
                    <div class="actions row">
                        <div class="col d-inline-flex">
                            <a class="btn btn-primary" href="{{ route('admin.product.edit', ['product' => $product->id]) }}"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger mx-2 delete-product" data-url="{{ route('admin.product.delete', ['product' => $product->id]) }}"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', 'button.delete-product', function(e) {
                if (confirm("Bạn có muốn xoá sản phẩm này?")) {
                    window.location.href = e.currentTarget.dataset.url;
                }
            });
        });
    </script>
@endsection

<?php /* Happy coding */ ?>

@extends('layouts.backend.app')

@section('title', 'Thương hiệu')

@section('action-btn')
    <a href="{{ route('admin.brand.edit') }}" class="btn btn-success add-item">
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
            <th scope="col" style="border-top: 0!important;">Tên</th>
            <th scope="col" style="border-top: 0!important;">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <th scope="row">{{ $brand->id }}</th>
                <td>{{ $brand->name}}</td>
                <td>
                    <div class="actions row">
                        <div class="col d-inline-flex">
                            <a class="btn btn-primary" href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger mx-2 delete-brand" data-url="{{ route('admin.brand.delete', ['brand' => $brand->id]) }}"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $brands->links() !!}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', 'button.delete-brand', function(e) {
                if (confirm("Bạn có muốn xoá thương hiệu này?")) {
                    window.location.href = e.currentTarget.dataset.url;
                }
            });
        });
    </script>
@endsection

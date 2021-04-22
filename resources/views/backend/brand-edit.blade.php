<?php /* Happy coding */ ?>

@extends('layouts.backend.app')

@section('title', (isset($brand->id)) ? "Cập nhật thương hiệu" : "Thêm thương hiệu")

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

    <form action="{{ route('admin.brand.edit', ['brand' => $brand]) }}" method="POST">
        @csrf

        <div class="col">
            <div class="form-group row">
                <label for="brand-name" class="col-sm-2 col-form-label">Tên thương hiệu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="brand-name" name="name" placeholder="Tên thương hiệu" value="{{ $brand->name }}">
                </div>
            </div>

            <div class="form-group">
                <div class="float-right">
                    <button class="btn btn-primary" type="submit">{{ (isset($brand->id)) ? "Cập nhật" : "Thêm thương hiệu" }}</button>
                    <a href="javascript:history.back();" class="btn btn-secondary" type="button">Trở về</a>
                </div>
            </div>
        </div>
    </form>
@endsection

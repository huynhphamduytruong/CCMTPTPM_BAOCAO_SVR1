<?php /* Happy coding */ ?>

@extends('layouts.backend.app')

@section('title', (isset($category->id)) ? "Cập nhật phân loại" : "Thêm phân loại")

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

    <form action="{{ route('admin.category.edit', ['category' => $category]) }}" method="POST">
        @csrf

        <div class="col">
            <div class="form-group row">
                <label for="cat-name" class="col-sm-2 col-form-label">Tên loại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cat-name" name="name" placeholder="Tên loại" value="{{ $category->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="cat-desc" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="cat-desc" name="description" rows="10" placeholder="Mô tả phân loại này">{{ $category->description }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="float-right">
                <button class="btn btn-primary" type="submit">{{ (isset($category->id)) ? "Cập nhật" : "Thêm phân loại" }}</button>
                <a href="javascript:history.back();" class="btn btn-secondary" type="button">Trở về</a>
            </div>
        </div>
    </form>
@endsection

<?php /* Happy coding */ ?>

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mb-5 row-cols-md-2 row-cols-lg-4">
{{--            <div class="card-deck">--}}
                @foreach($products as $product)
                    <div class="col mb-4">
                        <x-product :product="$product"></x-product>
                    </div>
                @endforeach
{{--            </div>--}}
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $products->links() !!}
        </div>
    </div>
@endsection

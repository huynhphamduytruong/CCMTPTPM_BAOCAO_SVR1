<div class="product card mx-2 my-2 h-100">
    <a href="/product/{{ $product->id }}">
        <img class="card-img-top" src="{{ $product->img_url }}" alt="{{ $product->name }}" width="180" height="180">
        <div class="card-body">
            <p class="card-title"><strong>{{ $product->name }}</strong></p>

            @if ( $product->discontinued )
                <p class="card-text text-danger"><strong>NGỪNG KINH DOANH</strong></p>
            @else
                <p class="card-text text-danger"><strong>{{ number_format($product->price) }}₫</strong></p>
            @endif
        </div>
    </a>
</div>

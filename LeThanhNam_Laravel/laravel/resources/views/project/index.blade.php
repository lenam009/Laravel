@extends('project.layouts.client')

@section('title')
    Trang chủ
@endsection

@section('content')

    @if (!isset($products) || count($products) == 0)
        <div class="row m-auto p-5">
            <x-Project.Alert content="Don't have product !!!" color="danger" />
        </div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-4 hoverProduct text-center p-1 mt-2 mb-2">
                    <div class="card  border border-dark" style="height: 100%;">
                        <a href="{{ route('project.productDetail', ['idProduct' => $product->idProduct]) }}"><img
                                src="{{ asset('storage/images/' . $product->imageProduct) }}" class="card-img-top"
                                style="max-height: 250px" /></a>
                        <div class="card-body">
                            <p class="h5"> {{ $product->nameProduct }} </p>
                            <p class="text-danger font-weight-bold">
                                {{ number_format($product->priceProduct, 0, ',', '.') }} VNĐ </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-end">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    @endif
@endsection

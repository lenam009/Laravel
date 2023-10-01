@extends('project.layouts.client')

@section('title')
    Product
@endsection

@section('content')
    <div class="row p-4 bg-white" style="margin-top: 1px">
        <div class="col-5">
            <img src="{{ asset('storage/images/' . $product->imageProduct) }}" width="500" height="420" />
        </div>
        <div class="col-7">
            <h4 class="font-wight-bold"><?= $product->nameProduct ?></h4>
            <a class="font-wight-bold"><?= $product->contentProduct ?></a><br /><br />
            <a class="font-weight-bold" style="font-size: large;">Producer : </a>
            @if (!isset($product->idTypeProduct))
                <a class="h5">None</a>
            @else
                <a class="h5"><?= $product->nameTypeProduct ?></a>
            @endif
            <br /><br />
            <h4 class="text-danger">{{ number_format($product->priceProduct, 0, ',', '.') }}&nbsp;VNĐ</h4>

            <div class="row mt-4 ">
                <div class="col-12  ml-0  ">
                    <h3 class="font-weight-bold">Data engine</h3>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td class="w-25">Screen</td>
                            <td><?= $product->screen ?></td>
                        </tr>
                        <tr>
                            <td>CPU</td>
                            <td><?= $product->CPU ?></td>
                        </tr>
                        <tr>
                            <td>RAM</td>
                            <td><?= $product->RAM ?></td>
                        </tr>
                        <tr>
                            <td>Hard Drive</td>
                            <td><?= $product->hardDrive ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            @if (session('command'))
                <h3 class="font-weight-bold text-info mb-3">Are you sure delete this product?</h3>
                <a class="btn btn-danger"
                    href="{{ route('project.deleteProduct', ['action' => 'yes', 'idProduct' => $product->idProduct]) }}">Yes</a>
                <a class="btn btn-primary ml-5"
                    href="{{ route('project.productDetail', ['idProduct' => $product->idProduct]) }}">Back</a>
            @else
                <a class="btn btn-danger"
                    href="{{ route('project.deleteProduct', ['action' => 'delete', 'idProduct' => $product->idProduct]) }}">Delete</a>
                <a class="btn btn-primary ml-5"
                    href="{{ route('project.updateProduct', ['idProduct' => $product->idProduct]) }}">Update</a>
                <a class="btn btn-primary ml-5"
                    href="{{ route('project.handleBuyProduct', ['idProduct' => $product->idProduct]) }}">&nbsp;&nbsp;
                    Buy&nbsp;
                    &nbsp;</a>
            @endif
            @if (session('msg'))
                <div class="mt-3"><x-Project.Alert color="danger" content="{{ session('msg') }}" /></div>
            @elseif (session('msgSuccess'))
                <div class="mt-3"><x-Project.Alert color="success" icon='check' content="{{ session('msgSuccess') }}" />
                </div>
            @endif
        </div>
    </div>
@endsection

@extends('project.layouts.client')

@section('title')
    New Product
@endsection

@section('titleForm')
    <h3 class="text-light pt-2"> Update Product </h3>
@endsection

@section('content')
    <div class="container mt-3 pb-3">
        <div class="w-100 m-auto ">
            <form method="POST" action="{{ route('project.handleUpdate') }}" enctype="multipart/form-data">
                <table class="table labelFont table-borderless table-info">
                    <tr class="">
                        <td class="w-25"><label for="name">Name</label></td>
                        <td><input name="nameProduct" id="name" value="{{ $product->nameProduct }}" type="text"
                                class="form-control" />
                        </td>
                    </tr>

                    <tr>
                        <td><label for="image">Image</label></td>
                        <td>
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('storage/images/' . $product->imageProduct) }}" width="150"
                                        height="120" />
                                </div>
                                <div class="col-9">
                                    <input id="image" type="file" name="file" class="form-control" />
                                    <div class="row mt-2">
                                        @if (session('command'))
                                            <div class="row m-0 mt-2">
                                                <h5 class="text-danger p-0 ml-3">Are you sure delete this image?</h5>
                                                <button class="btn btn-danger ml-4" style="margin-top: -1%;" type="submit"
                                                    name="yes" value="yes">Yes</button>
                                                <button class="btn btn-primary ml-3" style="margin-top: -1%;" type="submit"
                                                    name="back" value="back">Back</button>
                                            </div>
                                        @else
                                            @if (isset($product->imageProduct))
                                                <div class="row m-0">
                                                    <button class="ml-3 h-75 w-100 btn btn-danger font-weight-bold"
                                                        name="delete" value="delete">Delete
                                                        image</button><br />
                                                </div>
                                            @endif
                                        @endif
                                        <div class="w-50 m-auto">
                                            @if (session('msgImage'))
                                                <x-Project.Alert content="result image" color='danger' />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="content">Content</label></td>
                        <td>
                            <textarea id="content" name="contentProduct" class="form-control" maxlength="250"><?= $product->contentProduct ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="price">Price</label></td>
                        <td><input id="price" name="priceProduct" value="<?= $product->priceProduct ?>" type="number"
                                class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>Type Product</label></td>
                        <td>
                            <div class="row">
                                <div class="ml-3 mr-2">
                                    <input checked type="radio" class="" name="idTypeProduct" value="null"
                                        id="null">
                                    <label class="" for="null">Other</label>
                                </div>
                                @foreach ($typeProducts as $typeProduct)
                                    <div class="ml-3 mr-2">
                                        @if ($product->idTypeProduct == $typeProduct->idTypeProduct)
                                            <input type="radio" checked class="" name="idTypeProduct"
                                                value="{{ $typeProduct->idTypeProduct }}"
                                                id={{ $typeProduct->idTypeProduct }} />
                                        @else
                                            <input type="radio" class="" name="idTypeProduct"
                                                value="{{ $typeProduct->idTypeProduct }}"
                                                id={{ $typeProduct->idTypeProduct }} />
                                        @endif
                                        <label class=""
                                            for="{{ $typeProduct->idTypeProduct }}">{{ $typeProduct->nameTypeProduct }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="screen">Screen</label></td>
                        <td><input id="screen" name="screen" type="text" value="{{ $product->screen }}"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><label for="cpu">CPU</label></td>
                        <td><input id="cpu" name="CPU" value="{{ $product->CPU }}" type="text"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><label for="ram">Ram</label></td>
                        <td><input id="ram" name="RAM" value="{{ $product->RAM }}" type="text"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><label for="hardDrive">Hard Drive</label></td>
                        <td><input name="hardDrive" id="hardDrive" value="{{ $product->RAM }}" type="text"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td colspan="" class="text-right">
                            <div class="row">
                                <div class="col-10">
                                    @if (session('msg'))
                                        <x-Project.Alert content="{{ session('msg') }}" color='danger' />
                                    @elseif (session('msgSuccess'))
                                        <x-Project.Alert content="{{ session('msgSuccess') }}" color='success' />
                                    @elseif ($errors->any())
                                        <x-Project.Alert content="{{ $errors->first() }}" color='danger' />
                                    @endif
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary w-100 h-100" type="submit" name="update"
                                        value="update">Update</button>
                                    <input type="hidden" name="idProduct" value="{{ $product->idProduct }}" />
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                @csrf
            </form>
        </div>
    </div>
@endsection

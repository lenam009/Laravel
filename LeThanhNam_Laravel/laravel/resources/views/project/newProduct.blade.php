@if (Session::has('name'))
    {{ Session::get('name') }}
@endif

@extends('project.layouts.client')

@section('title')
    New Product
@endsection

@section('titleForm')
    <h3 class="text-light pt-2">
        New Product </h3>
@endsection

@section('content')
    <div class="container mt-3 pb-2">
        <div class="w-100 m-auto ">
            <form method="POST" action="" enctype="multipart/form-data">
                <table class="table labelFont table-borderless table-info">
                    <tr class="">
                        <td class="w-25"><label for="name">Name</label></td>
                        <td><input name="nameProduct" id="name" type="text" value="{{ old('nameProduct') }}"
                                class="form-control" />
                            @error('nameProduct')
                                <div class="text-right pr-1"><a class=" text-danger h5">{{ $message }}</a></div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="file">Image</label></td>
                        <td>
                            <input type="file" name="file" class="form-control" id="file" />
                            @error('file')
                                <div class="text-right pr-1"><a class=" text-danger h5">{{ $message }}</a></div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="content">Content</label></td>
                        <td>
                            <textarea id="content" name="contentProduct" class="form-control" maxlength="250">{{ old('contentProduct') }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="price">Price</label></td>
                        <td><input name="priceProduct" value="{{ old('priceProduct') }}" id="price" type="number"
                                class="form-control" />
                            @error('priceProduct')
                                <div class="text-right pr-1"><a class=" text-danger h5">{{ $message }}</a></div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label>Type Product</label></td>
                        <td>
                            <div class="row">
                                @foreach ($typeProducts as $product)
                                    <div class="ml-3 mr-2">
                                        <?php if (old('idTypeProduct') == $product->idTypeProduct) : ?>
                                        <input type="radio" checked class="" name="idTypeProduct"
                                            value="<?= $product->idTypeProduct ?>" id=<?= $product->idTypeProduct ?> />
                                        <?php else : ?>
                                        <input type="radio" class="" name="idTypeProduct"
                                            value="<?= $product->idTypeProduct ?>" id=<?= $product->idTypeProduct ?> />
                                        <?php endif; ?>
                                        <label class=""
                                            for="<?= $product->idTypeProduct ?>"><?= $product->nameTypeProduct ?></label>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="screen">Screen</label></td>
                        <td><input name="screen" value="{{ old('screen') }}" id="screen" type="text"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><label for="cpu">CPU</label></td>
                        <td><input name="CPU" id="cpu" value="{{ old('CPU') }}" type="text"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><label for="ram">Ram</label></td>
                        <td><input name="RAM" id="ram" type="text" value="{{ old('RAM') }}"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><label for="hardDrive">Hard drive</label></td>
                        <td><input name="hardDrive" id="hardDrive" value="{{ old('hardDrive') }}" type="text"
                                class="form-control" /></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="null" value="<?= null ?>" />
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td colspan="3" class="text-right">
                            <div class="row">
                                <div class="col-10">
                                    @if ($errors->any())
                                        @error('msg')
                                            <x-Project.Alert color='danger' content='{{ $message }}' />
                                        @enderror
                                    @elseif(session('msg'))
                                        <x-Project.Alert color='success' icon='check' content="{{ session('msg') }}" />
                                    @endif
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary w-100 h-100" name="submit"
                                        value="submit">Submit</button>
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

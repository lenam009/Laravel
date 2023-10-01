@php
    $money = 0;
@endphp

@extends('project.layouts.client')

@section('title')
    Cart
@endsection

@section('content')
    <div class="container-fluid bg-white">
        @if (!Session::has('cart') || count(Session::get('cart')) == 0)
            <x-Project.Alert color='danger' content="You not buy product" />
        @elseif(session('msgSuccess'))
            <x-Project.Alert color='success' icon='check' content="{{ session('msgSuccess') }}" />
        @elseif(session('msgFailed'))
            <x-Project.Alert color='danger' content="{{ session('msgFailed') }}" />
        @else
            <div class=" w-100 m-auto">
                <table class="table mt-3 mb-3 text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Session::get('cart') as $key => $descCart)
                            @php
                                $money += $descCart->priceProduct * $descCart->quantity;
                            @endphp
                            <form method="post">
                                <tr>
                                    <td class="font-weight-bold">{{ $key + 1 }}</td>
                                    <td><img class="card-img-top"
                                            src="{{ asset('storage/images/' . $descCart->imageProduct) }}" height="150" />
                                    </td>
                                    <td><a class="h5">{{ $descCart->nameProduct }}</a></td>
                                    <td><a
                                            class="font-weight-bold">{{ number_format($descCart->priceProduct, 0, ',', '.') }}</a>
                                    </td>
                                    <td><input class="form-control w-50 m-auto" required type="number" min="1"
                                            name="quantity" value="{{ $descCart->quantity }}" /></td>
                                    <td class="text-right">
                                        <button name="submit" value="delete" type="submit"
                                            class="btn btn-danger">Delete</button>
                                        <button name="submit" value="update" type="submit"
                                            class="btn btn-primary">Update</button>
                                        <input type="hidden" name="idProduct" value="{{ $descCart->idProduct }}" />
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                        @if (session('result'))
                            <tr>
                                <td colspan="6" class="text-right border-0 font-weight-bold h4 text-danger">
                                    {{ session('result') }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="6" class="text-right font-weight-bold">
                                <h5 class="text-dark">Tổng tiền: <span
                                        class="text-danger"><?= number_format($money, 0, ',', '.') ?> VNĐ</span></h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="border-0 text-right font-weight-bold"><a class="btn btn-primary"
                                    href="{{ route('project.payment') }}">Payment</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

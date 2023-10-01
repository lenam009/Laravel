@extends('layouts.client')

@section('content1')
    <nav class="nav navbar">
        <div class="dropdown p-0">
            <a class="dropdown-toggle nav-link font-weight-bold text-dark" href="#" data-toggle="dropdown"
                id="1">ccc</a>
            <div class="dropdown-menu" style="">
                <a class="nav-link dropdown-item text-dark" href="#">b</a>
                <div class="dropdown-divider m-0 p-0"></div>
                <a class="nav-link dropdown-item text-dark" href="#">b</a>
                <div class="dropdown-divider m-0 p-0"></div>
                <a class="nav-link dropdown-item text-dark" href="#">b</a>
            </div>
        </div>
    </nav>
@endsection

{{-- <h1>Hello Home.Blade.php</h1>

<button class="show"> show </button> --}}

{{-- <h2>{{ $welcome }}</h2>

    <h2> {{ empty(request()->id) ? 'None' : request()->id }} </h2>

    <h2>{!! $welcome !!}</h2> --}}

{{-- @for ($i = 1; $i <= 10; $i++)
        <h3> Phan tử thứ: {{ $i }} </h3>
    @endfor --}}

{{-- @if ($i == 1)
        @break
    @endif --}}

{{-- <?php $i = 0; ?>
    @while ($i <= 10)
        <h3> Phan tử thứ: {{ $i }} </h3>
        <?php if ($i == 1) {
            break;
        } ?>
        @php  $i++ @endphp
    @endwhile --}}

{{-- <?php $data = ['index 1', 'index 2', 'index 3']; ?>
    @forelse ($data as $item)
        <p> Phần tử thứ {{ $item }} </p>
    @empty
        <p> Ko co phần tử nào </p>
    @endforelse --}}

{{-- <?php $kq = 1; ?>
    @if ($kq == 0)
        <p>Yes</p>
    @elseif ($kq == 1)
        <p>Yes elseIf</p>
    @else
        <p>No</p>
    @endif --}}

{{-- <?php
$number = 5;
$total = 10;
?>

    <h3>{{ $total - $number }}</h3> --}}

{{-- <script> </script> --}}

{{-- @include('clients.home.list'); --}}

@extends('layouts.client')

@section('title')
    This is a home.blade.php
@endsection

@section('content')
    <h1 class="text-danger">Index</h1>
@endsection

@section('sidebar')
    @parent
    <h1>Sidebar 2</h1>
@endsection

{{-- @section('css')

@endsection --}}

{{-- @section('js')
    <script>
        document.querySelector('.show').onclick = function() {
            alert('Thành công');
        };
    </script>
@endsection --}}


{{--
//...AppService (rẻ nhánh)
@env('local')
<p>Môi trường Local</p>
@elseenv('local1')
<p> Môi trường Local 1 </p>
@else
<p> Ko phải môi trường Local </p>
@endenv --}}


{{-- //...Component (Tái sử dụng html)
<x-alert type="success" data-icon="facebook" content="{{$title}}"/>

<x-alert type="success" data-icon="check" content="!!!" />

<x-inputs.button /> --}}


{{-- //...Ảnh lấy từ folder public
<tr>
    <td colspan="2">
        <p> <img src="{{ asset('storage/hinh2.png') }}" style=";max-width: 100%;height: auto" /> </p>
        <p><a class="btn btn-primary" href="{{route('dowloadImage') . '?image=' . public_path('storage/hinh2.png')}}"> Dowload ảnh </a></p>
    </td>
</tr> --}}

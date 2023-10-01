@extends('project.layouts.client')

@section('title')
    Login
@endsection

@section('content')
    <div class="row" style="background-color: lightblue;">
        <div class="col-1">

        </div>
        <div class="col-5">
            <img src="{{ asset('storage/images/repersentLogin.png') }}" width="700" />
        </div>
        <div class="col-5 bg-white" style="padding-top: 10%;">
            <form method="POST">
                <div class="w-75 m-auto">
                    <div>
                        <label for="email">Email (*)</label>
                        <input id="email" class="form-control" value="{{old('email')}}" required name="email" type="email" />
                    </div><br />
                    <div>
                        <label for="password">Password (*)</label>
                        <input id="password" class="form-control" required value="{{old('password')}}" name="password" type="password" />
                    </div><br />
                    <div class="row p-0">
                        <div class="col-6">
                            <button class="btn btn-primary" type="submit"  name="submit" value="submit">Login</button>
                        </div>
                        <div class="col-6 text-right pt-2">
                            <a href="../include/register.php" style="background-color: orange;"
                                class="p-2 text-right rounded text-white border-0 ">Register</a><br />
                            <a href="../include/forgetPassword.php" class=" text-white btn btn-danger mt-4">Forget
                                password</a>
                        </div>
                    </div>
                    @if (session('msgSuccess'))
                        <div class="row mt-3 p-0">
                            <div class="col-12"> <x-Project.Alert content="{{ session('msgSuccess') }}" color='danger' />
                            </div>
                        </div>
                    @elseif(session('msgFailed'))
                        <div class="row mt-3 p-0">
                            <div class="col-12"> <x-Project.Alert content="{{ session('msgFailed') }}" color='danger' />
                            </div>
                        </div>
                    @endif
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

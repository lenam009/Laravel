<header class="" style="box-shadow: 0px 3px 10px 1px darkgray">
    <nav class="navbar navbar-expand shadow m-0">
        <a class="navbar-brand m-0 navbar text-secondary font-weight-bold" style="font-size:xx-large"
            href="{{ route('project.index') }}">Home</a>
        <ul class="h5 menu nav navbar-collapse justify-content-end pr-5">
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('project.newProduct') }}">New Product</a>
            </li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('project.cart') }}">Cart
                    @if (Session::has('cart'))
                        (<span> {{ count(Session::get('cart')) }} Product </span>)
                    @endif

                </a></li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle text-dark nav-link" data-toggle="dropdown" href="#"
                        id="menu-dropdown">Laptop</a>
                    <div class="dropdown-menu border-0">
                        @foreach ($typeProducts as $typeProduct)
                            <a href="{{ route('project.getProductByIdTypeProduct', ['idTypeProduct' => $typeProduct->idTypeProduct]) }}"
                                class="dropdown-item hoverTypeProduct border p-2">{{ $typeProduct->nameTypeProduct }}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            @if (Auth::user())
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('project.logout') }}">Logout
                        ({{ auth()->user()->email }})
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>

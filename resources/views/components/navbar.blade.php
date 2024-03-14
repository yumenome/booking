<nav class="navbar navbar-expand-lg bg-dark sticky-top bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand font-bold" href="/">enchanter</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="{{ (Route::is('login')) ? 'active' : '' }} nav-link " aria-current="page" href="{{ route('login') }}"> login </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ (Route::is('register')) ? 'active' : '' }} nav-link " href="{{ route('register') }}"> register </a>
                    </li>
                @endguest
                @auth
                <div style="display: flex;align-items: center; justify-content: space-evenly">
                 @if (auth()->user()->is_doctor)
                        <li class="nav-item" >
                            <span class="font-bold text-white">DR. {{ auth()->user()->name}}</span>
                           </li>
                           @else
                           <li class="nav-item" >
                               <span class="font-bold text-white">{{ auth()->user()->name}}</span>
                           </li>
                           @endif
                           <li class="nav-item" >
                               <form action="{{ route('logout')}}" method="post">
                                   @csrf
                                   <button class="btn btn-danger btn-sm fs-6 rounded-pill" type="submit"> logout</button>
                               </form>
                           </li>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>

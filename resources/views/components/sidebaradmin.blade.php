<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">Data</li>
        @if(Auth::user()->level == 'admin')
        <li><a class="nav-link" href="{{route('kategori.index')}}"><i class="far fa-square"></i> <span>Data
                    Kategori</span></a>
        </li>
        <li><a class="nav-link" href="{{route('game.index')}}"><i class="far fa-square"></i> <span>Data Game</span></a>
        </li>
        <li><a class="nav-link" href="{{route('order.index')}}"><i class="far fa-square"></i> <span>Order</span></a>
        </li>
        <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Transaction</span></a></li>
        @else
        <li><a class="nav-link" href="{{route('order.index')}}"><i class="far fa-square"></i> <span>Order</span></a>
        </li>
        <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Transaction</span></a></li>
        @endif

    </ul>


</aside>
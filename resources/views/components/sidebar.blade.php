<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <img src="{{ asset('images/icons/ernovv.svg') }}" alt="{{ config('app.name') }}" width="35">
            <span class="app-brand-text demo text-black fw-bolder ms-2">{{ config('app.name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Home -->
        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="{{ __('menu.home') }}">{{ __('menu.home') }}</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ __('menu.header.main_menu') }}</span>
        </li>

       
        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('product.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="{{ __('Product') }}">{{ __('Product') }}</div>
            </a>
            <ul class="menu-sub">
             
                <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('product.*') ? 'active' : '' }}">
                    <a href="{{ route('product.index') }}" class="menu-link">
                        <div data-i18n="{{ __('List Product') }}">{{ __('List Product') }}</div>
                    </a>
                </li>
                
                
               
            </ul>
        </li> 
       <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('sample.colors.*') ? 'active open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-package"></i>
        <div data-i18n="{{ __('Sample Color') }}">{{ __('Sample Color') }}</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('sample.colors.*') ? 'active' : '' }}">
            <a href="{{ route('sample.colors.index') }}" class="menu-link">
                <div data-i18n="{{ __('Sample Color') }}">{{ __('Sample Color') }}</div>
            </a>
        </li>
    </ul>
</li>

        <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('master.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                <div data-i18n="{{ __('Data Master') }}">{{ __('Data Master') }}</div>
            </a>
            <ul class="menu-sub">
             
                <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('master.slider.*') ? 'active' : '' }}">
                    <a href="{{ route('master.slider.index') }}" class="menu-link">
                        <div data-i18n="{{ __('Slider') }}">{{ __('Slider') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('master.category.*') ? 'active' : '' }}">
                    <a href="{{ route('master.category.index') }}" class="menu-link">
                        <div data-i18n="{{ __('Category') }}">{{ __('Category') }}</div>
                    </a>
                </li>
                
               
            </ul>
        </li> 

    

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ __('menu.header.other_menu') }}</span>
        </li>
        
        
     
        @if(auth()->check() && auth()->user()->role == 'admin')
       
            <!-- User Management -->
            <li class="menu-item {{ \Illuminate\Support\Facades\Route::is('user.*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-pin"></i>
                    <div data-i18n="{{ __('menu.users') }}">{{ __('menu.users') }}</div>
                </a>
            </li>
            
        @endif
    </ul>
</aside>

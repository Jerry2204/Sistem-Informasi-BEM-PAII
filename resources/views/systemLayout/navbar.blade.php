<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ auth()->user()->gambar() }}" alt="">
                    </span>
                    @if (auth()->user())
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    @else
                    <span class="user-name">John Doe</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a href="{{ route('profile') }}" class="dropdown-item"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('account.setting') }}"><i class="dw dw-settings2"></i> Account Setting</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
        {{-- <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="{{ asset('assets/images/github.svg') }}" alt=""></a>
        </div> --}}
    </div>
</div>

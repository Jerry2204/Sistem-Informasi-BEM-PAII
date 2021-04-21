<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}" width="50" alt="" class="dark-logo">
            <img src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}" width="50" alt="" class="light-logo"> BEM IT DEL
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index.html">Dashboard style 1</a></li>
                        <li><a href="index2.html">Dashboard style 2</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user1"></span><span class="mtext">User</span>
                    </a>
                    <ul class="submenu">
                        @if (auth()->user()->role == "admin")
                        <li><a href="{{ route('bph') }}">BPH</a></li>
                        @endif
                        @if (auth()->user()->role == "bph")
                        <li><a href="{{ route('kadep') }}">Kepala Departemen</a></li>
                        @endif
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="html5-editor.html">HTML5 Editor</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">Tables</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Basic Tables</a></li>
                        <li><a href="datatable.html">DataTables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('departemen') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-notebook"></span><span class="mtext">Departemen</span>
                    </a>
                </li>
                <li>
                  <a href="{{ route('calendar')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Calendar</span>
                   </a>
                </li>
                @if (auth()->user()->role == 'admin')
                <li>
                    <a href="{{ route('program_studi') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-notebook"></span><span class="mtext">Program Studi</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('forums-admin')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Forums</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <div class="sidebar-small-cap">Extra</div>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit-2"></span><span class="mtext">Documentation</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="introduction.html">Introduction</a></li>
                        <li><a href="getting-started.html">Getting Started</a></li>
                        <li><a href="color-settings.html">Color Settings</a></li>
                        <li><a href="third-party-plugins.html">Third Party Plugins</a></li>
                    </ul>
                </li>
                <li>
                    <a href="https://dropways.github.io/deskapp-free-single-page-website-template/" target="_blank" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-paper-plane1"></span>
                        <span class="mtext">Landing Page <img src="{{ asset('assets/images/coming-soon.png') }}" alt="" width="25"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

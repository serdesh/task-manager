<!-- User -->
<ul class="navbar-nav align-items-center d-none d-md-flex">
    <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">{{ __('Добро пожаловать!') }}</h6>
            </div>
            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>{{ __('Мой профиль') }}</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>{{ __('Настройки') }}</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>{{ __('Активность') }}</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>{{ __('Поддержка') }}</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>
                <span>{{ __('Выйти') }}</span>
            </a>
        </div>
    </li>
</ul>

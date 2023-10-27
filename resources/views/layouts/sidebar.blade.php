<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            {{ trans('panel.site_title') }}
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item  {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('admin.home') }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title"> {{ trans('global.dashboard') }}</span>
                </a>
            </li>


            @can('user_management_access')
                <li class="nav-item {{ active_class(['email/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button"
                        aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">{{ trans('cruds.userManagement.title') }}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['email/*']) }}" id="email">
                        <ul class="nav sub-menu">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link  {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        {{ trans('cruds.permission.title') }}</a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="nav-link  {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">{{ trans('cruds.role.title') }}</a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">{{ trans('cruds.user.title') }}</a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.audit-logs.index') }}"
                                        class="nav-link  {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">{{ trans('cruds.auditLog.title') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('cliente_access')
                <li
                    class="nav-item  {{ request()->is('admin/clientes') || request()->is('admin/clientes/*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.clientes.index') }}">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">{{ trans('cruds.cliente.title') }}</span>
                    </a>
                </li>
            @endcan

            @can('pago_access')
                <li class="nav-item  {{ request()->is('admin/pagos') || request()->is('admin/pagos/*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.pagos.index') }}">
                        <i class="link-icon" data-feather="dollar-sign"></i>
                        <span class="link-title">{{ trans('cruds.pago.title') }}</span>
                    </a>
                </li>
            @endcan

            @can('asistencium_access')
                <li
                    class="nav-item {{ request()->is('admin/asistencia') || request()->is('admin/asistencia/*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.asistencia.index') }}">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">{{ trans('cruds.asistencium.title') }}</span>
                    </a>
                </li>
            @endcan

            @can('clase_access')
                <li
                    class="nav-item {{ request()->is('admin/clases') || request()->is('admin/clases/*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.clases.index') }}">
                        <i class="link-icon" data-feather="clipboard"></i>
                        <span class="link-title">{{ trans('cruds.clase.title') }}</span>
                    </a>
                </li>
            @endcan


            @can('horario_access')
                <li
                    class="nav-item {{ request()->is('admin/horarios') || request()->is('admin/horarios/*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.horarios.index') }}">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">{{ trans('cruds.horario.title') }}</span>
                    </a>
                </li>
            @endcan


            @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="nav-item  {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('profile.password.edit') }}">
                            <i class="link-icon" data-feather="key"></i>
                            <span class="link-title">{{ trans('global.change_password') }}</span>
                        </a>
                    </li>
                @endcan
            @endif
            <li class="nav-item  {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
              <a class="nav-link " href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                  <i class="link-icon" data-feather="log-out"></i>
                  <span class="link-title">{{ trans('global.logout') }}</span>
              </a>
          </li> 








        </ul>
    </div>
</nav>
 
<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
         Broker
        </a>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt"></i>
                {{ trans('global.dashboard') }}
            </a>
       </li>
       @can('Features_Access')
          <li class="c-sidebar-nav-dropdown {{ request()->is("admin/service*") ? "c-show" : "" }} {{ request()->is("admin/bank*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fa fa-bandcamp  fa-lg c-sidebar-nav-icon">
                    </i>
                    Features
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                @can('service_access')
                    <li class="c-sidebar-nav-item">
                            <a href="{{route('admin.services.index') }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }} ">
                                <i class="fa-fw fas fa-rocket c-sidebar-nav-icon"></i>
                                Services
                            </a>
                        </li>
                    @endcan
                    @can('bank_access')
                    <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.bank.index') }}"  class="c-sidebar-nav-link {{ request()->is("admin/bank") || request()->is("admin/bank/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bank c-sidebar-nav-icon"></i>
                                Bank
                            </a>
                    </li>
                @endcan
            </ul>
        </li>
       @endcan
       @can('users_access')
           <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clients*") ? "c-show" : "" }} {{ request()->is("admin/providers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                    Users
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                   @can('client_access')
                       <li class="c-sidebar-nav-item">
                            <a href="{{route('admin.clients.index')}}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-alt c-sidebar-nav-icon"></i>
                               Customers
                            </a>
                      </li>
                  @endcan
                  @can('provider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{route('admin.providers.index')}}" class="c-sidebar-nav-link {{ request()->is("admin/providers") || request()->is("admin/providers/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-fighter-jet c-sidebar-nav-icon"></i>
                                Service Provider
                            </a>
                        </li>
                  @endcan
                </ul>
            </li>
       @endcan
       @can('scouting_data_access')
           <li class="c-sidebar-nav-dropdown {{ request()->is("admin/order*") ? "c-show" : "" }} {{ request()->is("admin/total_invoices*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fa fa-database c-sidebar-nav-icon"></i>
                    Scouting Data
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ Route('admin.order.index') }}" class="c-sidebar-nav-link {{ request()->is("admin/order") || request()->is("admin/order/*") ? "c-active" : "" }}">
                                <i class="fa-fw fa fa-envelope-open-o alt c-sidebar-nav-icon"></i>
                                Orders
                            </a>
                        </li>
                    @endcan
                    @can('total_invoice_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route('admin.total_invoices.index') }}" class="c-sidebar-nav-link {{ request()->is("admin/total_invoices") || request()->is("admin/total_invoices/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"></i>
                                    Invoices
                                </a>
                            </li>
                    @endcan
               </ul>
         </li>
       @endcan
       @can('ads_access')
            <li class="c-sidebar-nav-item">
                <a href="{{route('admin.ads.index')}}" class="c-sidebar-nav-link {{ request()->is("admin/ads") || request()->is("admin/ads/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file c-sidebar-nav-icon">
                    </i>
                    Add Ads
                </a>
            </li>
        @endcan
       @can('information_access')
            <li class="c-sidebar-nav-item">
                <a href="{{route('admin.information.index')}}"
                class="c-sidebar-nav-link {{ request()->is("admin/information") || request()->is("admin/information/*") ? "c-active" : "" }}">
                    <i class="c-sidebar-nav-icon fas fa-info-circle "> </i>
                    Social media
                </a>
            </li>
       @endcan
      @can('pages_access')
           <li class="c-sidebar-nav-dropdown {{ request()->is("admin/whoweare*") ? "c-show" : "" }} {{ request()->is("admin/privacy*") ? "c-show" : "" }} {{ request()->is("admin/t_and_c*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                Pages
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('who_are_we_access')
                        <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.whoweare.whoweare") }}" class="c-sidebar-nav-link {{ request()->is("admin/whoweare") || request()->is("admin/whoweare/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon"></i>
                                who are we
                                </a>
                        </li>
                    @endcan
                    @can('privacy')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.privacy.privacy") }}" class="c-sidebar-nav-link {{ request()->is("admin/privacy") || request()->is("admin/privacy/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"></i>
                                Privacy policy
                            </a>
                        </li>
                    @endcan
                    @can('t_and_c')
                        <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.t_and_c.t_and_c") }}" class="c-sidebar-nav-link {{ request()->is("admin/t_and_c") || request()->is("admin/t_and_c/*") ? "c-active" : "" }} ">
                                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"></i>
                                Terms And Condition
                                </a>
                        </li>
                    @endcan
                </ul>
           </li>
      @endcan
      @can('admin_control_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/user*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                Admin Control
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('admin_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{route('admin.user.index') }}" class="c-sidebar-nav-link {{ request()->is("admin/user") || request()->is("admin/user/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            Admin
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
       @endcan
    <li class="c-sidebar-nav-item">
        <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

            </i>
            {{ trans('global.logout') }}
        </a>
    </li>
  </ul>
</div>

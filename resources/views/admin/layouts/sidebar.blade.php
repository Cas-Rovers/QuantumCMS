<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 min-vh-100 sidebar">
    <div class="logo-btn d-flex w-100 justify-content-center py-2">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <span class="logo text-primary">
                <!-- Logo SVG -->
                @include('admin.components.svgs.logo')
                <!-- End Logo SVG -->
            </span>
        </a>
    </div>
    <div class="nav-content d-flex flex-column gap-3">
        @can('view dashboard')
            <x-admin::SideBarButton route="admin.dashboard" icon="chart-line" label="admin.sidebar.anchors.dashboard"/>
        @endcan
        @can('view users')
            <x-admin::SideBarButton route="frontend.index" icon="users" label="admin.sidebar.anchors.users"/>
        @endcan
    </div>
    <!-- /.nav-content -->
</div>

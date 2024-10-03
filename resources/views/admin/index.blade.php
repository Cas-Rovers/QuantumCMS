@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <x-admin::Widgets.DataCard
                dataCardType="visitors"
                :title="__('admin.dashboard.widgets.visitors.title')"
                :cardData="$visitors->totalVisitors()"
                :cardSubData="__('admin.dashboard.widgets.visitors.text') . ' (' . (($percentageChange !== null) ? $percentageChange . '%' : 'N/A') . ')'"
                iconPath="admin.components.svgs.internet"
                color="text-white-50"
            />
        </div>
    </div>
@endsection

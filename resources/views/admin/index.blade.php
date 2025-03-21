@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <x-admin.widgets.datacard
                dataCardType="visitors"
                :title="__('admin.dashboard.widgets.visitors.title')"
                :cardData="$totalVisitors"
                :cardSubData="__('admin.dashboard.widgets.visitors.text') . ' (' . $percentageChange . '%' . ')'"
                iconPath="components.admin.svgs.internet"
                color="text-white-50"
            />
        </div>
    </div>
@endsection

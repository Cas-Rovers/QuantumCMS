@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

    <x-admin::Widgets.DataCard
        :title="__('admin.dashboard.widgets.visitors.title')"
        :value="$currentMonthVisitors ?? 0"
        :text="__('admin.dashboard.widgets.visitors.text')"
        :percentageChange="$percentageChange"
        iconClass="fas fa-globe"
        iconColor="text-white-50"
    />
@endsection

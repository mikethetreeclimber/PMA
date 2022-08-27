@extends('adminlte::page')

@section('title', 'PMA')

@section('content_header')
    <h1 class="m-0 text-dark">Circuit #{{ $circuitNumber }}</h1>
@stop

@section('content')
    <livewire:circuit-card-section :circuitNumber="$circuitNumber">
    {{-- @dd($circuitNumber) --}}
    <h2>Pending Worksites Table</h2>
    {{-- @livewire('circuit-table', ['circuitNumber' => $circuitNumber]) --}}
    <livewire:circuit-table :circuitNumber="$circuitNumber">

    @stop

@extends('rapyd::demo.demo')

@section('title','DataTree')

@section('body')

    <h1>DataTree</h1>
        {!! $tree !!}
    <p>

        {!! Documenter::showMethod("Iginikolaev\\Rapyd\\Demo\\DemoController", "anyDatatree") !!}
        {!! Documenter::showMethod("Iginikolaev\\Rapyd\\Demo\\DemoController", "anyMenuedit") !!}
        {!! Documenter::showCode("iginikolaev/rapyd/views/demo/tree.blade.php") !!}
    </p>
@stop

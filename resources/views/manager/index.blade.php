@extends('layouts.admin')

@section('header')
{{ucwords(Auth::user()->hasRole()).":  ".Auth::user()->name()}}
@stop

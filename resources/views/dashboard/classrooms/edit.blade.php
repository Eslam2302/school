@extends('adminlte::page')
@section('title', 'Classrooms')

@section('content_header')
    <h1></h1>
@stop

@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('site.Edit')}} {{__('site.Classroom')}}</h3>
        </div>


        <form action="{{ route('dashboard.classrooms.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="partials-error-div col-md-12">
                @include('partials._errors')
            </div>

            <div class="card-body row">

            </div>

        </form>
@stop

@extends('adminlte::page')
@section('title', 'Classrooms')

@section('content_header')
    <h1></h1>
@stop

@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('site.Create')}} {{__('site.Classroom')}}</h3>
        </div>


        <form action="{{ route('dashboard.classrooms.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="partials-error-div col-md-12">
                @include('partials._errors')
            </div>

            <div class="card-body row">

                <div class="form-group col-md-12">
                    <label>{{__('site.Level')}}</label>
                    <select name="level_id" class="custom-select">
                        <option selected>{{__('site.Please_Choose_One')}}</option>
                        @foreach ($levels as $level)

                            <option value="{{ $level->id }}">{{ $level->id }} - {{ $level->year_type }} - {{ $level->year_level }}</option>

                        @endforeach
                        
                    </select>
                </div>



                <div class="form-group col-md-12">
                    <label>{{__('site.Class_Number')}}</label>
                    <input type="number" min="1" name="class_number" class="form-control" placeholder="{{__('site.Class_Number')}}">
                </div>



            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('site.Add')}} {{__('site.Classroom')}} </button>
            </div>

    </div>
    </form>

    </div>

@stop

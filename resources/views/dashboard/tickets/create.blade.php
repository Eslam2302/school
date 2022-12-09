@extends('adminlte::page')
@section('title', 'Tickets')

@section('content_header')
    <h1></h1>
@stop

@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('site.Create')}} {{__('site.Ticket')}}</h3>
        </div>


        <form action="{{ route('dashboard.tickets.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="partials-error-div col-md-12">
                @include('partials._errors')
            </div>

            <div class="card-body row">


                <div class="col-md-6">

                    <div class="form-group">
                        <label>{{__('site.Priority')}}</label>
                        <select name="priority" class="custom-select">
                            <option selected>{{__('site.Please_Choose_One')}}</option>
                            <option value="{{__('site.Low')}}">{{__('site.Low')}}</option>
                            <option value="{{__('site.Normal')}}">{{__('site.Normal')}}</option>
                            <option value="{{__('site.High')}}">{{__('site.High')}}</option>
                            <option value="{{__('site.Urgent')}}">{{__('site.Urgent')}}</option>
                        </select>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label>{{__('site.Type')}}</label>
                        <select name="type" class="custom-select">
                            <option selected>{{__('site.Please_Choose_One')}}</option>
                            <option value="{{__('site.Request')}}">{{__('site.Request')}}</option>
                            <option value="{{__('site.Issue')}}">{{__('site.Issue')}}</option>
                        </select>
                    </div>

                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{__('site.Subject')}}</label>
                        <input type="text" name="subject" class="form-control" value="{{ old('subject') }}"
                            placeholder="{{__('site.Subject')}}">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{__('site.Details')}}</label>
                        <textarea name="details" class="form-control" rows="7"  placeholder="{{__('site.Details')}}">{{ old('details') }}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{__('site.image')}}</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <input type="hidden" name="user_id" value="{{auth()->id()}}">

            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('site.Add_Ticket')}} </button>
            </div>

    </div>
    </form>

    </div>

@stop

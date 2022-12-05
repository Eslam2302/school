@extends('adminlte::page')
@section('title', 'Users')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $user->first_name }}  {{__('site.Data')}}</h3>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <p>{{__('site.Name')}} : {{ $user->first_name }} {{ $user->second_name }} {{ $user->last_name }}</p>
                    <p>{{__('site.Email')}} : {{ $user->email }}</p>
                    <p>{{__('site.Address')}} : {{ $user->address }}</p>
                    <p>{{__('site.Birth_Date')}} : {{ $user->date_of_birth }}</p>
                    @if ($user->parent_name !== null)
                        <p>{{__('site.Parent_Name')}} : {{ $user->parent_name }}</p>
                    @endif
                    

                </div>
                <div class="col-md-6">
                    <p>{{__('site.Role')}} : {{ $user->roles->first()->display_name }}</p>
                    <p>{{__('site.Phone')}} : {{ $user->phone }}</p>
                    <p>{{__('site.Gender')}} : {{ $user->gender }}</p>
                    <p>{{__('site.JoinedAt')}} : {{ $user->date_of_join }}</p>
                    @if ($user->parent_number !== null)
                        <p>{{__('site.Parent_Number')}} : {{ $user->parent_number }}</p>
                    @endif
                </div>

                <div class="col-md-4">
                    <p>Action by : {{ $user->activities->first()->causer_id }}</p>
                </div>
                <div class="col-md-4">
                    <p>Action : {{ $user->activities->first()->description }}</p>
                </div>
                <div class="col-md-4">
                    <p>Action : {{ $user->activities->first()->properties }}</p>
                </div>
                    <a href="{{ route('dashboard.users.edit',  $user->id) }}" class="btn btn-primary"><i class="far fa-edit"></i> {{__('site.Edit')}}</a>
            </div>


            

            

        </div>
    </div>

@stop

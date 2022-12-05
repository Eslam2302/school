@extends('adminlte::page')
@section('title', 'Users')

@section('content_header')
    <h1></h1>
@stop

@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('site.Edit')}} {{__('site.Data')}} <span class='text-bold'>{{$user->first_name}}</span></h3>
        </div>

        <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="partials-error-div col-md-12">
                @include('partials._errors')
            </div>

            <div class="card-body row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('site.First_Name')}}</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}"
                            placeholder="{{__('site.First_Name')}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('site.Second_Name')}}</label>
                        <input type="text" name="second_name" class="form-control" value="{{ $user->second_name }}"
                            placeholder="{{__('site.Second_Name')}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('site.Last_Name')}}</label>
                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}"
                            placeholder="{{__('site.Last_Name')}}">
                    </div>
                </div>

                <div class="col-md-12">

                    <div class="form-group">
                        <label>{{__('site.Email')}}</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                            placeholder="{{__('site.Email')}}">
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Address')}}</label>
                        <input type="text" name="address" class="form-control" value="{{ $user->address }}"
                            placeholder="{{__('site.Address')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Phone')}}</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}"
                            placeholder="{{__('site.Phone')}}">
                    </div>
                </div>

                {{-- edit parents to students only --}}                
                @if ($user->hasRole('student'))
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('site.Parent_Name')}}</label>
                            <input type="text" name="parent_name" class="form-control" value="{{ $user->parent_name }}"
                                placeholder="{{__('site.Parent_Name')}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('site.Parent_Number')}}</label>
                            <input type="text" name="parent_number" class="form-control" value="{{ $user->parent_number }}"
                                placeholder="{{__('site.Parent_Number')}}">
                        </div>
                    </div>
                @endif
                {{-- end edit parents to students only --}}  
                
                <div class="col-md-3">

                    <div class="form-group">
                        <label>{{__('site.Gender')}}</label>
                        <select class="custom-select rounded-0" name="gender">
                            <option value="{{__('site.Male')}}">{{__('site.Male')}}</option>
                            <option value="{{__('site.Female')}}">{{__('site.Female')}}</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-9"></div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Birth_Date')}}</label>
                        <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.JoinedAt')}}</label>
                        <input type="date" name="date_of_join" value="{{ $user->date_of_join }}" class="form-control">
                    </div>
                </div>


                {{-- show permissions except student --}}

                @if ($user->hasRole(['admin','teacher']))
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>{{__('site.Permissions')}}</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['Users'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">

                                    @foreach ($models as $index => $model)
                                        <li class="{{ $index == 0 ? 'active' : '' }} permission_label"><a
                                                href="#{{ $model }} " data-toggle="tab"> {{__('site.'. $model )}} </a>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                            <div class="tab-content">

                                @foreach ($models as $index => $model)
                                    <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                        @foreach ($maps as $map)
                                            <label class="permission_value"><input type="checkbox" name="permissions[]"
                                                    value="{{ $model . '_' . $map }}">
                                                    {{__('site.'. $map )}}</label>
                                        @endforeach


                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>
                @endif

                {{-- end show permissions except student --}}



            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> {{__('site.Edit')}}</button>
            </div>

    </div>
    </form>

    </div>

@stop

@extends('adminlte::page')
@section('title', 'Users')

@section('content_header')
    <h1></h1>
@stop

@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{__('site.Create')}} {{__('site.Student')}}</h3>
        </div>


        <form action="{{ route('dashboard.users.store_student') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('POST') }}
            
            <div class="partials-error-div col-md-12"> 
                @include('partials._errors')
            </div>       

            <div class="card-body row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('site.First_Name')}}</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="{{__('site.First_Name')}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('site.Second_Name')}}</label>
                        <input type="text" name="second_name" class="form-control" value="{{ old('second_name') }}" placeholder="{{__('site.Second_Name')}}">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{__('site.Last_Name')}}</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="{{__('site.Last_Name')}}">
                    </div>
                </div>




                <div class="col-md-12">

                    <div class="form-group">
                        <label>{{__('site.Email')}}</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{__('site.Email')}}">
                    </div>

                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Password')}}</label>
                        <input type="password" name="password" class="form-control" placeholder="{{__('site.Password')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Password_Confirmation')}}</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="{{__('site.Password_Confirmation')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Address')}}</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="{{__('site.Address')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Phone')}}</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="{{__('site.Phone')}}r">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Parent_Name')}}</label>
                        <input type="text" name="parent_name" class="form-control" value="{{ old('parent_name') }}" placeholder="{{__('site.Parent_Name')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Parent_Number')}}</label>
                        <input type="text" name="parent_number" class="form-control" value="{{ old('parent_number') }}" placeholder="{{__('site.Parent_Number')}}">
                    </div>
                </div>


                <div class="col-md-3">

                    <div class="form-group">
                        <label>{{__('site.Gender')}}</label>
                        <select class="custom-select rounded-0" name="gender">
                            <option value="{{__('site.Male')}}">{{__('site.Male')}}</option>
                            <option value="{{__('site.Female')}}">{{__('site.Female')}}</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{__('site.Classroom')}}</label>
                        <select name="class_id" class="custom-select">
                        <option selected>{{__('site.Please_Choose_One')}}</option>
                        @foreach ($classrooms as $classroom)

                            <option value="{{ $classroom->id }}">{{ $classroom->level->year_type }} ({{ $classroom->level->year_level }}) Class:{{ $classroom->class_number }} </option>

                        @endforeach
                    </select>
                    </div>
                </div>


                <div class="form-group col-md-12">
                    <label for="">@lang('site.image')</label>
                    <input type="file" name="image" class="form-control image"  id="image">
                </div>

                <div class="form-group col-md-12">
                    <img src="{{ asset('uploads/user_images/default.png') }}" style="width: 80px" class="img_thumbnail image-preview" alt="">
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.Birth_Date')}}</label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__('site.JoinedAt')}}</label>
                        <input type="date" name="date_of_join" value="{{ old('date_of_join') }}" class="form-control">
                    </div>
                </div>

            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('site.User')}}</button>
            </div>

    </div>
    </form>

    </div>

@stop

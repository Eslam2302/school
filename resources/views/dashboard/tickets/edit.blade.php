@extends('adminlte::page')
@section('title', 'Tickets')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $ticket->user->first_name }} : {{__('site.Ticket')}}</h3>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <p>{{__('site.Name')}} : {{ $ticket->user->first_name }} {{ $ticket->user->second_name }}
                        {{ $ticket->user->last_name }}</p>
                    <p>{{__('site.Phone')}} : {{ $ticket->user->phone }}</p>
                    <p>{{__('site.Birth_Date')}} : {{ $ticket->user->date_of_birth }}</p>
                    @if ($ticket->user->parent_name !== null)
                        <p>{{__('site.Parent_Name')}} : {{ $ticket->user->parent_name }}</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <p>{{__('site.Role')}} : {{ $ticket->user->roles->first()->display_name }}</p>
                    <p>{{__('site.Address')}} : {{ $ticket->user->address }}</p>
                    <p>{{__('site.JoinedAt')}} : {{ $ticket->user->date_of_join }}</p>
                    @if ($ticket->user->parent_number !== null)
                        <p>{{__('site.Parent_Number')}} : {{ $ticket->user->parent_number }}</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <p>{{__('site.Email')}} : {{ $ticket->user->email }}</p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4">
                    <p>{{__('site.Ticket_ID')}}: {{ $ticket->id }}</p>
                    <p>{{__('site.Status')}} : {{ $ticket->status }}</p>

                </div>
                <div class="col-md-4">
                    <p>{{__('site.Priority')}} : {{ $ticket->priority }}</p>
                    <p>{{__('site.Subject')}} : {{ $ticket->subject }}</p>
                </div>
                <div class="col-md-4">
                    <p>{{__('site.Type')}} : {{ $ticket->type }}</p>
                </div>

                {{-- error if not has log --}}
                <div class="col-md-6">
                    <p>{{__('site.Action_by')}} : {{ $ticket->user->activities->last()->causer_id }}</p>
                </div>
                <div class="col-md-6">
                    <p>{{__('site.Action_Type')}} : {{ $ticket->user->activities->last()->description }}</p>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="5" readonly>{{ $ticket->details }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <img src="{{ $ticket->image_path }}" class="img_ticket_edit">
                    </div>
                </div>
            </div>

            @if ($ticket->status == 'new' || $ticket->status == 'in_progress' || $ticket->status == 'pending')
                <form action="{{ route('dashboard.tickets.update', $ticket->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="col-md-4">
                            <select name="status" class="custom-select">
                                <option value="{{__('site.Pending')}}">{{__('site.Pending')}}</option>
                                <option value="{{__('site.Solved')}}">{{__('site.Solved')}}</option>
                                <option value="{{__('site.Rejected')}}">{{__('site.Rejected')}}</option>
                            </select>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> {{__('site.Edit')}}</button>
                        </div>
                    </div>

                </form>
            @endif

        </div>
    </div>

@stop

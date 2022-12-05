@extends('adminlte::page')
@section('title', 'Tickets')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                {{-- header --}}
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">{{__('site.All_Tickets')}} {{$tickets->count()}}</h3>
                </div>
                {{-- header --}}

                <div class="card-body">

                    <div class="row search_user_index">
                        <div class="col-md-8 offset-md-2">
                            <form action="{{ route('dashboard.tickets.index') }}" method="get">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control form-control-lg"
                                        placeholder="{{__('site.Search')}}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- search --}}

                    <table id="example2" class="table table-bordered table-hover paginate_margin text-center">

                        <thead>
                            <tr>

                                <th>{{__('site.Ticket_ID')}}</th>
                                <th>{{__('site.User_ID')}}</th>
                                <th>{{__('site.Name')}}</th>
                                <th>{{__('site.Type')}}</th>
                                <th>{{__('site.Subject')}}</th>
                                <th>{{__('site.Status')}}</th>
                                <th>{{__('site.Show')}}</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->user_id }}</td>
                                    <td>{{ $ticket->user->first_name }} {{ $ticket->user->second_name }}</td>
                                    <td>{{ $ticket->type }}</td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td>{{ $ticket->status }}</td>
                                    <td>

                                        @if (auth()->user())
                                            <a href="{{ route('dashboard.tickets.edit',  $ticket->id) }}" class="btn btn-warning show-btn"><i class="fas fa-eye"></i></a>
                                        @else
                                            <a href="#" class="btn btn-warning disabled show-btn"><i class="fas fa-eye"></i></a>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $tickets->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div> {{-- end of admin row --}}



@stop

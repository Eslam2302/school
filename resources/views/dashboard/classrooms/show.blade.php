@extends('adminlte::page')
@section('title', 'Classrooms')

@section('content_header')
    <h1></h1>
@stop

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">

                {{-- header --}}
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        {{ $classroom->level->year_type }} ({{ $classroom->level->year_level }}) Class: {{ $classroom->class_number }}
                    </h3>
                    <div class="card-tools ">
                        <span class="font-weight-bold">Capacity: {{ $users->count() }}</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                {{-- header --}}

                <div class="card-body">
                   {{--  @if ($classroom->count() > 0) --}}

                        <div class="row search_user_index">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('dashboard.users.index') }}" method="get">
                                    <div class="input-group">
                                        <input type="search" name="search_admin" class="form-control form-control-lg"
                                            placeholder="{{ __('site.Search') }}">
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

                        <table id="example2" class="table table-bordered table-hover paginate_margin  text-center">

                            <thead>
                                <tr>

                                    <th>{{ __('site.ID') }}</th>
                                    <th>{{ __('site.Name') }}</th>
                                    <th>{{ __('site.Email') }}</th>
                                    <th>{{ __('site.Phone') }}</th>
                                    <th>{{ __('site.image') }}</th>
                                    <th>{{ __('site.Action') }}</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->first_name . ' ' . $user->second_name . ' ' . $user->last_name }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><img src="{{ $user->image_path }}" style="width:70px;" class="img_thumbnail" alt=""></td>
                                    <td>

                                        @if (auth()->user()->hasPermission('users_update'))
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                                class="btn btn-info"><i class="far fa-edit"></i></a>                                   
                                        @else
                                            <a href="#" class="btn btn-info disabled"><i class="far fa-edit"></i></a>
                                        @endif
                                        <a href="{{ route('dashboard.users.show',  $user->id) }}" class="btn btn-warning show-btn"><i class="fas fa-eye"></i></a>
                                        @if (auth()->user()->hasPermission('users_delete'))
                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                method="post" style="display: inline-block">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit"
                                                    class="btn btn-danger user-btn-delete"><i class="far fa-trash-alt"></i></button>
                                            </form> <!-- End of form -->
                                        @else
                                            <button type="submit"
                                                class="btn btn-danger user-btn-delete disabled"><i class="far fa-trash-alt"></i></button>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{-- {{ $admins->appends(request()->query())->links() }} --}}
                    {{-- @else --}}
                        {{-- <div class="no_data_table">{{ __('site.No_Classrooms_To_Show') }}</div> --}}

                    {{-- @endif --}}
                    {{-- search --}}

                </div>
            </div>
        </div>
    </div> {{-- end of admin row --}}



@stop

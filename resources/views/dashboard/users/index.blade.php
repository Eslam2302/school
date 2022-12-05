@extends('adminlte::page')
@section('title', 'Users')

@section('content_header')
    <h4>{{__('site.Users')}} {{$users->count()}}</h4>
@stop

@section('content')

    {{-- Start btn card of create --}}
    <div class="row"> {{-- btn add users  --}}
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">

                    @if (auth()->user()->hasRole('super_admin'))
                        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary add_admin">{{__('site.Add')}} {{__('site.Admin')}}</a>
                    @endif
                    @if (auth()->user()->hasRole(['super_admin', 'admin']))
                        <a href="{{ route('dashboard.users.create_teacher') }}" class="btn btn-primary add_teacher">{{__('site.Add')}}
                            {{__('site.Teacher')}}</a>
                    @endif
                    @if (auth()->user()->hasRole(['super_admin', 'admin', 'teacher']))
                        <a href="{{ route('dashboard.users.create_student') }}" class="btn btn-primary add_student">{{__('site.Add')}}
                            {{__('site.Student')}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div> {{-- btn add users  --}}
    {{-- End btn card of create --}}

    {{-- Start Admins table --}}
    @if (auth()->user()->hasRole('super_admin'))
        <div class="row">
            <div class="col-12">
                <div class="card">

                    {{-- header --}}
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">{{__('site.Admins')}} {{$admins->count()}}</h3>
                        <div class="card-tools ">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- header --}}

                    <div class="card-body">
                        @if ($admins->count() > 0)

                            <div class="row search_user_index">
                                <div class="col-md-8 offset-md-2">
                                    <form action="{{ route('dashboard.users.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" name="search_admin" class="form-control form-control-lg"
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

                            <table id="example2" class="table table-bordered table-hover paginate_margin  text-center">

                                <thead>
                                    <tr>

                                        <th>{{__('site.ID')}}</th>
                                        <th>{{__('site.Name')}}</th>
                                        <th>{{__('site.Email')}}</th>
                                        <th>{{__('site.Address')}}</th>
                                        <th>{{__('site.Phone')}}</th>
                                        <th>{{__('site.image')}}</th>
                                        <th>{{__('site.Action')}}</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->first_name . ' ' . $admin->second_name . ' ' . $admin->last_name }}
                                            </td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->address }}</td>
                                            <td>{{ $admin->phone }}</td>
                                            <td><img src="{{ $admin->image_path }}" style="width:70px;" class="img_thumbnail" alt=""></td>
                                            <td>

                                                @if (auth()->user()->hasPermission('users_update'))
                                                    <a href="{{ route('dashboard.users.edit', $admin->id) }}"
                                                        class="btn btn-info"><i class="far fa-edit"></i></a>                                   
                                                @else
                                                    <a href="#" class="btn btn-info disabled"><i class="far fa-edit"></i></a>
                                                @endif
                                                <a href="{{ route('dashboard.users.show',  $admin->id) }}" class="btn btn-warning show-btn"><i class="fas fa-eye"></i></a>
                                                @if (auth()->user()->hasPermission('users_delete'))
                                                    <form action="{{ route('dashboard.users.destroy', $admin->id) }}"
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
                            {{ $admins->appends(request()->query())->links() }}
                        @else
                            <div class="no_data_table">{{__('site.No_Admins_To_Show')}}</div>

                        @endif
                        {{-- search --}}

                    </div>
                </div>
            </div>
        </div> {{-- end of admin row --}}
    @endif
    {{-- End Admins table --}}

    {{-- Start Teachers table --}}
    @if (auth()->user()->hasRole(['super_admin', 'admin']))
        <div class="row">
            <div class="col-12">
                <div class="card">

                    {{-- header --}}
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">{{__('site.Teachers')}} {{$teachers->count()}}</h3>
                        <div class="card-tools ">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- header --}}

                    <div class="card-body">

                        @if ($teachers->count() > 0)
                            {{-- search --}}
                            <div class="row search_user_index">
                                <div class="col-md-8 offset-md-2">
                                    <form action="{{ route('dashboard.users.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" name="search_teacher" class="form-control form-control-lg"
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

                                        <th>ID</th>
                                        <th>{{__('site.Name')}}</th>
                                        <th>{{__('site.Email')}}</th>
                                        <th>{{__('site.Address')}}</th>
                                        <th>{{__('site.Phone')}}</th>
                                        <th>{{__('site.image')}}</th>
                                        <th>{{__('site.Action')}}</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->id }}</td>
                                            <td>{{ $teacher->first_name . ' ' . $teacher->second_name . ' ' . $teacher->last_name }}
                                            </td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->address }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td><img src="{{ $teacher->image_path }}" style="width:70px;" class="img_thumbnail" alt=""></td>
                                            <td>

                                                @if (auth()->user()->hasPermission('users_update'))
                                                    <a href="{{ route('dashboard.users.edit', $teacher->id) }}"
                                                        class="btn btn-info"><i class="far fa-edit"></i></a>
                                                @else
                                                    <a href="#" class="btn btn-info disabled"><i class="far fa-edit"></i></a>
                                                @endif
                                                <a href="{{ route('dashboard.users.show',  $teacher->id) }}" class="btn btn-warning show-btn"><i class="fas fa-eye"></i></a>
                                                @if (auth()->user()->hasPermission('users_delete'))
                                                    <form action="{{ route('dashboard.users.destroy', $teacher->id) }}"
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
                            {{ $teachers->appends(request()->query())->links() }}
                        @else
                            <div class="no_data_table">{{__('site.No_Teachers_To_Show')}}</div>

                        @endif

                    </div>
                </div>
            </div>
        </div> {{-- end of admin row --}}
    @endif
    {{-- End Teachers table --}}

    {{-- Start students table --}}
    @if (auth()->user()->hasRole(['super_admin', 'admin', 'teacher']))
        <div class="row">
            <div class="col-12">
                <div class="card">

                    {{-- header --}}
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">{{__('site.Students')}} {{$students->count()}}</h3>
                        <div class="card-tools ">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- header --}}

                    <div class="card-body">

                        @if ($students->count() > 0)

                            {{-- search --}}
                            <div class="row search_user_index">
                                <div class="col-md-8 offset-md-2">
                                    <form action="{{ route('dashboard.users.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" name="search_student"
                                                class="form-control form-control-lg" placeholder="{{__('site.Search')}}">
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

                                        <th>ID</th>
                                        <th>{{__('site.Name')}}</th>
                                        <th>{{__('site.Email')}}</th>
                                        <th>{{__('site.Address')}}</th>
                                        <th>{{__('site.Phone')}}</th>
                                        <th>{{__('site.image')}}</th>
                                        <th>{{__('site.Action')}}</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->first_name . ' ' . $student->second_name . ' ' . $student->last_name }}
                                            </td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td><img src="{{ $student->image_path }}" style="width:70px;" class="img_thumbnail" alt=""></td>
                                            <td>

                                                @if (auth()->user()->hasPermission('students_update'))
                                                    <a href="{{ route('dashboard.users.edit', $student->id) }}"
                                                        class="btn btn-info"><i class="far fa-edit"></i></a>
                                                @else
                                                    <a href="#" class="btn btn-info disabled"><i class="far fa-edit"></i></a>
                                                @endif
                                                <a href="{{ route('dashboard.users.show',  $student->id) }}" class="btn btn-warning show-btn"><i class="fas fa-eye"></i></a>
                                                @if (auth()->user()->hasPermission('users_delete'))
                                                    <form action="{{ route('dashboard.users.destroy', $student->id) }}"
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
                            {{ $students->appends(request()->query())->links() }}
                        @else
                            <div class="no_data_table">{{__('site.No_Students_To_Show')}}</div>

                        @endif


                    </div>
                </div>
            </div>
        </div> {{-- end of admin row --}}
    @endif
    {{-- End students table --}}





@stop

<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Users List
                            @can('user-create')
                                <a href="{{ route('users.create') }}">
                                    <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right">
                                        {{ __('Create') }}
                                    </x-primary-button>
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th>Structure</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $user)
                                                <tr>
                                                    <td><a class="btn btn-info btn-sm"
                                                            href="{{ route('users.show', $user->id) }}"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                                        @can('user-edit')
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('users.edit', $user->id) }}"><i
                                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        @endcan

                                                        @can('user-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                            <x-danger-button
                                                                class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </x-danger-button>
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
                                                    </td>
                                                    <td>{{ $user->structure->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <x-table.table :headers="['Action', 'No', 'Name', 'Email', 'Roles']">
                                        @foreach ($data as $key => $user)
                                            <tr class="border-b">
                                                <x-table.td>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('users.show', $user->id) }}"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a>
                                                    @can('user-edit')
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('users.edit', $user->id) }}"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    @endcan

                                                    @can('user-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </x-table.td>
                                                <x-table.td>{{ ++$i }}</x-table.td>
                                                <x-table.td>{{ $user->name }}</x-table.td>
                                                <x-table.td>{{ $user->email }}</x-table.td>
                                                <x-table.td>
                                                    {{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
                                                </x-table.td>
                                            </tr>
                                        @endforeach
                                    </x-table.table> --}}
                                </div>
                            </div>
                            {!! $data->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

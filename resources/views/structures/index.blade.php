<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Structures List
                            @can('structure-create')
                                <a href="{{ route('structures.create') }}">
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
                            <div class="table-responsive">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>No</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($structures as $structure)
                                                <tr>
                                                    <td><a class="btn btn-info btn-sm"
                                                            href="{{ route('structures.show', $structure->id) }}"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                                        @can('structure-edit')
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('structures.edit', $structure->id) }}"><i
                                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        @endcan

                                                        @can('structure-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['structures.destroy', $structure->id], 'style' => 'display:inline']) !!}
                                                            <x-danger-button
                                                                class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </x-danger-button>
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                    <td>{{$structure->id }}</td>
                                                    <td>{{ $structure->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- {!! $structures->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

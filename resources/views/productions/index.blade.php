<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 1000px">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Production List
                            @can('production-create')
                                <a href="{{ route('productions.create') }}">
                                    <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Equipe</th>
                                                <th>Quart</th>
                                                <th>Structure</th>
                                                <th>Line</th>
                                                <th>Product</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productions as $production)
                                                <tr>
                                                    <td>
                                                        <form
                                                            action="{{ route('productions.destroy', $production->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('productions.show', $production->id) }}"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a>

                                                            @can('production-edit')
                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ route('productions.edit', $production->id) }}"><i
                                                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            @endcan

                                                            {{-- @can('product-print') --}}


                                                            {{-- <a class="btn btn-primary btn-sm" href="{{ route('printings.create', $production->id) }}">
                                                    <i class="fas fa-print" aria-hidden="true"></i>
                                                </a> --}}

                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('printings.create', $production->id) }}">
                                                                <i class="fas fa-print" aria-hidden="true"></i>
                                                            </a>







                                                            {{-- @endcan --}}



                                                            @csrf
                                                            @method('DELETE')
                                                            @can('production-delete')
                                                                <x-danger-button
                                                                    class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </x-danger-button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                    <td>{{ $production->production_id }}</td>
                                                    <td>{{ $production->dateprod }}</td>
                                                    <td>{{ $production->equipe }}</td>
                                                    <td>{{ $production->quart }}</td>
                                                    <td>{{ $production->structure_id }}</td>
                                                    <td>{{ $production->line_id }}</td>
                                                    <td>{{ $production->product->code }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $productions->links() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Customer List
                            @can('customer-create')
                                <a href="{{ route('customers.create') }}">
                                    <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Create') }}
                                    </x-primary-button>
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="py-2">
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
                                                    {{-- <th>No</th> --}}
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Wilaya</th>
                                                    <th>Activity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $customer)
                                                    <tr>
                                                        <td>
                                                            <form action="{{ route('customers.destroy', $customer->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('customers.show', $customer->id) }}"><i
                                                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                                                @can('customer-edit')
                                                                    <a class="btn btn-primary btn-sm"
                                                                        href="{{ route('customers.edit', $customer->id) }}"><i
                                                                            class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                @endcan


                                                                @csrf
                                                                @method('DELETE')
                                                                @can('customer-delete')
                                                                    <x-danger-button
                                                                        class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </x-danger-button>
                                                                @endcan
                                                            </form>
                                                        </td>
                                                        {{-- <td>{{ $customer->id }}</td> --}}
                                                        <td>{{ $customer->code }}</td>
                                                        <td>{{ $customer->name }}</td>
                                                        <td>{{ $customer->wilaya }}</td>
                                                        <td>{{ $customer->activite }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- {!! $products->links() !!} --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</x-app-layout>

<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Product List
                            @can('product-create')
                                <a href="{{ route('products.create') }}">
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
                                                    <th>No</th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>DLUO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>
                                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('products.show', $product->id) }}"><i
                                                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                                                @can('product-edit')
                                                                    <a class="btn btn-primary btn-sm"
                                                                        href="{{ route('products.edit', $product->id) }}"><i
                                                                            class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                @endcan


                                                                @csrf
                                                                @method('DELETE')
                                                                @can('product-delete')
                                                                    <x-danger-button
                                                                        class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </x-danger-button>
                                                                @endcan
                                                            </form>
                                                        </td>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $product->code }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>{{ $product->DLUO }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {!! $products->links() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</x-app-layout>

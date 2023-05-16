<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Show Line
                            <a href="{{ route('lines.index') }}">
                                <x-primary-button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" id="name" name="name" class="form-control"
                                            style="width: 300px" value="{{ $line->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        <input type="text" id="description" name="description" class="form-control"
                                            style="width: 300px" value="{{ $line->description }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Structure:</strong>
                                        <input type="text" id="structure_id" name="structure_id" class="form-control"
                                            style="width: 300px" value="{{ $line->structure->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <div class="card-header" style="font-weight: bold">line products List

                                        <a href="{{ route('lines.create', $line) }}">
                                            <x-primary-button
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end">
                                                {{ __('Create') }}
                                            </x-primary-button>
                                        </a>

                                    </div>
                                    <div class="card-body">
                                        <div class="py-2">
                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>No</th>
                                                            <th>Product</th>
                                                            <th>Cadence</th>
                                                            <th>Unité de production</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($lineProducts as $product)
                                                            <tr>
                                                                <td>
                                                                    <form
                                                                        action="{{ route('products.destroy', $product->pivot->id) }}"
                                                                        method="POST">
                                                                        <a class="btn btn-info btn-sm"
                                                                            href="{{ route('products.show', $product->pivot->id) }}"><i
                                                                                class="fa fa-eye"
                                                                                aria-hidden="true"></i></a>

                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="{{ route('products.edit', $product->pivot->id) }}"><i
                                                                                class="fa fa-pencil"
                                                                                aria-hidden="true"></i></a>



                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <x-danger-button
                                                                            class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                            <i class="fa fa-trash"
                                                                                aria-hidden="true"></i>
                                                                        </x-danger-button>

                                                                    </form>
                                                                </td>
                                                                <td>{{ $product->pivot->id }}</td>
                                                                <td>{{ $product->code }}</td>
                                                                <td>{{ $product->pivot->cadence }}</td>
                                                                <td>{{ $product->pivot->uniteprod }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>

<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Show Order
                            <a href="{{ route('orders.index') }}">
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
                                        <strong>Purchase order number:</strong>
                                        <input type="number" id="numBC" name="numBC" class="form-control"
                                            style="width: 300px" value="{{ $order->numBC }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Destination depot:</strong>
                                        <input type="text" id="depotdest" name="depotdest" class="form-control"
                                            style="width: 300px" value="{{ $order->depotdest }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date of the order:</strong>
                                        <input type="date" id="dateorder" name="dateorder" class="form-control"
                                            style="width: 300px" value="{{ $order->dateorder }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Customer:</strong>
                                        <input type="text" id="customer_id" name="customer_id" class="form-control"
                                            style="width: 300px" value="{{ $order->customer->code }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <div class="card-header" style="font-weight: bold">Order details List

                                        <a href="{{ route('orders.create', $order) }}">
                                            <x-primary-button
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end">
                                                {{ __('Create') }}
                                            </x-primary-button>
                                        </a>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>No</th>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orderProducts as $product)
                                                            <tr>
                                                                <td> <form action="{{ route('products.destroy', $product->pivot->id) }}"
                                                                    method="POST">
                                                                    <a class="btn btn-info btn-sm"
                                                                        href="{{ route('products.show', $product->pivot->id) }}"><i
                                                                            class="fa fa-eye" aria-hidden="true"></i></a>

                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="{{ route('products.edit', $product->pivot->id) }}"><i
                                                                                class="fa fa-pencil" aria-hidden="true"></i></a>



                                                                    @csrf
                                                                    @method('DELETE')

                                                                        <x-danger-button
                                                                            class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        </x-danger-button>

                                                                </form></td>
                                                                <td>{{ $product->pivot->id  }}</td>
                                                                <td>{{ $product->code }}</td>
                                                                <td>{{ $product->pivot->quantity }}</td>
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

<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Orders List
                            @can('order-create')
                                <a href="{{ route('orders.create') }}">
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
                            <div class="table-responsive">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>ID</th>
                                                <th>Purchase order number</th>
                                                <th>Destination depot</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>
                                                        <form action="{{ route('orders.destroy', $order->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('orders.show', $order->id) }}"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                                            @can('order-edit')
                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ route('orders.edit', $order->id) }}"><i
                                                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            @endcan


                                                            @csrf
                                                            @method('DELETE')
                                                            @can('order-delete')
                                                                <x-danger-button
                                                                    class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </x-danger-button>
                                                                {{-- <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button> --}}
                                                            @endcan
                                                        </form>
                                                    </td>

                                                    <td>{{ $order->order_id }}</td>
                                                    <td>{{ $order->numBC }}</td>
                                                    <td>{{ $order->depotdest }}</td>
                                                    <td>{{ $order->dateorder }}</td>
                                                    <td>{{ $order->customer->code }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>

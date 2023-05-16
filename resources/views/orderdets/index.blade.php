<div class="card">
    <div class="card-header" style="font-weight: bold">Order details List

            <a href="{{ route('orders.orderdets.create', $order) }}">
                <x-primary-button
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end">
                    {{ __('Create') }}
                </x-primary-button>
            </a>

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
                            <th>Product</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

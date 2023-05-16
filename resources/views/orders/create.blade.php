<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-header" style="font-weight: bold">Add Order
                                <a href="{{ route('orders.index') }}">
                                    <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Back') }}
                                    </x-primary-button>
                                </a>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> Something went wrong.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('orders.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Purchase order number:</strong>
                                                <input type="number" name="numBC" class="form-control" placeholder="Purchase order number">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Destination depot:</strong>
                                                <input type="text" name="depotdest" class="form-control" placeholder="Destination depot">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Date:</strong>
                                                <input type="date" name="dateorder" class="form-control" placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Select Customer:</strong>
                                                <select name="customer_id" class="form-control">
                                                    @foreach ($customers as $item)
                                                        <option value="{{ $item->id }}">{{ $item->code}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    <div>
                                        @livewire('products')

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

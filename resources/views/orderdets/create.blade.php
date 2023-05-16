<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Add Order Details
                            <a href="{{ route('orderdets.index') }}">
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
                            <div class="card-body">
                                <table class="table" id="products_table">
                                    <thead>
                                        <tr>
                                            <th>Product:</th>
                                            <th>Quantity:</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderProducts as $index => $orderProduct)
                                            <tr>
                                                <td>
                                                    <select name="orderProducts[{{ $index }}][product_id]"
                                                        wire:model="orderProducts.{{ $index }}.product_id" class="form-control"
                                                        style="width: 200px">
                                                        <option value="">-- choose product --</option>
                                                        @foreach ($allProducts as $product)
                                                            <option value="{{ $product->id }}">
                                                                {{ $product->code }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="orderProducts[{{ $index }}][quantity]"
                                                        class="form-control" wire:model="orderProducts.{{ $index }}.quantity" />
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger"
                                                        wire:click.prevent="removeProduct({{ $index }})"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addProduct">+ Add Another
                                            Product</button>
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

<div>
    {{-- <form action="{{ route('orders.store') }}" method="POST">
        @csrf --}}
        {{-- <div class="form-group {{ $errors->has('numBC') ? 'has-error' : '' }}">
            <strong>Purchase order number:</strong>
            <input type="number" name="numBC" class="form-control" value="{{ old('numBC') }}" required>
            @if ($errors->has('numBC'))
                <em class="invalid-feedback">
                    {{ $errors->first('numBC') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('depotdest') ? 'has-error' : '' }}">
            <strong>Destination depot:</strong>
            <input type="text" name="depotdest" class="form-control" value="{{ old('depotdest') }}">
            @if ($errors->has('depotdest'))
                <em class="invalid-feedback">
                    {{ $errors->first('depotdest') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('dateorder') ? 'has-error' : '' }}">
            <strong>Date:</strong>
            <input type="date" name="dateorder" class="form-control" value="{{ old('dateorder') }}">
            @if ($errors->has('dateorder'))
                <em class="invalid-feedback">
                    {{ $errors->first('dateorder') }}
                </em>
            @endif
        </div> --}}
        <div class="card">
            <div class="card-header">
                Products
            </div>

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
                        <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:click.prevent="addProduct">
                                        {{ __('+ Add Another Product') }}
                                    </x-primary-button>
                        {{-- <button class="btn btn-sm btn-secondary" wire:click.prevent="addProduct">+ Add Another
                            Product</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div>

            <input class="btn btn-primary" type="submit" value="Save Order">
        </div>

    {{-- </form> --}}
</div>

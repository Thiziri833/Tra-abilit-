<div>
    {{-- <form action="{{ route('lines.store') }}" method="POST">
        @csrf --}}
    {{-- <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <strong>Description:</strong>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            @if ($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('dateorder') ? 'has-error' : '' }}">
            <strong>Select Structure:</strong>
            <select name="structure_id" class="form-control" value="{{ old('structure_id') }}">
                @foreach ($structures as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
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
                        <th>Cadence:</th>
                        <th>Unité de production</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lineProducts as $index => $lineProduct)
                        <tr>
                            <td>
                                <select name="lineProducts[{{ $index }}][product_id]"
                                    wire:model="lineProducts.{{ $index }}.product_id" class="form-control"
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
                                <input type="number" name="lineProducts[{{ $index }}][cadence]"
                                    class="form-control" wire:model="lineProducts.{{ $index }}.cadence" />
                            </td>
                            <td>
                                <input type="text" name="lineProducts[{{ $index }}][uniteprod]"
                                    class="form-control" wire:model="lineProducts.{{ $index }}.uniteprod" />
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
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        wire:click.prevent="addProduct">
                        {{ __('+ Add Another Product') }}
                    </x-primary-button>
                   
                </div>
            </div>
        </div>
    </div>
    <br />
    <div>

        <input class="btn btn-primary" type="submit" value="Save Line">
    </div>

    {{-- </form> --}}
</div>

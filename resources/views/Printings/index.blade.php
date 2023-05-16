<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 1000px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Printings List</div>
                        <div class="card-body">
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    @can('product-create')
                                    <a href="{{ route('printings.create') }}">
                                        <x-primary-button
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Create New Printing') }}
                                        </x-primary-button>
                                    </a>
                                @endcan
                             </div>
                             <p>La date actuelle est : {{ $currentDate }}</p>

                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <x-table.table :headers="['Action', 'No', 'Date', 'Qte', 'LOT']">
                                        @foreach ($printings as $printing)
                                            <tr class="border-b">
                                                <x-table.td>
                                                    <form action="{{ route('printings.destroy', $printing->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('printings.show', $printing->id) }}"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                                        @can('product-edit')
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('printings.edit', $printing->id) }}"><i
                                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        @endcan


                                                        @csrf
                                                        @method('DELETE')
                                                        @can('product-delete')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                                        @endcan
                                                    </form>
                                                </x-table.td>
                                                <x-table.td>{{ ++$i }}</x-table.td>
                                                {{-- <x-table.td>{{ $printing->dateimp }}</x-table.td> --}}
                                                <x-table.td>{{ $printing->date_inst }}</x-table.td>

                                                <x-table.td>{{ $printing->quantite }}</x-table.td>
                                                <x-table.td>{{ $printing->LOT }}</x-table.td>
                                            </tr>
                                        @endforeach
                                    </x-table.table>
                                </div>
                            </div>

                            {!! $printings->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>

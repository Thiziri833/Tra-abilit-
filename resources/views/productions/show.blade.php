<x-app-layout>
    <div class="content-wrapper">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Show Product') }}
        </h2> --}}
        <div class="container" style="width: 800px">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Show Production
                            <a href="{{ route('productions.index') }}">
                                <x-primary-button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date:</strong>
                                        <input type="text" id="dateprod" name="dateprod" class="form-control"
                                            style="width: 300px" value="{{ $production->dateprod }}" disabled>
                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Equipe:</strong>
                                        <input type="text" id="equipe" name="equipe" class="form-control"
                                            style="width: 300px" value="{{ $production->equipe }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>quart:</strong>
                                        <input type="text" id="quart" name="quart" class="form-control"
                                            style="width: 300px" value="{{ $production->quart }}" disabled>
                                        
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <div class="card-header" style="font-weight: bold">printing List

                                        <a href="{{ route('printings.create', $production) }}">
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
                                                            <th>Quantity</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($printings as $printing)
                                                            <tr>
                                                                <td> <form action="{{ route('printings.destroy', $printing->id) }}"
                                                                    method="POST">
                                                                    <a class="btn btn-info btn-sm"
                                                                        href="{{ route('printings.show', $printing->id) }}"><i
                                                                            class="fa fa-eye" aria-hidden="true"></i></a>

                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="{{ route('printings.edit', $printing->id) }}"><i
                                                                                class="fa fa-pencil" aria-hidden="true"></i></a>



                                                                    @csrf
                                                                    @method('DELETE')

                                                                        <x-danger-button
                                                                            class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        </x-danger-button>

                                                                </form></td>
                                                                <td>{{ $printing->id  }}</td>
                                                                <td>{{ $printing->quantite }}</td>
                                                                <td>{{ $printing->date_inst }}</td>
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
        </div>
    </div>
</x-app-layout>

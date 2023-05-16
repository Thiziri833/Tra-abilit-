<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 800px">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Add Printing
                            <a href="{{ route('productions.index') }}">
                                <x-primary-button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('printings.store') }}">
                                @csrf
                                <input type="hidden" name="production_id" value="{{ $production->id }}">
                                <div class="form-group">
                                    <label for="quantite">Quantité:</label>
                                    <input type="number" class="form-control" id="quantite" name="quantite">
                                </div>
                                <div class="form-group">
                                    <label for="date_inst">Date d'installation:</label>
                                    {{-- <input type="date" class="form-control" id="date_inst" name="date_inst"> --}}
                                    <input type="text" class="form-control" name="date_inst"
                                        value="{{ old('date', $currentDate) }}">


                                </div>
                                <x-primary-button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Submit') }}
                                </x-primary-button>

                            </form>








                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

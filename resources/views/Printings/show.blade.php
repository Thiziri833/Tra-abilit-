<x-app-layout>
    <div class="content-wrapper">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Show Product') }}
        </h2> --}}
        <div class="container" style="width: 800px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">{{ __('Show Printing') }}</div>
                        <div class="card-body">
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <a href="{{ route('printings.index') }}">
                                        <x-primary-button
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Back') }}
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date:</strong>
                                        {{ $printing->dateimp }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>quantite:</strong>
                                        {{ $printing->quantite }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>LOT:</strong>
                                        {{ $printing->LOT }}
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

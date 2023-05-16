<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 800px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">{{ __('Edit Printing') }}</div>
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
                            <form action="{{ route('printings.update', $printing->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Select Equipe</strong>
                                            <select name="production_id" class="form-control">
                                                @foreach ($productions as $item)
                                                <option value="{{$item->id}}">{{$item->equipe}}</option>

                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Date:</strong>
                                            <input type="date" name="dateimp" value="{{ $printing->dateimp }}"
                                                class="form-control" placeholder="DateProduction">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>quantite:</strong>
                                            <input type="text" name="quantite" value="{{ $printing->quantite }}"
                                                class="form-control" placeholder="quantite">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>LOT:</strong>
                                            <input type="text" name="LOT" value="{{ $printing->LOT }}"
                                                class="form-control" placeholder="LOT">
                                        </div>
                                    </div>


                                    <div class="py-2">
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                                            <x-primary-button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                {{ __('Submit') }}
                                            </x-primary-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 800px">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Add Production
                            <a href="{{ route('productions.index') }}">
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

                            <form action="{{ route('productions.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Date:</strong>
                                            <input type="date" name="dateprod" class="form-control"
                                                placeholder="DateProduction">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Equipe:</strong>
                                            <select name="equipe" class="form-control">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">

                                            <strong>Quart:</strong>
                                            <select name="quart" class="form-control">
                                                <option value="matin">matin</option>
                                                <option value="soir">soir</option>
                                                <option value="nuit">nuit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Select Code product:</strong>
                                            <select name="product_id" class="form-control">
                                                @foreach ($products as $item)
                                                <option value="{{ $item->id }}">{{ $item->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    @livewire('structure-line', ['selectedLine' => 1])




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
                            </>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
         $(document).ready(function () {
    $('#structure_id').change(function () {
        var $line = $('#line_id');
        $.ajax({
            url: "{{ route('lines.index') }}",
            data: {
                structure_id: $(this).val()
            },
            success: function (data) {
                $line.html('<option value="">Select Line</option>');
                $.each(data, function (id, value) {
                    $line.append('<option value="' + id + '">' + value + '</option>');
                });
            }
        });

        $('#line_id').val("");
        $selectedStructure = $(this).val();
    });

    $('#line_id').change(function () {
        $selectedLine = $(this).val();
    });
});

    </script>
@endsection

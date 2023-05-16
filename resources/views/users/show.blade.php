<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Show User
                            <a href="{{ route('users.index') }}">
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
                                        <strong>Name:</strong>
                                        <input type="text" id="name" name="name" class="form-control"
                                            style="width: 300px" value="{{ $user->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" id="email" name="email" class="form-control"
                                            style="width: 300px" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                            <input type="text" class="form-control" style="width: 300px" value="{{ $v }}" disabled>
                                                {{-- <label class="">{{ $v }}</label> --}}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Structure:</strong>
                                        <input type="text" id="structure_id" name="structure_id" class="form-control"
                                            style="width: 300px" value="{{ $user->structure->name }}" disabled>
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

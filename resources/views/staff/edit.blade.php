@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h3">{{ __('Edit staff details') }}</span>
                    <a class="btn btn-info float-right" href="{{ route('staff.index') }}">{{ __('back') }}</a>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="post" action="{{ route('staff.update', $staff->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" name="first_name" value={{ old('first_name',$staff->first_name) }} >
                            </div>
                            @error('first_name')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name" value={{ old('last_name',$staff->last_name) }} >
                            </div>
                            @error('last_name')

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email',$staff->email) }}" >
                            </div>
                            @error('email')

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="city">Address:</label>
                                <textarea class="form-control" name="address"> {{ old('address', $staff->address) }} </textarea>
                            </div>
                            @error('address')

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

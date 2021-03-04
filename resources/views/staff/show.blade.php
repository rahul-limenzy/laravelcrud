@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="h3">{{ __('Staff Details') }}</span>
                        <a class="btn btn-info float-right" href="{{ route('staff.index') }}">{{ __('back') }}</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>{{ __( 'First Name   :   ')}}{{$staff['first_name']}}</p>
                        <p>{{ __( 'Last Name    :   ')}}{{$staff['last_name']}}</p>
                        <p>{{ __( 'Email        :   ') }}{{$staff['email']}} </p>
                        <p>{{ __( 'Address      :   ') }}{{$staff['address']}}</p>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

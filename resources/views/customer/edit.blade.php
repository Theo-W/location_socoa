@extends('layouts.app')

@section('content')
    <h1>{{ __('components/customers.title.edit') }}</h1>
    <form method="post" action="{{ route('customer_edit_store', ['id' => $customer->id]) }}">
        @csrf
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="first_name" class="form-label">{{ __('components/customers.input.first_name') }}</label>
                <div class="col-md-12">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ $customer->first_name }}">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">{{ __('components/customers.input.last_name') }}</label>
                <div class="col-md-12">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $customer->last_name }}">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="email" class="form-label">{{ __('components/customers.input.email') }}</label>
                <div class="col-md-12">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $customer->email }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">{{ __('components/customers.input.phone') }}</label>
                <div class="col-md-12">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="phone" name="phone" value="{{ $customer->phone }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="adress" class="form-label">{{ __('components/customers.input.adress') }}</label>
                <input type="text" class="form-control" name="adress" id="adress" value="{{ $customer->adress }}">
            </div>
            <div class="col-md-6">
                <label for="postal_code" class="form-label">{{ __('components/customers.input.postal_code') }}</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $customer->postal_code }}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="city" class="form-label">{{ __('components/customers.input.city') }}</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $customer->city }}">
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">{{ __('components/customers.button.create') }}</button>
        </div>
    </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ __('components/customers.title.create') }}</h1>

        <form method="post" action="{{ route('customer_create_store') }}">
            @csrf
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">{{ __('components/customers.input.first_name') }}</label>
                    <input type="text" class="form-control" name="first_name" id="first_name">
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">{{ __('components/customers.input.last_name') }}</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="email" class="form-label">{{ __('components/customers.input.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">{{ __('components/customers.input.phone') }}</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="adress" class="form-label">{{ __('components/customers.input.adress') }}</label>
                    <input type="text" class="form-control" name="adress" id="adress">
                </div>
                <div class="col-md-6">
                    <label for="postal_code" class="form-label">{{ __('components/customers.input.postal_code') }}</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="city" class="form-label">{{ __('components/customers.input.city') }}</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">{{ __('components/customers.button.create') }}</button>
            </div>
        </form>
    </div>


@endsection

@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ __('components/reservation.title.create') }}</h1>

        <form method="POST" action="{{ route('reservation_store_create')}}">
            @csrf
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="title" class="form-label">{{ __('components/reservation.input.title') }}</label>
                    <input type="text" class="form-control" name="title" id="title"
                           placeholder="{{ __('components/reservation.input.placeolder.title') }}">
                </div>
                <div class="col-md-6">
                    <label for="start" class="form-label">{{ __('components/reservation.input.start') }}</label>
                    <input type="date" class="form-control" id="start" name="start">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="end" class="form-label">{{ __('components/reservation.input.end') }}</label>
                    <input type="date" class="form-control" name="end" id="end">
                </div>
                <div class="col-md-6">
                    <label for="customer_id" class="form-label">{{ __('components/reservation.input.customer') }}</label>
                    <select type="date" class="form-select" id="customer_id" name="customer_id">
                        <option selected>{{ __('components/reservation.input.placeolder.choice_customer') }}</option>
                        @foreach($customers as $customer)
                            <option
                                value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="form-check col-md-6 mt-2">
                    <input type="checkbox" id="pay" name="pay" {{ old('pay') ? 'checked' : '' }}/>
                    <label for="pay">
                        {{ __('components/reservation.input.paye') }}
                    </label>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit"
                        class="btn btn-primary">{{ __('components/reservation.button.create_reservation') }}</button>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ __('components/reservation.title.create') }}</h1>

        <form method="POST" action="{{ route('reservation_store_create')}}">
            @csrf
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="title" class="form-label">{{ __('components/reservation.input.title') }}</label>
                    <div class="cold-md-12">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                               id="title"
                               placeholder="{{ __('components/reservation.input.placeolder.title') }}"
                               value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <label for="start" class="form-label">{{ __('components/reservation.input.start') }}</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control  @error('start') is-invalid @enderror" id="start"
                               name="start" value="{{ old('start') }}">
                        @error('start')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label for="end" class="form-label">{{ __('components/reservation.input.end') }}</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control @error('end') is-invalid @enderror" name="end" id="end"
                               value="{{ old('end') }}">
                        @error('end')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="customer_id"
                           class="form-label">{{ __('components/reservation.input.customer') }}</label>
                    <div class="col-md-12">
                        <select type="date" class="form-select  @error('customer_id') is-invalid @enderror"
                                id="customer_id" name="customer_id">
                            <option
                                selected disabled>{{ __('components/reservation.input.placeolder.choice_customer') }}</option>
                            @foreach($customers as $customer)
                                <option
                                    value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
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

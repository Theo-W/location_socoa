<div>
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ __('components/reservation.title.my_reservation') }}</h1>
        <a href="{{ route('reservation_create') }}"
           class="btn btn-primary">
            <img src="{{ asset('img/icon/plus_light.svg') }}" class="mx-1" width="18px" alt="">
            {{ __('components/reservation.button.create_reservation') }}
        </a>
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <div></div>
        <div class="input-group w-25">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><img src="{{ asset('img/icon/search.svg') }}"
                                                                        width="18" alt=""></span>
                <input class="form-control py-2 border-right-0 border"
                       placeholder="{{ __('components/customers.research') }}"
                       type="search"
                       value="search"
                       id="example-search-input"
                       wire:model.debounce.100ms="search">
            </div>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
        <th class="col">{{ __('components/reservation.table.title') }}</th>
        <th class="col">{{ __('components/reservation.table.start') }}</th>
        <th class="col">{{ __('components/reservation.table.end') }}</th>
        <th class="col">{{ __('components/reservation.table.paye') }}</th>
        <th class="col">{{ __('components/customers.table.actions') }}</th>
        </thead>

        <tbody>
        @if($reservations->count() > 0)
            @foreach($reservations as $reservation)
                <tr>
                    <td> {{ $reservation->title }}</td>
                    <td>{{ $reservation->start->format('d-m-Y')}}</td>
                    <td>{{ $reservation->end->format('d-m-Y') }}</td>
                    <td>
                        @if($reservation->pay != true)
                            <img src="{{ asset('img/icon/cross_red.svg') }}" width="36" height="36" alt="">
                        @else
                            <img src="{{ asset('img/icon/check.svg') }}" width="36" height="36" alt="">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('reservation_edit', ['slug' => $reservation->slug , 'id' => $reservation->id]) }}"
                           class="btn btn-icon">
                            <img src="{{ asset('img/icon/edit.svg') }}" width="16" height="24" alt="">
                        </a>
                        <form method="post" action="{{ route('reservation_delete', ['id'=> $reservation->id ]) }}"
                              style="display: inline-block" onsubmit="return confirm('Etes vous vraiment sur ?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-icon">
                                <img src="{{ asset('img/icon/delete.svg') }}" width="24" alt="">
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <th colspan="6">
                <p class="text-center mt-3">{{ __('components/reservation.dont_reservation') }}</p>
            </th>
        @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $reservations->links() }}
    </div>
</div>

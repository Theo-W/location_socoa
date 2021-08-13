<div>
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ __('components/customers.title.my_customents') }}</h1>
        <a href="{{ route('customer_create') }}"
           class="btn btn-primary">
            <img src="{{ asset('img/icon/plus_light.svg') }}"  class="mx-1" width="18px" alt="">
            {{ __('components/customers.button.create_customer') }}
        </a>
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <div></div>
        <div class="input-group w-25">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><img src="{{ asset('img/icon/search.svg') }}" width="18" alt=""></span>
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
        <th class="col">{{ __('components/customers.table.last_name') }}</th>
        <th class="col">{{ __('components/customers.table.first_name') }}</th>
        <th class="col">{{ __('components/customers.table.email') }}</th>
        <th class="col">{{ __('components/customers.table.phone') }}</th>
        <th class="col">{{ __('components/customers.table.actions') }}</th>
        </thead>

        <tbody>
        @if($customers->count() > 0)
            @foreach($customers as $customer )
                <tr>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <div>
                            @include('customer.modal._show', ['id' => $customer->id])
                            <a href="{{ route('customer_edit', ['slug' => $customer->slug , 'id' => $customer->id]) }}"
                               class="btn btn-light">
                                <img src="{{ asset('img/icon/edit.svg') }}" width="16" height="24" alt="">
                            </a>
                            <form method="post" action="{{ route('customer_delete', [ 'id'=> $customer->id ]) }}"
                                  style="display: inline-block" onsubmit="return confirm('Etes vous vraiment sur ?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-light">
                                    <img src="{{ asset('img/icon/delete.svg') }}" width="24" alt="">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <th colspan="6">
                <p class="text-center mt-3">{{ __('components/customers.dont_customer') }}</p>
            </th>
        @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $customers->links() }}
    </div>
</div>

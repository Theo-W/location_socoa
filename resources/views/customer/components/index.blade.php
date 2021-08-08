<div>
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ __('components/customers.title.my_customents') }}</h1>
        <a href="{{ route('customer_create') }}" class="btn btn-primary">{{ __('components/customers.button.create_customer') }}</a>
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <div></div>
        <div class="input-group w-25">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search text-secondary"></i></span>
                <input class="form-control py-2 border-right-0 border" placeholder="{{ __('components/customers.research') }}"
                       type="search"
                       value="search"
                       id="example-search-input"
                       wire:model.debounce.100ms="search">
            </div>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <th>{{ __('components/customers.table.last_name') }}</th>
            <th>{{ __('components/customers.table.first_name') }}</th>
            <th>{{ __('components/customers.table.email') }}</th>
            <th>{{ __('components/customers.table.phone') }}</th>
            <th>{{ __('components/customers.table.actions') }}</th>
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
                        <div class="d-flex">
                            <a href="{{ route('customer_edit', ['id' => $customer->id]) }}" class="btn btn-primary mr-2">
                                {{ __('components/customers.button.edit') }}
                            </a>
                            <form method="post" action="{{ route('customer_delete', [ 'id'=> $customer->id ]) }}"
                                  style="display: inline-block" onsubmit="return confirm('Etes vous vraiment sur ?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-icon">
                                    {{ __('components/customers.button.delete') }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <th colspan="6">
                <p class="text-center mt-3">{{ __('customer.dont_customer') }}</p>
            </th>
        @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $customers->links() }}
    </div>
</div>

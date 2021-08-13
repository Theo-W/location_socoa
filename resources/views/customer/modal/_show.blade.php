<!-- Button trigger modal -->
<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#showCustomer{{$customer->ic}}">
    <img src="{{ asset('img/icon/eye.svg') }}" width="24" alt="">
</button>

<!-- Modal -->
<div class="modal fade" id="showCustomer{{$customer->ic}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$customer->first_name}} {{ $customer->last_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <h5>{{ __('components/customers.modal.title.contact') }}</h5>
                    <p>{{ __('components/customers.modal.phone') }} {{ $customer->phone }} <br>
                        {{ __('components/customers.modal.email') }} {{$customer->email}}</p>
                </div>
                <div>
                    <h5>{{ __('components/customers.modal.title.information') }}</h5>
                    <p>{{ __('components/customers.modal.adress') }} {{ $customer->adress }} <br>
                        {{ __('components/customers.modal.postal_code') }} {{$customer->postal_code}} <br>
                        {{ __('components/customers.modal.city') }} {{$customer->city}}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

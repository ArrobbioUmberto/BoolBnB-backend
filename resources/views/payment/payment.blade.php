@extends('layouts.app')


@section('content')
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container" class="mb-3"></div>
                <div class="row justify-content-between" id='redirect'>
                    <div class="col-lg-6 col-md-12" id="button-pay">
                        <button id="submit-button" data-route="{{ route('sponsorship.store', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}" class="btn-bool border-0">Effettua il pagamento</button>
                    </div>
                    <div class="col-lg-6 col-md-12 text-lg-end">
                        <a href="{{route('apartments.show', $apartment)}}" class="btn btn-bool">Torna al tuo appartamento</a>
                    </div>
                </div>    
            
            </div>
        </div>
    </div>
    <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: '{{ Braintree\ClientToken::generate() }}',
            container: '#dropin-container'
        }, function(createErr, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    $.get('{{ route('payment.make') }}', {
                        payload
                    }, function(response) {
                        if (response.success) {
                            console.log('ok')
                            let route = button.getAttribute('data-route');
                            window.location.href = route;
                        } else {
                            console.log('fail');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection

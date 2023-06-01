@extends('layouts.app')


@section('content')
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container"></div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <button id="submit-button" class="btn-bool">Effettua il pagamento</button>
                    </div>
               
                    <form class="col-lg-6 col-md-12 text-end" action="{{ route('sponsorship.store', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn-bool">Torna al tuo appartamento</button>
                    </form>
                 
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
                            alert('Payment successfull!');
                        } else {
                            alert('Payment failed');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection

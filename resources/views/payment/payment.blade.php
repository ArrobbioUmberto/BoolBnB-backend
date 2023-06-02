@extends('layouts.app')


@section('content')
    <div class="container p-5" id="page">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container" class="mb-3"></div>
                <div class="row" id='redirect'>
                    <div class="col-lg-6 col-md-12" id="button-pay">
                        <button id="submit-button" class="btn-bool">Effettua il pagamento</button>

                    </div>

                    {{-- <form id="pay" class="col-lg-6 col-md-12 text-end" action="{{ route('sponsorship.store', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}"
                        method="POST">
                        @csrf
                        <button id="submit-button" class="btn-bool">Effettua il pagamento</button>
                    </form> --}}
                    
                 
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
                           $('body').prepend(`<div class="d-flex align-items-center justify-content-between gap-2 alert alert-success alert-dismissible fade show" role="alert">
                            <div><i class="fa-solid fa-check"></i>
                            <span>Pagamento effettuato con successo!!</span>
                            </div>
                            <form id="pay" class="col-lg-6 col-md-12 text-end" action="{{ route('sponsorship.store', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}"
                            method="POST">
                            @csrf
                            <button id="submit-button" class="btn-bool">Torna al tuo appartamento</button>
                            </form>
                            </div>`  
                           )
                        } else {
                            console.log('fail');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection

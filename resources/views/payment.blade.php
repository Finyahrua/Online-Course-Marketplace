<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>payment</title>
</head>
<body>
    {{-- allert success or errors --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" id="payment-form" action="{{ url('/checkout') }}">
        {{ csrf_field() }}
    <section>
        <label for="amount">
            <span class="input-label">Amount</span>
            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
            </div>
        </label>

        <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
        </div>
    </section>

    <input id="nonce" name="payment_method_nonce" type="hidden" />
    <button class="button" type="submit"><span>Pay Now</span></button>
</form>

<script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        

        braintree.dropin.create({
          authorization: "{{ Braintree\ClientToken::generate() }}",
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>
</body>
</html>

{{-- <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Braintree-Demo</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <div id="dropin-container"></div>
    <button id="submit-button">Make Payment</button>
    </div>
    </div>
    </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <script>
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
            authorization: "{{ Braintree\ClientToken::generate() }}",
            container: '#dropin-container'
            }, function (createErr, instance) {
            button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
            $.get('{{ route('payment.make') }}', {payload}, function (response) {
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
</body>
</html> --}}
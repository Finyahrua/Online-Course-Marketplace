@extends('layouts.home')
@section('main')
    <div class="uk-container" style="margin-bottom:40px" >
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
            @if ($purchased_course)
                <div class="alert alert-success" style="margin-top: 40px">
                    <h3>Course purchased succesfully... <br>Happy learning</h3>
                   {{-- <a href="{{ route('courses.show', $course->slug) }}">Go to the course</a> --}}
                   <button class="uk-button uk-button-primary-preserve uk-button-large " style="margin-top: 10px" ><a href="{{ route('courses.show', $course->slug) }}"><span style="color: #ffff">Go to the course</span></a></button>
                </div>
            @else
                    <form method="post" id="payment-form" action="{{ route('payment.checkout') }}">
                        {{ csrf_field() }}
                    <section>
                        <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                            <div class="uk-width-expand">
                                <h4 class="uk-comment-title uk-margin-remove">
                                    Buy the course for:     
                                    <span style="color:#6BE181;margin-left:40px"> Tsh {{ $course->price}}/=</span> 
                                </h4>
                            </div>
                        </div>
                        <input type="hidden" name="amount" value="{{ $course->price}}" />
                        <input type="hidden" name="course_id" value="{{ $course->id }}" />
                        {{-- <input type="hidden" name="user_name" value="{{ $user->name }}" /> --}}
                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>

                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    {{-- wait for the loading to complete before showing the submit button --}}
                    
                    
                    <button id="mybutton" class="uk-button uk-button-primary-preserve uk-button-large " type="submit" ><span>Pay Now</span></button>
                </form>
            @endif
            
        <script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
            <script>
                var form = document.querySelector('#payment-form');
                

                braintree.dropin.create({
                authorization: "{{ Braintree\ClientToken::generate() }}",
                selector: '#bt-dropin',
                
                
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
    </div>
@endsection

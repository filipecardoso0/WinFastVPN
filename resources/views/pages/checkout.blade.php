@extends('layouts.app')

@section('content')

<section class="d-flex flex-column justify-items-center my-5">

    <p class="text-center display-2 text-light mt-5" style="font-weight: 900">ORDER SUMMARY<p/>

    <!-- Payment Section -->
    <section class="d-flex flex-column align-self-center mt-5">

        <!-- Payment Summary -->
        <section class="text-start text-black bg-light py-5 px-5">
            <h5 class="modal-title text-uppercase mb-3 fw-bold" id="exampleModalLabel">Email: <span class="text-danger" style="text-decoration: underline;">{{auth()->user()->email}}</span></h5>
            <p class="mb-0 text-primary text-uppercase" style="font-weight: bolder">Payment summary</p>
            <hr class="mb-2"
                style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

            <section id="productinfo" class="d-flex flex-column mt-4">
                <div class="d-flex justify-content-between">
                    <p class="fw-bold mb-0">Product: <span class="text-danger">Subscription {{$product->name}}</span></p>
                </div>

                @if($product->discount > 0)
                    <p class="small mb-0">Discount {{$product->discount}}</p>
                @endif

                <p id="finalprice" class="fw-bold">Final Price: <span id="finalpricetag" class="text-danger">{{$product->price - ($product->price*$product->discount)}}</span><span class="text-danger">&euro;</span></p>
            </section>

            <div class="form-outline form-white mb-4">
                <div class="d-flex flex-row">
                    <input id="voucher" type="text" name="voucher" required class="form-control form-control-md border border-primary" />
                    <button type="button" class="btn btn-primary" onclick="useDiscountCode()">Activate</button>
                </div>
                <label class="form-label" for="voucher">Discount Code</label>
            </div>

        </section>


        <!-- Payment Methods -->
        <section class="d-flex flex-column align-items-center mt-5">
            <p class="text-light text-uppercase fw-bolder" style="font-size: 30px; text-decoration: underline;">Payment methods: </p>
            <div id="paypal-button-container"></div>
        </section>

    </section>

    <script src="https://www.paypal.com/sdk/js?client-id=AW_HYk8-1v2N4v2tLmZvwYvlGWF5lFvPknsiT9MVDppO4wKgoDhlWA2DiXcqOWqkV_Ci1Lhz_AXbBXtT&currency=EUR&locale=en_GB"></script>
    <script>
        function encodeForAjax(data) {
            return Object.keys(data).map(function(k){
                return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
            }).join('&')
        }

        function useDiscountCode(){

            const vouchercode = document.getElementById('voucher')
            const parsedvouchercode = vouchercode.value.toUpperCase()

            //Perform AJAX Request to VoucherController in order to verify the given discount code
            const xml = new XMLHttpRequest();
            xml.open('GET', '/api/voucher/' + parsedvouchercode, true)
            xml.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xml.send()

            // Fired once the request completes successfully
            xml.onload = function(e) {
                // Check if the request was a success
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {

                    const ajaxresponse = JSON.parse(xml.responseText);

                    //Discount code exists
                    if(ajaxresponse != 0){

                        vouchercode.disabled = true

                        Swal.fire(
                            'Success!',
                            'Discount applied!',
                            'success'
                        )

                        const section = document.getElementById('productinfo')
                        const finalprice = document.getElementById('finalprice')
                        const finalpricetag = document.getElementById('finalpricetag')
                        if(section.contains(document.getElementById('voucherdiscount')) === false){
                            const p = document.createElement('p')
                            const span = document.createElement('span')
                            p.setAttribute('id', 'voucherdiscount')
                            p.innerHTML = 'Discount: '
                            span.innerHTML = '5%'
                            p.classList.add('text-dark', 'fw-bold')
                            span.classList.add('text-danger', 'fw-bold')
                            p.appendChild(span)
                            section.insertBefore(p, finalprice)
                            finalpricetag.innerHTML = {{$product->price -  ($product->price*0.05)}}
                        }

                        //Voucher
                        const input = document.createElement('input')
                        input.value = ajaxresponse
                        input.classList.add('d-none')
                        input.setAttribute('id', 'voucherid')
                        section.appendChild(input)
                    }
                    else{
                        Swal.fire(
                            'Error!',
                            'Invalid Discount code!',
                            'error'
                        )
                    }

                }
            }

        }

        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                function getFinalPrice() {
                    return (document.getElementById('voucherdiscount') ? {{$product->price}}*0.05 : {{$product->price}})
                }

                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: getFinalPrice()
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {

                    //Voucherid
                    const section = document.getElementById('productinfo')
                    const voucherid = document.getElementById('voucherid')
                    let vid = 0
                    if(section.contains(voucherid))
                        vid = voucherid.value


                    //AJAX Request in order to insert the data into the transaction table
                    const xml = new XMLHttpRequest();
                    xml.open('POST', '{{route('createtransaction')}}', true)
                    xml.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
                    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xml.send(encodeForAjax({productid: {{$product->id}}, voucherid: vid}))


                    //Notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Order completed!',
                        text: 'Thanks for buying! Head to the user dashboard and download the VPN files in order to hop into the Bot Lobbies!',
                        footer: '<a href="{{route('userdashboard')}}">Take me to the User Dashboard</a>'
                    })
                });
            }
        }).render('#paypal-button-container');
    </script><!-- Replace "test" with your own sandbox Business account app client ID -->

</section>

@endsection

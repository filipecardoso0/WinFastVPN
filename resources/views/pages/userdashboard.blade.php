@extends('layouts.app')

@section('content')

<section class="d-flex flex-column my-5">

    <!-- Page headers -->
    <section class="mt-5">
        <p class="text-light mx-4 display-3">Dashboard</p>
        <p class=" text-light mt-1 mx-4">Subscription Status:
            @if($subscriptionstatus === true)
                <span class="text-success">Active</span>
            @else
                <span class="text-danger">Inactive</span>
            @endif
        </p>
        @if($referralearnings > 0)
        <p class=" text-light mt-1 mx-4 fw-bold">Referral Earnings:
            <span class="text-primary">{{$referralearnings}}&euro;</span>
        </p>
        @endif

    </section>

    <!-- How to download accordion -->
    <div class="accordion accordion-flush mt-3 mx-4" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    How to install
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ol>
                        <li>Download the VPN Files (Each file connects you to a different location)</li>
                        <li>Install and launch <a class="text-danger" href="https://openvpn.net/downloads/openvpn-connect-v3-windows.msi">OpenVPN Connect</a></li>
                        <ol>
                            <li>Click "File", then load your VPN configuration / profiles OR Simply drag and drop it</li>
                        </ol>
                        <li>Connect to the desired location by starting the profile corresponding to that same location</li>
                        <li>Start Warzone 2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Locations -->
    <section class="mt-5">
        <p class="text-light mx-4 display-5">Locations</p>

        <!-- Different Locations -->
        <section class="mx-4 row justify-content-evenly mt-4">

            <!-- INDIA -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/indiaflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">India - Bengaluru</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'india')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- INDIA -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/indiaflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">India - Bengaluru</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'india')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- INDIA -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/indiaflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">India - Bengaluru</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'india')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- INDIA -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/indiaflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">India - Bengaluru</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'india')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

        </section>

    </section>

</section>

@endsection

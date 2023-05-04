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

    <!-- Important Notes Accordion -->
    <div class="accordion accordion-flush mt-3 mx-4" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed text-danger" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    ** MAY/2023 UPDATE **
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ol>
                        <li>Starting on <span class="text-danger">May 4th</span> VPN profiles will be reset on the start of each month due to maintenance reasons. Therefore, players will have to download them again.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

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

        <!-- Different Locations ROW1 -->
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

            <!-- CHILE -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/israelflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Israel - Tel Aviv</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'israel')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- MEXICO -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/mexicoflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mexico - Mexico City</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'mexico')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

        </section>

        <!-- Different Locations ROW2 -->
        <section class="mx-4 row justify-content-evenly mt-4">

            <!-- SOUTH AFRICA -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/southafricaflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">South Africa - Johannesburg</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'southafrica')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- BRAZIL -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/brazilflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Brazil - São Paulo</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'brazil')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- JAPAN -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/japanflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Japan - Tokyo</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'japan')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

        </section>

        <!-- Different Locations ROW3 -->
        <section class="mx-4 row justify-content-evenly mt-4">

            <!-- SOUTH AFRICA -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/hawaiflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hawai - Honolulu</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'hawai')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- BRAZIL -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/singaporeflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Singapore</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'singapore')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

            <!-- JAPAN -->
            <article class="card col-4" style="width: 18rem;">
                <img src="../images/flags/australiaflag.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Australia - Sydney</h5>
                    @if($subscriptionstatus === true)
                        <a href="{{route('download', 'australia')}}" class="btn btn-danger">Download <i class="fa-solid fa-download"></i></a>
                    @else
                        <p>Purchase a subscription in order to download</p>
                    @endif
                </div>
            </article>

        </section>

    </section>

</section>

@endsection

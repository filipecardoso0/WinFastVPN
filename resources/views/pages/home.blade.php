@extends('layouts.app')

@section('content')

<section class="d-flex flex-column overflow-auto">
    <!--Landing Image -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="text-light text-uppercase text-center display-1" style="font-weight: 900;">GETTING <span class="text-danger">BOT LOBBIES</span> HAS NEVER BEEN <span class="text-danger">EASIER</span></h1>
                    <h2 class="text-light text-uppercase text-xl-center mt-4 font-weight-bold">For <span class="text-danger">the cheapest prices out there</span> you can play Lag free using our solution</h2>
                    <a class="btn btn-danger text-uppercase mt-4 py-3 px-4" href="#maincontent">Get Started</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <section id="maincontent" class="bg-dark d-flex flex-column">

        <section style="margin-bottom: 64px">
            <h3 class="text-center text-light display-3 my-4" style="font-weight: 600; text-decoration: underline;">Prices:</h3>
            <!-- Item Cards Section -->
            <section class="d-flex flex-lg-row flex-sm-column justify-content-center align-items-center">
                @foreach($products as $product)
                    <!-- Item Card -->
                    <article class="card mb-sm-5 mx-md-5" style="width: 18rem;">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title text-uppercase text-center" style="font-weight: 700; text-decoration: underline">{{$product->name}}</h5>
                            <p class="card-text text-center text-danger" style="font-size:40px; font-weight: 900;">{{$product->price}}&euro;</p>
                            @if(auth()->user())
                                <a href="{{route('proceed2checkout', $product->id)}}" class="btn btn-primary btn-danger">Buy Now <i class="fa-solid fa-cart-shopping"></i></a>
                            @else
                                <a href="{{route('login')}}" class="btn btn-primary btn-danger">Buy Now <i class="fa-solid fa-cart-shopping"></i></a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </section>
        </section>



        <section style="background-color: rgba(0, 0, 0, 0.5); margin-bottom: 64px; padding-bottom: 32px;">
            <!-- How The VPN Works -->
            <article class="d-flex flex-column align-items-center justify-content-center" style="margin-top: 64px; padding-left: 50px; padding-right: 50px;">
                <h4 class="mb-4 display-4 text-light">How it works?</h4>
                <p class="text-light text-center"><span class="text-danger">Win Fast VPN</span> uses the <span class="text-danger">OSI Protocol layer 3</span> (Network Layer) in order to <span class="text-danger">change the packet routing</span> between the <span class="text-danger">Player and Warzone 2 Servers</span>. By only routing a small amount of packets it makes possible to <span class="text-danger">change the player's location for a very low impact on player's bandwidth, causing no effect on players ping. </span>During machmaking Warzone 2 tries to: </p>
                <ul style="color: white;">
                    <li>Match you against players of the same level</li>
                    <li>Minimize the waiting time</li>
                    <li>Minimize your ping according to the distance between you and the game server</li>
                </ul>
                <p class="text-light">Therefore, by using <span class="text-danger">Win Fast VPN</span> Warzone 2 servers will think that you are on a location, so far away that the <span class="text-danger">skill based matchmaking will struggle to find players of the same level resulting on bot lobbies.</span></p>
            </article>

            <!-- Win Fast VPN vs Standard VPN Providers -->
            <article class="mt-4 mb-4">
                <!-- Table With the Differences between Win Fast VPN and Standard VPN Providers -->
                <h5 class="text-center mb-4 display-5 text-light">Win Fast VPN vs Standard VPN Providers</h5>
                <p class="text-light text-center" style="padding-left: 50px; padding-right: 50px;">Standard VPN Providers like <span class="text-danger">CyberGhost</span>, <span class="text-danger">NordVPN</span> and <span class="text-danger">ExpressVPN</span> will result in <span class="text-danger">higher server ping</span>, once they <span class="text-danger">redirect all your network traffic</span> towards their servers.
                    <br>On the other hand, <span class="text-danger">Win Fast VPN redirects only a few packets towards our servers in order to simulate a different location</span> on warzone 2 servers, but <span class="text-danger">still maintaining high quality latency</span>.</p>
                <section class="p-4 d-flex justify-content-center w-100 mt-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-border border-light">
                            <thead class="border-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"><strong class="text-light" style="font-size: 20px">NO VPN</strong></th>
                                <th scope="col"><strong class="text-danger" style="font-size: 20px">WIN FAST VPN</strong></th>
                                <th scope="col"><strong class="text-light" style="font-size: 20px">STANDARD VPN CLIENT</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" class="text-light" style="font-weight: 500; font-size: 20px">Ping</th>
                                <td class="text-light" style="font-size: 20px">5-60ms</td>
                                <td class="text-danger" style="font-weight: 700; font-size: 20px">5-60ms</td>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px;"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-light" style="font-weight: 500; font-size: 20px;">Unlock Region Locked Content</th>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px"></i></td>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px"></i></td>
                                <td><i class="fas fa-check text-success" style="font-size: 20px"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-light" style="font-weight: 500; font-size: 20px">Bot Lobbies</th>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px"></i></td>
                                <td><i class="fas fa-check text-success" style="font-size: 20px"></i></td>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-light" style="font-weight: 500; font-size: 20px">Hide IP Address</th>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px"></i></td>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px"></i></td>
                                <td><i class="fas fa-check text-success" style="font-size: 20px"></i></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-light" style="font-weight: 500; font-size: 20px">Location Change on Warzone 2 Servers</th>
                                <td><i class="fas fa-times text-danger" style="font-size: 20px;"></i></td>
                                <td><i class="fas fa-check text-success" style="font-size: 20px;"></i></td>
                                <td><i class="fas fa-check text-success" style="font-size: 20px;"></i></td>
                            </tr>


                            </tbody>

                        </table>
                    </div>
                </section>
            </article>
        </section>

        <!-- Server Locations -->
        <section class="d-flex flex-column justify-content-center align-self-center" style="margin-bottom: 64px;">
            <p class="text-center text-light" style="font-weight: 700; font-size: 35px; margin-bottom: 40px">Available Server Locations: </p>
            <img class="img-fluid" src="images/serverlocationsfinal.png" alt="Server Locations Map">
        </section>

        <!-- FAQ -->
        <section id="faq" class="text-light" style="background-color: rgba(0, 0, 0, 0.5)">
            <!--Questions-->
            <section class="mx-4 mt-4">
                <h3 class="text-center mb-4 pb-2 fw-bold text-danger">FAQ</h3>
                <p class="text-center mb-5">
                    Find the answers for the most frequently asked questions below
                </p>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-danger"><i class="fa-solid fa-ban"></i>  Can I get banned for using it?</h6>
                        <p>
                            <strong class="text-danger">Using</strong> any sort of <strong class="text-danger">VPN is not against Activision's terms of use</strong> by any manner. Therefore, <strong class="text-danger">you won't be banned</strong>/shadow banned.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-danger"><i class="fa-solid fa-gauge"></i> Does it have any impact on game performance/FPS?</h6>
                        <p>
                            <strong class="text-danger">Absolutely not!</strong> OpenVPN Connect does not cause any impact on FPS, once its impact in terms of <strong class="text-danger">CPU usage is basically 0%</strong>.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-danger"><i class="fas fa-book-open text-danger pe-2"></i> How can I use it?
                        </h6>
                        <p>
                            It is very simple! You just have to download <a class="text-danger" href="https://openvpn.net/downloads/openvpn-connect-v3-windows.msi" style="text-decoration: underline;">OpenVPN Connect</a> and the VPN Configuration/Profile files which will be available right away after purchase under the
                            <a class=text-danger" href="{{route('userdashboard')}}" style="text-decoration: underline;">user dashboard section</a>. Then you just need to <strong class="text-danger">import the VPN Configuration/Profile files to OpenVPN Connect client</strong> and <strong class="text-danger">turn on the location you are willing to use</strong>.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-danger"><i class="fa-sharp fa-solid fa-globe"></i> My IP didn't change is it not working?
                        </h6>
                        <p>
                            <strong class="text-danger">Yes!</strong> Actually you won't notice any IP address changes. To assert if your location changed on COD Servers you can head to <strong class="text-danger">Settings > Account & Network > Network Info (Geographical Region)</strong>.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-danger"><i class="fa-solid fa-credit-card"></i> What are the supported payment methods?
                        </h6>
                        At the moment we support payments by <strong class="text-danger">PayPal</strong> and <strong class="text-danger">Credit Card</strong> only.
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-danger"><i class="fa-solid fa-desktop"></i> What are the supported platforms?</h6>
                        <p>
                            At the moment we only support <strong class="text-danger">PC Platform</strong>. <br>
                            We are not planning to expand to consoles at the moment.
                        </p>
                    </div>
                </div>
            </section>
        </section>
    </section>
</section>

@endsection

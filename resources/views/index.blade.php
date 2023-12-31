<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Appexy - Tailwind CSS Multipurpose Landing Page Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css"
        name="description" />
    <meta content="coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!--Swiper slider css-->
    <link href="{{ asset('libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css">

    <!--Material Icon -->
    <link href="{{ asset('libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Style css -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- ============= Header Start ============= -->
    <header id="navbar-sticky" class="header header-light">
        <div class="container">
            <nav class="relative w-full mx-auto lg:flex lg:items-center lg:justify-between" aria-label="Global">
                <div class="flex items-center justify-between">
                    <a class="navbar-brand flex-none" href="#home">
                        <img src="{{ asset('images/logo-dark.png') }}" class="h-6 logo-dark" alt="Logo">
                        <img src="{{ asset('images/logo-light.png') }}" class="h-6 logo-light" alt="Logo">
                    </a>

                    <div class="block lg:hidden">
                        <button
                            class="inline-flex ms-4 items-center justify-center h-9 w-12 rounded-md border border-gray-300 bg-slate-300/30"
                            type="button" data-fc-target="collapse-target" data-fc-type="collapse">
                            <i class="mdi mdi-menu text-2xl"></i>
                        </button>
                    </div>
                </div>
                <div id="collapse-target" class="hidden transition-all duration-300 basis-full grow lg:block">
                    <ul id="navbar-navlist"
                        class="navbar-nav flex flex-col gap-y-4 gap-x-0 lg:flex-row lg:items-center lg:justify-center lg:gap-y-0 lg:gap-x-7">
                        <!-- Your existing navigation links -->
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#screenshots">Screenshots</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonial">Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#contact">Contact us</a>
                        </li>
                </div>

                <!-- Authentication Links -->
                @guest

                    <div id="navbar-navlist" class="lg:flex gap-2 hidden grow navbar-nav">
                        <button type="button" class="nav-btn"
                            onclick="window.location='{{ route('login') }}'">Login</button>
                    </div>
                    {{-- <div class="lg:flex gap-2 hidden grow navbar-nav">
                        <a class="nav-btn" data-fc-target="signup-modal" data-fc-type="modal" data-dismiss="modal"
                            target="modal">Sign-Up</a>
                            <a class="nav-btn" href="{{ route('register') }}">Sign-Up</a>
                    </div> --}}
                @else
                    <div class="lg:flex gap-4 hidden grow navbar-nav">
                        <a href="{{ route('dashboard') }}" class="nav-btn py-1 px-4">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="lg:flex gap-4 hidden grow navbar-nav">
                        <a class="nav-link nav-btn py-2 px-3" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
                </ul>
            </nav>
        </div>
    </header>
    <!-- ============= Header End ============= -->


    <!-- home-agency start -->
    <section id="home" class="pt-36 relative bg-blue-600 overflow-hidden bg-cover w-full"
        style="background-image: url('{{ asset('images/heros/hero-1-bg.png') }}');">
        <div class="container relative z-10">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 items-center">
                <div class="lg:mb-0 mb-12">
                    <h1 class="text-5xl/snug font-extrabold text-white mb-10">Here is the best way to present your apps
                    </h1>
                    <p class="mb-10 text-lg/7 font-normal text-white/70">Maecenas tempus, tellus eget condimentum
                        rhoncus quam semper libero sit amet adipiscing sem neque sed ipsum nam quam nunc blandit vel
                        luctus pulvinar.</p>

                    <div class="lg:max-w-lg relative">
                        <i
                            class="mdi mdi-email-outline text-xl/none text-white/50 absolute -translate-y-1/2 top-1/2 start-4"></i>
                        <input type="text" id="hero-input" name="hero-input"
                            class="py-2 pe-44 ps-12 min-h-[62px] border-0 w-full rounded focus:ring-0 text-white bg-white/10 placeholder:text-white/50"
                            placeholder="Enter Email Address">
                        <button
                            class="py-2 px-6 text-white text-base/normal duration-300 rounded-md bg-green-500 hover:bg-green-500/80 absolute -translate-y-1/2 top-1/2 end-2">
                            <span class="sm:block hidden">Download Now</span>
                            <i class="mdi mdi-download text-2xl sm:hidden block px-4"></i>
                        </button>
                    </div><!-- Flex End -->
                </div>

                <div class="lg:ms-auto mx-auto">
                    <img src="{{ asset('images/heros/hero-1-img.png') }}" alt="">
                </div>
            </div><!-- Grid End -->
        </div><!-- Container End -->

        <div class="absolute inset-x-0 top-auto bottom-0">
            <img src="{{ asset('images/heros/hero-1-bottom-shape.png') }}" alt="">
        </div>

        <div class="relative mb-16">
            <div class="container">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-white shadow-lg">
                    <i class="mdi mdi-arrow-down text-3xl text-blue-600"></i>
                </div>
            </div><!-- Container End -->
        </div>
    </section>
    <!-- home-agency end -->

    <!-- How it work start -->
    <section class="py-24">
        <div class="container">
            <div class="text-center max-w-xl mx-auto">
                <h6 class="font-normal uppercase mb-2">How it <span class="font-semibold">Work</span></h6>
                <h2 class="text-3xl font-semibold mb-3">How dose it work ?</h2>
                <p class="text-base font-normal text-gray-500">Sed ut perspiciatis unde omnis iste natus error
                    voluptatem accusantium doloremque rem aperiam.</p>
            </div>

            <div class="mt-20">
                <div class="grid lg:grid-cols-3 grid-cols-1 gap-10">
                    <div>
                        <div class="relative">
                            <div class="text-center">
                                <span
                                    class="inline-flex relative z-0 bg-blue-500/10 dark:bg-blue-100/5 h-24 w-24 items-center justify-center"
                                    style="border-radius: 28% 72% 50% 50%/26% 20% 80% 74%;">
                                    <i class="mdi mdi-format-list-bulleted text-5xl"></i>
                                </span>
                                <h5 class="text-xl font-semibold mb-3 mt-5">1. Intuitive visual editor</h5>
                                <p class="text-base font-normal text-gray-500">Nemo enim ipsam quia voluptas sit
                                    aspernatur ist dolores.</p>

                                <div class="hidden lg:block">
                                    <img src="{{ asset('images/arrow-top.png') }}"
                                        class="absolute -right-16 top-2/4 w-28">
                                </div>
                            </div>
                        </div>
                    </div><!-- end grid col -->

                    <div>
                        <div class="relative">
                            <div class="text-center">
                                <span
                                    class="inline-flex relative z-0 bg-emerald-500/10 dark:bg-emerald-100/5 h-24 w-24 items-center justify-center"
                                    style="border-radius: 28% 72% 50% 50%/26% 20% 80% 74%;">
                                    <i class="mdi mdi-palette-outline text-5xl"></i>
                                </span>
                                <h5 class="text-xl font-semibold mb-3 mt-5">2. Huge design collection</h5>
                                <p class="text-gray-600 dark:text-gray-400">Nemo enim ipsam quia voluptas sit
                                    aspernatur
                                    ist dolores.</p>

                                <div class="hidden lg:block">
                                    <img src="{{ asset('images/arrow-bottom.png') }}"
                                        class="absolute -right-20 top-2/4 w-28">
                                </div>
                            </div>
                        </div>
                    </div><!-- end grid col -->

                    <div>
                        <div class="text-center">
                            <span
                                class="inline-flex relative z-0 bg-amber-500/10 dark:bg-amber-100/5 h-24 w-24 items-center justify-center"
                                style="border-radius: 28% 72% 50% 50%/26% 20% 80% 74%;">
                                <i class="mdi mdi-layers-triple text-5xl"></i>
                            </span>
                            <h5 class="text-xl font-semibold mb-3 mt-5">3. One click installation</h5>
                            <p class="text-gray-600 dark:text-gray-400">Nemo enim ipsam quia voluptas sit aspernatur
                                ist
                                dolores.</p>
                        </div>
                    </div><!-- end grid col -->
                </div><!-- Grid End -->
            </div>
        </div><!-- Container End -->
    </section>
    <!-- How it work End -->

    <!-- features start -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="container">
            <div class="text-center max-w-xl mx-auto">
                <h6 class="font-normal uppercase mb-2">Our <span class="font-semibold">Features</span></h6>
                <h2 class="text-3xl font-semibold mb-3">Smart Solutions For Buys People</h2>
                <p class="text-base font-normal text-gray-500">Sed ut perspiciatis unde omnis iste natus error
                    voluptatem accusantium doloremque rem aperiam.</p>
            </div>

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-16 items-center">
                <div>
                    <img src="{{ asset('images/features-1.png') }}" class="mx-auto" alt="">
                </div>

                <div class="lg:ms-24">
                    <h1 class="text-4xl font-semibold">Discover your destination</h1>
                    <p class="text-base font-normal text-gray-500 mt-8">On the other hand, we denounce with righteous
                        indignation so blinded that they cannot.</p>

                    <div class="flex items-center gap-5 mt-5">
                        <div>
                            <div class="w-10 h-10 rounded-full shadow-lg bg-white flex items-center justify-center">
                                <i class="mdi mdi-check text-base text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-base font-normal text-gray-500"><span class="font-bold text-gray-900">The wise
                                a
                                therefore always holds</span> in us matters to this principle a selection a rejects
                            pleasures.</p>
                    </div><!-- Flex End -->

                    <div class="flex items-center gap-5 mt-8">
                        <div>
                            <div class="w-10 h-10 rounded-full shadow-lg bg-white flex items-center justify-center">
                                <i class="mdi mdi-layers-outline text-base text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-base font-normal text-gray-500">Sed perspiciatis omnis a <span
                                class="font-bold text-gray-900">natus error accusantium doloremque</span> laudantium
                            tota rem aperiam eaque ipsa quae illo inventore.</p>
                    </div><!-- Flex End -->

                    <div class="flex items-center gap-5 mt-8">
                        <div>
                            <div class="w-10 h-10 rounded-full shadow-lg bg-white flex items-center justify-center">
                                <i class="mdi mdi-lock-outline text-base text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-base font-normal text-gray-500"><span class="font-bold text-gray-900">The wise
                                a
                                therefore always holds</span> in us matters to this principle a selection a rejects
                            pleasures.</p>
                    </div><!-- Flex End -->
                </div><!-- end grid col -->
            </div><!-- Grid End -->
        </div><!-- Container End -->
    </section>
    <!-- features end -->

    <!-- features start -->
    <section class="py-20 bg-gray-50 relative bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('images/features-bg.png') }}');">
        <div class="container">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-16 items-center">
                <div class="lg:me-24">
                    <h1 class="text-4xl font-semibold">Connecting people, Places</h1>
                    <p class="text-base font-normal text-gray-500 mt-8">On the other hand, we denounce with righteous
                        indignation so blinded that they cannot.</p>

                    <div class="flex items-center gap-5 mt-5">
                        <div>
                            <div class="w-10 h-10 rounded-full shadow-lg bg-white flex items-center justify-center">
                                <i class="mdi mdi-check text-base text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-base font-normal text-gray-500"><span class="font-bold text-gray-900">The wise
                                a
                                therefore always holds</span> in us matters to this principle a selection a rejects
                            pleasures.</p>
                    </div><!-- Flex End -->

                    <div class="flex items-center gap-5 mt-8">
                        <div>
                            <div class="w-10 h-10 rounded-full shadow-lg bg-white flex items-center justify-center">
                                <i class="mdi mdi-layers-outline text-base text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-base font-normal text-gray-500">Sed perspiciatis omnis a <span
                                class="font-bold text-gray-900">natus error accusantium doloremque</span> laudantium
                            tota rem aperiam eaque ipsa quae illo inventore.</p>
                    </div><!-- Flex End -->

                    <div class="flex items-center gap-5 mt-8">
                        <div>
                            <div class="w-10 h-10 rounded-full shadow-lg bg-white flex items-center justify-center">
                                <i class="mdi mdi-lock-outline text-base text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-base font-normal text-gray-500"><span class="font-bold text-gray-900">The wise
                                a
                                therefore always holds</span> in us matters to this principle a selection a rejects
                            pleasures.</p>
                    </div><!-- Flex End -->
                </div>

                <div>
                    <img src="{{ asset('images/features-2.png') }}" class="mx-auto" alt="">
                </div>
            </div><!-- Grid End -->
        </div><!-- Container End -->
    </section>
    <!-- features end -->

    <!-- counter start -->
    <section class="relative py-28 bg-cover bg-no-repeat bg-center"
        style="background-image: url('{{ asset('images/counter-bg.jpg') }}'); background-attachment: fixed;">
        <div class="absolute inset-0 w-full h-full bg-gray-900/70"></div>

        <div class="container relative">
            <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
                <div class="border border-gray-500 rounded-lg text-white bg-gray-500/40 p-5">
                    <div class="flex items-center gap-6">
                        <i class="mdi mdi-web text-5xl"></i>
                        <div>
                            <h1 class="text-4xl"><span class="counter_value" data-target="825">0</span></h1>
                            <p class="text-lg font-medium uppercase mt-3">Global Brands</p>
                        </div>
                    </div>
                </div>

                <div class="border border-gray-500 rounded-lg text-white bg-gray-500/40 p-5">
                    <div class="flex items-center gap-6">
                        <i class="mdi mdi-emoticon-happy text-5xl"></i>
                        <div>
                            <h1 class="text-4xl"><span class="counter_value" data-target="1800">0</span>+</h1>
                            <p class="text-lg font-medium uppercase mt-3">Happy Clients</p>
                        </div>
                    </div>
                </div>

                <div class="border border-gray-500 rounded-lg text-white bg-gray-500/40 p-5">
                    <div class="flex items-center gap-6">
                        <i class="mdi mdi-lightbulb-on text-5xl"></i>
                        <div>
                            <h1 class="text-4xl"><span class="counter_value" data-target="599">0</span>+</h1>
                            <p class="text-lg font-medium uppercase mt-3">Global Brands</p>
                        </div>
                    </div>
                </div>

                <div class="border border-gray-500 rounded-lg text-white bg-gray-500/40 p-5">
                    <div class="flex items-center gap-6">
                        <i class="mdi mdi-account-multiple text-5xl"></i>
                        <div>
                            <h1 class="text-4xl"><span class="counter_value" data-target="2000">0</span>+</h1>
                            <p class="text-lg font-medium uppercase mt-3">User clients</p>
                        </div>
                    </div>
                </div>
            </div><!-- Grid End -->
        </div><!-- Container End -->
    </section>
    <!-- counter end -->

    <!-- App Screens start -->
    <section id="screenshots" class="py-20">
        <div class="container">
            <div class="text-center max-w-xl mx-auto">
                <h6 class="font-normal uppercase mb-2">App <span class="font-semibold">Screens </span></h6>
                <h2 class="text-3xl font-semibold mb-3">Awesome Screenshot</h2>
                <p class="text-base font-normal text-gray-500">Sed ut perspiciatis unde omnis iste natus error
                    voluptatem accusantium doloremque rem aperiam.</p>
            </div>

            <!-- Swiper slider start -->
            <div class="mySwiper swiper swiper-1 relative mt-16">
                <div class="swiper-wrapper py-10 mb-14">
                    <div class="swiper-slide mx-auto">
                        <img src="{{ asset('images/screen-shot/1.jpg') }}" class="rounded-md border mx-auto"
                            alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/screen-shot/2.jpg') }}" class="rounded-md border mx-auto"
                            alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/screen-shot/3.jpg') }}" class="rounded-md border mx-auto"
                            alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/screen-shot/4.jpg') }}" class="rounded-md border mx-auto"
                            alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/screen-shot/5.jpg') }}" class="rounded-md border mx-auto"
                            alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/screen-shot/6.jpg') }}" class="rounded-md border mx-auto"
                            alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- Swiper slider end -->
        </div>
    </section>
    <!-- App Screens end -->

    <!-- testimonial start -->
    <section id="testimonial" class="py-20 bg-gray-50">
        <div class="container">
            <div class="text-center max-w-xl mx-auto">
                <h6 class="font-normal uppercase mb-2">Our <span class="font-semibold">Testimonial </span></h6>
                <h2 class="text-3xl font-semibold mb-3">What Our Customers Say</h2>
                <p class="text-base font-normal text-gray-500">Sed ut perspiciatis unde omnis iste natus error
                    voluptatem accusantium doloremque rem aperiam.</p>
            </div>

            <div class="text-center mt-16">
                <p class="text-base font-normal text-gray-500">“Itaque earum us tenetur sapiente delectus asperiores
                    repellat.”</p>
                <div class="max-w-3xl mx-auto mt-4 mb-10">
                    <h5 class="text-lg font-medium">At vero eos et accusamus iusto odio dignissimos ducimus qui
                        blanditiis praesentium voluptatum deleniti atqued corrupti as quos dolores quas molestias
                        excepturi occaecati provident.</h5>
                </div>
                <img src="{{ asset('images/users/user-1.jpg') }}" class="mx-auto rounded-full h-16" alt="">
                <h5 class="text-base font-medium mt-6">Mayra Vasquez</h5>
                <p class="text-sm font-normal text-gray-500 mt-1">Web Development, USA</p>
            </div>

            <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6 mt-20">
                <div>
                    <img src="{{ asset('images/brand-logo/dribbble.png') }}" class="h-10 mx-auto" alt="">
                </div>
                <!-- end grid col -->

                <div>
                    <img src="{{ asset('images/brand-logo/insta.png') }}" class="h-10 mx-auto" alt="">
                </div>
                <!-- end grid col -->

                <div>
                    <img src="{{ asset('images/brand-logo/bootstrap.png') }}" class="h-10 mx-auto" alt="">
                </div>
                <!-- end grid col -->

                <div>
                    <img src="{{ asset('images/brand-logo/jquery.png') }}" class="h-10 mx-auto" alt="">
                </div>
                <!-- end grid col -->
            </div>
            <!-- Grid End -->
        </div>
        <!-- Container End -->
    </section>
    <!-- testimonial end -->

    <!-- Pricing start -->
    <section id="pricing" class="py-20">
        <div class="container">
            <div class="text-center max-w-xl mx-auto">
                <h6 class="font-normal uppercase mb-2">Our <span class="font-semibold">Pricing </span></h6>
                <h2 class="text-3xl font-semibold mb-3">Pricing Plan</h2>
                <p class="text-base font-normal text-gray-500">Sed ut perspiciatis unde omnis iste natus error
                    voluptatem accusantium doloremque rem aperiam.</p>
            </div>

            <div class="flex justify-center mt-10">
                <div class="inline-block border p-2 rounded-full bg-gray-500/10">
                    <div class="flex items-center gap-5">
                        <button id="monthlyBtn" onclick="showPlan('monthly')"
                            class="toggle-btn py-2 px-4 text-base font-normal rounded-full text-white bg-blue-600">Monthly</button>
                        <button id="yearlyBtn" onclick="showPlan('yearly')"
                            class="toggle-btn py-2 px-4 text-base font-normal rounded-full bg-transparent">Yearly</button>
                    </div>
                </div>
            </div>
            <!-- flex End -->

            <div id="monthlyPlan" class="grid lg:grid-cols-3 grid-cols-1 gap-6 items-center mt-16">

                @foreach ($products['data'] as $product)
                    <div class="w-72 h-96 m-4 p-10 rounded-md shadow-lg relative bg-white">
                        <div class="p-7 text-center bg-gray-50">
                            <img src="{{ $product['attributes']['large_thumb_url'] }}" alt="image"
                                class="mx-auto mb-4 max-h-32">
                            <h1 class="text-2xl font-semibold text-blue-600 mb-2">
                                {{ $product['attributes']['name'] }}
                            </h1>
                        </div>
                        <div class="mt-4">
                            <a href="{{ $product['attributes']['buy_now_url'] }}"
                                class="block w-full py-2 px-6 text-center rounded-md text-base font-normal text-white bg-gradient-to-r from-primary to-blue-300 bg-primary/10 transition-all duration-500"
                                target="_blank">
                                {{ $product['attributes']['price_formatted'] }}
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- @foreach ($products['data'] as $key => $product)
                    <div class="w-72 h-96 m-4 p-10 rounded-md shadow-lg relative bg-white">
                        <div class="p-7 text-center bg-gray-50">
                            <img src="{{ $product['attributes']['large_thumb_url'] }}" alt="image"
                                class="mx-auto mb-4 max-h-32">
                            <h1 class="text-2xl font-semibold text-blue-600 mb-2">
                                {{ $product['attributes']['name'] }}
                            </h1>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('buy', ['product_id' => $key]) }}">Buy Now</a>
                        </div>
                    </div>
                @endforeach --}}

                {{-- <div class="p-10 rounded-md shadow-lg relative overflow-hidden">
                    <div class="absolute right-0 top-0 h-16 w-16 z-10">
                        <div
                            class="absolute rotate-45 bg-red-600 text-center text-white font-normal text-sm py-0.5 right-[-35px] top-[32px] w-[170px] shadow-lg">
                            Most Popular
                        </div>
                    </div>
                    <div class="p-7 rounded-md text-center bg-gray-50">
                        <h5 class="text-lg font-medium">Standard</h5>
                        <h1 class="text-4xl font-semibold text-blue-600">$29.00<span
                                class="text-base font-normal text-gray-500">/Month</span></h1>
                    </div>
                    <div class="grid gap-y-4 mt-8">
                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">10</span> Projects</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">1TB</span> Storage</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">Unlimited</span> Contacts</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">12</span> Domains</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500">Free Support <span
                                    class="font-bold text-gray-800">24/7</span></p>
                        </div>
                    </div>

                    <div class="mt-14">
                        <a href="#"
                            class="py-2 px-6 flex items-center justify-center rounded-md text-base font-normal text-white bg-gradient-to-r from-primary to-blue-300 bg-primary/10 focus:text-black transition-all duration-500">Choose
                            Plan</a>
                    </div>
                </div> --}}
                {{-- <div class="p-10 rounded-md shadow-lg relative">
                    <div class="p-7 rounded-md text-center bg-gray-50">
                        <h5 class="text-lg font-medium">Enterprice</h5>
                        <h1 class="text-4xl font-semibold text-blue-600">$49.00<span
                                class="text-base font-normal text-gray-500">/Month</span></h1>
                    </div>
                    <div class="grid gap-y-4 mt-8">
                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">20</span> Projects</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">2.5TB</span> Storage</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">Unlimited</span> Contacts</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">18</span> Domains</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500">Free Support <span
                                    class="font-bold text-gray-800">24/7</span></p>
                        </div>
                    </div>

                    <div class="mt-14">
                        <a href="#"
                            class="py-2 px-6 flex items-center justify-center rounded-md text-base font-normal text-white bg-gradient-to-r from-primary to-blue-300 bg-primary/10 focus:text-black transition-all duration-500">Choose
                            Plan</a>
                    </div>
                </div> --}}
            </div>

            <div id="yearlyPlan" class="grid lg:grid-cols-3 grid-cols-1 gap-6 items-center mt-16">
                <div class="p-10 rounded-md shadow-lg relative">
                    <div class="p-7 rounded-md text-center bg-gray-50">
                        <h5 class="text-lg font-medium">Free</h5>
                        <h1 class="text-4xl font-semibold text-blue-600">$0.00<span
                                class="text-base font-normal text-gray-500">/Month</span></h1>
                    </div>
                    <div class="grid gap-y-4 mt-8">
                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">3</span> Projects</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">580GB</span> Storage</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">Unlimited</span> Contacts</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">5</span> Domains</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500">Free Support <span
                                    class="font-bold text-gray-800">24/7</span></p>
                        </div>
                    </div>


                    <div class="mt-14">
                        <a href="#"
                            class="py-2 px-6 flex items-center justify-center rounded-md text-base font-normal text-white bg-gradient-to-r from-primary to-blue-300 bg-primary/10 focus:text-black transition-all duration-500">
                            Choose Plan
                        </a>
                    </div>
                </div>
                <div class="p-10 rounded-md shadow-lg relative overflow-hidden">
                    <div class="absolute right-0 top-0 h-16 w-16 z-10">
                        <div
                            class="absolute rotate-45 bg-red-600 text-center text-white font-normal text-sm py-0.5 right-[-35px] top-[32px] w-[170px] shadow-lg">
                            Most Popular
                        </div>
                    </div>
                    <div class="p-7 rounded-md text-center bg-gray-50">
                        <h5 class="text-lg font-medium">Standard</h5>
                        <h1 class="text-4xl font-semibold text-blue-600">$29.00<span
                                class="text-base font-normal text-gray-500">/Month</span></h1>
                    </div>
                    <div class="grid gap-y-4 mt-8">
                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">10</span> Projects</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">1TB</span> Storage</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">Unlimited</span> Contacts</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">12</span> Domains</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500">Free Support <span
                                    class="font-bold text-gray-800">24/7</span></p>
                        </div>
                    </div>

                    <div class="mt-14">
                        <a href="#"
                            class="py-2 px-6 flex items-center justify-center rounded-md text-base font-normal text-white bg-gradient-to-r from-primary to-blue-300 bg-primary/10 focus:text-black transition-all duration-500">Choose
                            Plan</a>
                    </div>
                </div>
                <div class="p-10 rounded-md shadow-lg relative">
                    <div class="p-7 rounded-md text-center bg-gray-50">
                        <h5 class="text-lg font-medium">Enterprice</h5>
                        <h1 class="text-4xl font-semibold text-blue-600">$49.00<span
                                class="text-base font-normal text-gray-500">/Month</span></h1>
                    </div>
                    <div class="grid gap-y-4 mt-8">
                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">20</span> Projects</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">2.5TB</span> Storage</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">Unlimited</span> Contacts</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500"><span
                                    class="font-bold text-gray-800">18</span> Domains</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <i class="mdi mdi-check text-lg text-gray-500"></i>
                            <p class="text-base font-normal text-gray-500">Free Support <span
                                    class="font-bold text-gray-800">24/7</span></p>
                        </div>
                    </div>

                    <div class="mt-14">
                        <a href="#"
                            class="py-2 px-6 flex items-center justify-center rounded-md text-base font-normal text-white bg-gradient-to-r from-primary to-blue-300 bg-primary/10 focus:text-black transition-all duration-500">Choose
                            Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing end -->

    <!-- faqs start -->
    <section class="py-20 bg-gray-50">
        <div class="container">
            <div class="text-center max-w-xl mx-auto">
                <h6 class="font-normal uppercase mb-2">Our <span class="font-semibold">FAQs </span></h6>
                <h2 class="text-3xl font-semibold mb-3">Frequently Asked Questions</h2>
                <p class="text-base font-normal text-gray-500">Sed ut perspiciatis unde omnis iste natus error
                    voluptatem accusantium doloremque rem aperiam.</p>
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 gap-6 items-center mt-16">
                <div>
                    <img src="{{ asset('images/faq.png') }}" class="mx-auto" alt="">
                </div><!-- end grid col -->

                <div class="lg:col-span-2 lg:ms-24">
                    <div data-fc-type="accordion" class="space-y-4">
                        <div>
                            <button
                                class="fc-collapse-open:bg-gray-200 bg-white rounded fc-collapse-open:rounded-b-none text-base px-5 py-3 inline-flex items-center gap-x-3 w-full font-medium text-left text-gray-800 transition hover:text-gray-500"
                                data-fc-type="collapse">
                                How to install App?
                                <span
                                    class="mdi mdi-chevron-down ms-auto text-2xl transition-all fc-collapse-open:-rotate-180"></span>
                            </button>
                            <div class="w-full overflow-hidden transition-[height] duration-300 bg-white rounded-b-md">
                                <p class="text-sm font-normal text-gray-500 p-5">
                                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur adipisci
                                    velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                    aliquam quaerat voluptatem.
                                </p>
                            </div>
                        </div>
                        <div>
                            <button
                                class="fc-collapse-open:bg-gray-200 bg-white rounded fc-collapse-open:rounded-b-none text-base px-5 py-3 inline-flex items-center gap-x-3 w-full font-medium text-left text-gray-800 transition hover:text-gray-500"
                                data-fc-type="collapse">
                                How do I get the Mobile App for my phone?
                                <span
                                    class="mdi mdi-chevron-down ms-auto text-2xl transition-all fc-collapse-open:-rotate-180"></span>
                            </button>
                            <div
                                class="hidden w-full overflow-hidden transition-[height] duration-300 bg-white rounded-b-md">
                                <p class="text-sm font-normal text-gray-500 p-5">
                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                    praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                    excepturi sint occaecati cupiditate non
                                    provident, similique sunt in culpa qui officia deserunt mollitia animi, id est
                                    laborum et dolorum fuga.
                                </p>
                            </div>
                        </div>

                        <div>
                            <button
                                class="fc-collapse-open:bg-gray-200 bg-white rounded fc-collapse-open:rounded-b-none text-base p-5 py-3 inline-flex items-center gap-x-3 w-full font-medium text-left text-gray-800 transition hover:text-gray-500"
                                data-fc-type="collapse">
                                What’s special about Appexy?
                                <span
                                    class="mdi mdi-chevron-down ms-auto text-2xl transition-all fc-collapse-open:-rotate-180"></span>
                            </button>
                            <div
                                class="hidden w-full overflow-hidden transition-[height] duration-300 bg-white rounded-b-md">
                                <p class="text-sm font-normal text-gray-500 p-5">
                                    Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus
                                    maiores alias consequatur aut perferendis doloribus asperiores repellat.
                                </p>
                            </div>
                        </div>

                        <div>
                            <button
                                class="fc-collapse-open:bg-gray-200 bg-white rounded fc-collapse-open:rounded-b-none text-base p-5 py-3 inline-flex items-center gap-x-3 w-full font-medium text-left text-gray-800 transition hover:text-gray-500"
                                data-fc-type="collapse">
                                How much does Appexy cost?
                                <span
                                    class="mdi mdi-chevron-down ms-auto text-2xl transition-all fc-collapse-open:-rotate-180"></span>
                            </button>
                            <div
                                class="hidden w-full overflow-hidden transition-[height] duration-300 bg-white rounded-b-md">
                                <p class="text-sm font-normal text-gray-500 p-5">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis et quasi architecto beatae vitae dicta
                                    sunt explicabo.
                                </p>
                            </div>
                        </div>

                        <div>
                            <button
                                class="fc-collapse-open:bg-gray-200 bg-white rounded fc-collapse-open:rounded-b-none text-base p-5 py-3 inline-flex items-center gap-x-3 w-full font-medium text-left text-gray-800 transition hover:text-gray-500"
                                data-fc-type="collapse">
                                How do I disable installed apps?
                                <span
                                    class="mdi mdi-chevron-down ms-auto text-2xl transition-all fc-collapse-open:-rotate-180"></span>
                            </button>
                            <div
                                class="hidden w-full overflow-hidden transition-[height] duration-300 bg-white rounded-b-md">
                                <p class="text-sm font-normal text-gray-500 p-5">
                                    Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus
                                    maiores alias consequatur aut perferendis doloribus asperiores repellat.
                                </p>
                            </div>
                        </div>

                        <div>
                            <button
                                class="fc-collapse-open:bg-gray-200 bg-white rounded fc-collapse-open:rounded-b-none text-base p-5 py-3 inline-flex items-center gap-x-3 w-full font-medium text-left text-gray-800 transition hover:text-gray-500"
                                data-fc-type="collapse">
                                What about the security of my payments?
                                <span
                                    class="mdi mdi-chevron-down ms-auto text-2xl transition-all fc-collapse-open:-rotate-180"></span>
                            </button>
                            <div
                                class="hidden w-full overflow-hidden transition-[height] duration-300 bg-white rounded-b-md">
                                <p class="text-sm font-normal text-gray-500 p-5">
                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!-- end grid col -->
            </div><!-- Grid End -->
        </div><!-- Container End -->
    </section>
    <!-- faqs end -->

    <!-- cta start -->
    <section class="py-20">
        <div class="container">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="md:text-5xl text-3xl font-semibold">Available For Your Smartphone.</h1>
                <p class="text-base font-normal text-gray-500 mt-7">The wise man therefore always holds in these
                    matters
                    to this of selection he rejects pleasures to other greater that id pains to avoid worse.</p>
                <div class="flex flex-wrap items-center justify-center gap-2 mt-12">
                    <a href="#" class="shadow-xl">
                        <img src="{{ asset('images/i-store.png') }}" alt="">
                    </a>
                    <a href="#" class="shadow-xl">
                        <img src="{{ asset('images/play-store.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div><!-- Container End -->
    </section>
    <!-- cta end -->

    <!-- contact start -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="container">
            <div class="text-center max-w-xl mx-auto">
                <h6 class="font-normal uppercase mb-2">Our <span class="font-semibold">Contact Us</span></h6>
                <h2 class="text-3xl font-semibold mb-3">Get in Touch</h2>
                <p class="text-base font-normal text-gray-500">Sed ut perspiciatis unde omnis iste natus error
                    voluptatem accusantium doloremque rem aperiam.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-6 items-center mt-16">
                <div>
                    <div class="flex items-center gap-6  ">
                        <img src="{{ asset('images/hello-icon.png') }}" class="h-20" alt="">
                        <h2 class="text-3xl font-semibold">Say Hello!</h2>
                    </div>

                    <div class="flex items-center gap-5 mt-10">
                        <div class="h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center">
                            <i class="mdi mdi-email text-2xl text-blue-600"></i>
                        </div>
                        <h5 class="text-xl font-medium">Email</h5>
                    </div>
                    <p class="flex items-center gap-1 text-gray-500 mt-4">
                        <i class="mdi mdi-arrow-right-thin text-2xl"></i>
                        <a href="#" class="text-base font-normal">JuanaMRush@jourrapide.com</a>
                    </p>
                    <p class="flex items-center gap-1 text-gray-500">
                        <i class="mdi mdi-arrow-right-thin text-2xl"></i>
                        <a href="#" class="text-base font-normal">BrandonDBrown@jourrapide.com</a>
                    </p>

                    <div class="flex items-center gap-5 mt-6">
                        <div class="h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center">
                            <i class="mdi mdi-phone text-2xl text-blue-600"></i>
                        </div>
                        <h5 class="text-xl font-medium">Phone</h5>
                    </div>
                    <p class="flex items-center gap-1 text-gray-500 mt-4">
                        <i class="mdi mdi-arrow-right-thin text-2xl"></i>
                        <a href="#" class="text-base font-normal">(+01) 1234 5678 00</a>
                    </p>
                    <p class="flex items-center gap-1 text-gray-500">
                        <i class="mdi mdi-arrow-right-thin text-2xl"></i>
                        <a href="#" class="text-base font-normal">(+01) 1234 5678 00</a>
                    </p>

                    <div class="flex items-center gap-5 mt-6">
                        <div class="h-10 w-10 rounded-md bg-blue-100 flex items-center justify-center">
                            <i class="mdi mdi-google-maps text-2xl text-blue-600"></i>
                        </div>
                        <h5 class="text-xl font-medium">Address</h5>
                    </div>
                    <h5 class="flex items-center gap-1 text-gray-900 mt-4">
                        <i class="mdi mdi-arrow-right-thin text-2xl"></i>
                        <a href="#" class="text-base font-medium"> New York Office</a>
                    </h5>
                    <p class="text-base font-normal text-gray-500">331 Maple Street, Monroe Avenue, CA 90017</p>

                    <h5 class="flex items-center gap-1 text-gray-900 mt-4">
                        <i class="mdi mdi-arrow-right-thin text-2xl"></i>
                        <a href="#" class="text-base font-medium">Anguilla Office</a>
                    </h5>
                    <p class="text-base font-normal text-gray-500">2118 Bird Spring, Creek Road, TX 77388</p>
                </div> <!-- end grid col -->

                <div class="lg:col-span-2 lg:ms-24">
                    <div class="p-12 rounded-md shadow-lg bg-white">
                        <form>
                            <div class="grid sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="formFirstName"
                                        class="block text-sm/normal font-semibold text-gray-500 mb-2">First
                                        Name</label>
                                    <input type="text"
                                        class="block w-full text-sm rounded-md py-2 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        id="formFirstName" placeholder="Your first name..." required="">
                                </div>

                                <div>
                                    <label for="formLastName"
                                        class="block text-sm/normal font-semibold text-gray-500 mb-2">Last Name</label>
                                    <input type="text"
                                        class="block w-full text-sm rounded-md py-2 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        id="formLastName" placeholder="Last first name..." required="">
                                </div>

                                <div>
                                    <label for="formEmail"
                                        class="block text-sm/normal font-semibold text-gray-500 mb-2">Email
                                        Address</label>
                                    <input type="email"
                                        class="block w-full text-sm rounded-md py-2 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        id="formEmail" placeholder="Your email..." required="">
                                </div>

                                <div>
                                    <label for="formPhone"
                                        class="block text-sm/normal font-semibold text-gray-500 mb-2">Phone
                                        Number</label>
                                    <input type="text"
                                        class="block w-full text-sm rounded-md py-2 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        id="formPhone" placeholder="Type phone number..." required="">
                                </div>

                                <div class="sm:col-span-2">
                                    <div class="mb-3">
                                        <label for="formSubject"
                                            class="block text-sm/normal font-semibold text-gray-500 mb-2">Subject</label>
                                        <input type="text"
                                            class="block w-full text-sm rounded-md py-2 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                            id="formSubject" placeholder="Type subject..." required="">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="mb-4">
                                        <label for="formMessages"
                                            class="block text-sm/normal font-semibold text-gray-500 mb-2">Messages</label>
                                        <textarea
                                            class="block w-full text-sm rounded-md py-2 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                            id="formMessages" rows="4" placeholder="Type messages..." required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="py-2 px-6 rounded-md text-white bg-gradient-to-r from-rose-600 to-rose-300">Send
                                Messages <i class="mdi mdi-send ms-1"></i></button>
                        </form><!-- From End -->
                    </div>
                </div><!-- end grid col -->
            </div><!-- Grid End -->
        </div><!-- Container End -->
    </section>
    <!-- contact end -->

    <!-- ================== Footer section start =================== -->
    <footer class="bg-center bg-no-repeat bg-[#343a40]"
        style="background-image: url('{{ asset('images/footer-light-bg.png') }}');">
        <div class="container lg:px-20">

            <div class="grid grid-cols-1 xl:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 pt-20 pb-10">
                <div class="sm:col-span-5 xl:col-span-1 mx-auto text-center">
                    <a href="#" class="flex items-center gap-2 justify-center">
                        <img src="{{ asset('images/logo-light.png') }}" class=" w-36" alt="">
                    </a>
                    <div class="my-5">
                        <a href="#" class="text-slate-100 font-normal">Hello@coderthemes.com</a>
                        <p class="text-slate-200 text-base font-normal">+01 ( 1234 567 890 )</p>
                    </div>
                    <h5 class="text-white 2xl:text-lg text-base mb-4">Follow Us</h5>
                    <ul class="flex flex-wrap items-center gap-4">
                        <li>
                            <a href="javascript:void(0);"
                                class="bg-[#495057] hover:bg-white text-white hover:text-blue-600 hover:shadow-sm transition-all duration-300 h-10 w-10 rounded-md flex justify-center items-center"><i
                                    class="mdi mdi-facebook align-middle text-xl"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="bg-[#495057] hover:bg-white text-white hover:text-blue-600 hover:shadow-sm transition-all duration-300 h-10 w-10 rounded-md flex justify-center items-center"><i
                                    class="mdi mdi-twitter align-middle text-xl"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="bg-[#495057] hover:bg-white text-white hover:text-blue-600 hover:shadow-sm transition-all duration-300 h-10 w-10 rounded-md flex justify-center items-center"><i
                                    class="mdi mdi-linkedin align-middle text-xl"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="bg-[#495057] hover:bg-white text-white hover:text-blue-600 hover:shadow-sm transition-all duration-300 h-10 w-10 rounded-md flex justify-center items-center"><i
                                    class="mdi mdi-skype align-middle text-xl"></i></a>
                        </li>
                    </ul>
                </div> <!-- end grid col -->

                <div class="xl:ms-3 mt-14 xl:mt-0 lg:col-span-1 col-span-2">
                    <ul class="flex flex-col gap-3">
                        <h5 class="xl:text-xl lg:text-lg text-white font-normal mb-2">About Us</h5>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Support
                                Center</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Customer
                                Support</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">About
                                Us</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Copyright</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Popular
                                Campaign</a>
                        </li>
                    </ul>
                </div> <!-- end grid col -->

                <div class="xl:ms-3 mt-14 xl:mt-0 lg:col-span-1 col-span-2">
                    <ul class="flex flex-col gap-3">
                        <h5 class="xl:text-xl lg:text-lg text-white font-normal mb-2">Our Information</h5>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Return
                                Policy</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Privacy
                                Policy</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Terms
                                & Conditions</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Site
                                Map</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Store
                                Hours</a>
                        </li>
                    </ul>
                </div> <!-- end grid col -->

                <div class="xl:ms-3 mt-14 xl:mt-0 lg:col-span-1 col-span-2">
                    <ul class="flex flex-col gap-3">
                        <h5 class="xl:text-xl lg:text-lg text-white font-normal mb-2">My Account</h5>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Press
                                Inquiries</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Social
                                Media Directories</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Images
                                & B-roll</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Permissions</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Speaker
                                Requests</a>
                        </li>
                    </ul>
                </div> <!-- end grid col -->

                <div class="xl:ms-3 mt-14 xl:mt-0 lg:col-span-1 col-span-2">
                    <ul class="flex flex-col gap-3">
                        <h5 class="xl:text-xl lg:text-lg text-white font-normal mb-2">Policy</h5>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Application
                                Security</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Softwere
                                Principles</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Softwere
                                Policy</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"
                                class="text-base font-normal text-slate-300 hover:text-slate-100 after:content-[''] relative after:absolute flex items-center hover:after:items-center transition-all after:transition-all duration-300 after:duration-300 after:bg-blue-600 hover:ps-3 after:left-0 after:h-0 hover:after:h-[5px] after:w-0 hover:after:w-[5px] after:rounded-full">Risponsible
                                Supply Chain</a>
                        </li>
                    </ul>
                </div> <!-- end grid col -->
            </div><!-- Grid End -->
        </div><!-- Container End -->

        <div class="bg-[#484d53] py-2 text-white/75">
            <div class="container lg:px-24">
                <div class="flex flex-wrap justify-between items-center">
                    <p class="opacity-75">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        © Appexy - <a href="#">Coderthemes.com</a>
                    </p>
                    <p class="opacity-75 mt-3 sm:mt-0">
                        <a href="#">Terms Conditions & Policy</a>
                    </p>
                </div><!-- Flex End -->
            </div><!-- Container End -->
        </div>
    </footer>
    <!-- ================== Footer section End =================== -->

    <!-- =========== Back To Top Start =========== -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed rounded z-10 bottom-5 end-5 px-1.5 text-xl text-center bg-gradient-to-r from-primary to-blue-400 text-white leading-8 transition-all duration-500 block">
        <span class="mdi mdi-chevron-up text-2xl/none"></span>
    </a>
    <!-- =========== Back To Top End =========== -->

    {{-- <!-- =========== Log In Modal =========== -->
    <div id="login-modal"
        class="fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden modal w-full h-full min-h-full items-center fc-modal-open:flex">
        <div
            class="mt-5 fc-modal-open:scale-100 duration-300 scale-90 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto  bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <button id="login-elementToClose" type="button"
                class="bg-white rounded-md p-5 inline-flex text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 absolute top-2 right-2 close-popup">
                <span class="modal-close-button" onclick="closeModal('login-modal')">X</span>
            </button>
            <div class="p-6">
                <div class="text-center mb-4">
                    <h4 class="text-2xl/tight mb-2">Welcome Back</h4>
                    <p class="text-base text-gray-500 mb-6">Welcome back! Please enter your details.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-4">
                        <label class="block text-sm/normal font-semibold text-gray-600 mb-2"
                            for="email">{{ __('Email Address') }}</label>
                        <input id="LoggingEmailAddress"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent @error('email') is-invalid @enderror"
                            name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm/normal font-semibold text-gray-600 mb-2"
                            for="password">{{ __('Password') }}</label>
                        <input id="loggingPassword"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" type="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-7">
                        <div class="flex items-center">
                            <input type="checkbox" class="border-gray-300 rounded" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="ms-2" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <a data-fc-target="forget-password-modal" data-fc-type="modal" class="text-sm text-gray-600"
                            target="modal" data-dismiss="modal">Forgot your Password...?
                        </a>
                    </div>

                    <div class="flex justify-center mb-6">
                        <button
                            class="py-2 px-6 bg-gradient-to-r from-primary to-blue-300 w-full rounded-md text-white text-base"
                            type="submit"> {{ __('Login') }} </button>
                    </div>
                    <div class="flex items-center justify-center mb-7">
                        <a class="text-sm text-gray-600" data-fc-target="signup-modal" data-fc-type="modal"
                            data-dismiss="modal" target="modal">Sign-Up to create a new account</a>
                    </div>
                    <div class="flex items-center my-6">
                        <div class="flex-auto mt-px border-t border-gray-200 dark:border-slate-700"></div>
                        <div class="mx-4 text-secondary">Or continue with</div>
                        <div class="flex-auto mt-px border-t border-gray-200 dark:border-slate-700"></div>
                    </div>

                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('login.google') }}" class="py-2 px-6 bg-red-600 rounded-md text-white">
                            <i class="mdi mdi-google text-xl"></i>
                        </a>
                        <a href="javascript:void(0)" class="py-2 px-6 bg-primary rounded-md text-white">
                            <i class="mdi mdi-apple text-xl"></i>
                        </a>
                    </div>
                    <!-- end social media -->
                </form><!-- end form -->
            </div>
        </div>
    </div>
    <!-- =========== Log In Modal End =========== -->

    <!-- =========== Sign Up Modal =========== -->
    <div id="signup-modal"
        class="fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden modal w-full h-full min-h-full items-center fc-modal-open:flex">
        <div
            class="mt-5 fc-modal-open:scale-100 duration-300 scale-90 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto  bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <button id="signup-elementToClose" type="button"
                class="bg-white rounded-md p-5 inline-flex text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 absolute top-2 right-2 close-popup">
                <span class="modal-close-button" onclick="closeModal('signup-modal')">X</span>
            </button>
            <div class="p-6">
                <div class="text-center mb-4">
                    <h4 class="text-2xl/tight mb-2">Welcome to Register</h4>
                    <p class="text-base text-gray-500 mb-6">Please enter your details to create account.</p>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-sm/normal font-semibold text-gray-600 mb-2"
                            for="name">{{ __('Name') }}</label>
                        <input id="name"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent @error('name') is-invalid @enderror"
                            type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                            placeholder="Enter your name" autofocus maxlength="20">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm/normal font-semibold text-gray-600 mb-2"
                            for="email">{{ __('Email Address') }}</label>
                        <input id="email"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent @error('email') is-invalid @enderror"
                            type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Enter your Email-Id" maxlength="20">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mobile_number"
                            class="block text-sm/normal font-semibold text-gray-600 mb-2">{{ __('Mobile Number') }}</label>
                        <input id="mobile_number" type="text"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent @error('mobile_number') is-invalid @enderror"
                            name="mobile_number" value="{{ old('mobile_number') }}" required
                            autocomplete="mobile_number" placeholder="Enter your mobile number" minlength="10"
                            maxlength="10">
                        @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm/normal font-semibold text-gray-600 mb-2"
                            for="password">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Enter your password"
                            minlength="8" maxlength="16">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm/normal font-semibold text-gray-600 mb-2"
                            for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Enter your same password to confirm" minlength="8" maxlength="16">
                    </div>

                    <div class="flex justify-center mb-6">
                        <button
                            class="py-2 px-6 bg-gradient-to-r from-primary to-blue-300 w-full rounded-md text-white text-base"
                            type="submit">{{ __('Register') }}</button>
                    </div>

                    <div class="flex items-center justify-between mb-7">
                        <div class="flex items-center">
                            <a class="text-sm text-gray-600" data-fc-target="login-modal" data-dismiss="modal"
                                target="modal" aria-disabled="true">Already have an account? Login</a>
                        </div>

                        <div class="flex items-center">
                            <a href="{{ route('index') }}" class="text-sm text-gray-600">Back To Home</a>
                        </div>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
    <!-- =========== Sign Up Modal End =========== -->

    <!-- =========== Forget-Password Modal =========== -->
    <div id="forget-password-modal"
        class="fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden modal w-full h-full min-h-full items-center fc-modal-open:flex">
        <div
            class="mt-5 fc-modal-open:scale-100 duration-300 scale-90 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto items-center bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <button id="forget-password-elementToClose" type="button"
                class="bg-white rounded-md p-5 inline-flex text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 absolute top-2 right-2 close-popup">
                <span class="modal-close-button" onclick="closeModal('forget-password-modal')">X</span>
            </button>
            <div class="p-6">
                <div class="text-center mb-4">
                    <h4 class="text-2xl/tight mb-2">Forgot Password</h4>
                    <p class="text-base text-gray-500 mb-6">Enter your email and we'll send you a link to reset your
                        password.</p>
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-sm/normal font-semibold text-gray-600 mb-2"
                            for="email">{{ __('Email Address') }}</label>
                        <input id="email"
                            class="block w-full rounded-md py-1.5 px-3 border-gray-200 focus:border-gray-300 focus:ring-transparent @error('email') is-invalid @enderror"
                            type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Enter your Email-Id">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex justify-center mb-6">
                        <button
                            class="py-2 px-6 bg-gradient-to-r from-primary to-blue-300 w-full rounded-md text-white text-base"
                            type="submit">{{ __('Send Password Reset Link') }}</button>
                    </div>

                    <div class="flex items-center justify-center mb-7">
                        <a class="text-sm text-gray-600" data-fc-target="login-modal" data-fc-type="modal"
                            data-dismiss="modal" data-dismiss="modal" target="modal">Back To Sign-In</a>
                    </div>

                    <div class="flex items-center justify-center mb-7">
                        <a href="{{ route('index') }}" class="text-sm text-gray-600">Back To Home</a>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
    <!-- =========== Forget-Password Modal End =========== --> --}}

    <!-- Frost UI -->
    <script src="{{ asset('libs/@frostui/tailwindcss/frostui.js') }}"></script>

    <!-- Gumshoejs -->
    <script src="{{ asset('libs/gumshoejs/gumshoe.polyfills.min.js') }}"></script>

    <!-- Swiper Js -->
    <script src="{{ 'libs/swiper/swiper-bundle.min.js' }}"></script>

    <!-- Theme Js -->
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/theme.min.js') }}"></script>

</body>

</html>

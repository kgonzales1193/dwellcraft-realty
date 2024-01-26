<x-frontend-layout>
    <!--Page Title-->
    <section class="page-title centred"
        style="background-image: url({{ asset('frontend/assets/images/background/page-title-5.jpg') }});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>User Profile </h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>User Profile </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>User Profile </h4>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html">
                                            <img src="{{ auth()->user()->getFirstMediaUrl('profile-image') ?:
                                                Avatar::create(auth()->user()->name)->setDimension(400)->setFontSize(240)->toBase64() }}"
                                                alt=""></a></figure>
                                    <h5><a href="blog-details.html">{{ Auth::user()->name }}</a></h5>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h4>Category</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list ">

                                    <li class="current"> <a href="blog-details.html"><i class="fab fa fa-envelope "></i>
                                            Dashboard </a></li>


                                    <li><a href="blog-details.html"><i class="fa fa-cog" aria-hidden="true"></i>
                                            Settings</a></li>
                                    <li><a href="blog-details.html"><i class="fa fa-credit-card" aria-hidden="true"></i>
                                            Buy
                                            credits<span class="badge badge-info">( 10 credits)</span></a></li>
                                    <li><a href="blog-details.html"><i class="fa fa-list-alt"
                                                aria-hidden="true"></i></i>
                                            Properties </a></li>
                                    <li><a href="blog-details.html"><i class="fa fa-indent" aria-hidden="true"></i> Add
                                            a
                                            Property </a></li>
                                    <li><a href="blog-details.html"><i class="fa fa-key" aria-hidden="true"></i>
                                            Security
                                        </a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>




                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">

                                <div class="lower-content">
                                    <div class="items-center justify-center mx-auto text-center w-full pb-3">
                                        <h3>My Profile</h3>
                                        <p>manage your personal information</p>
                                    </div>
                                    <hr class="hr pb-2" />

                                    <div>
                                        <form action="{{ route('profile.update', auth()->user()) }}" method="POST"
                                            enctype="multipart/form-data" class="default-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="name" class="form-label">
                                                        {{ __('translate.Name') }}
                                                    </label>
                                                    <input name="name" type="text" id="name"
                                                        class="form-control"
                                                        placeholder="{{ __('translate.Enter Your Name') }}"
                                                        value="{{ auth()->user()->name }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="username" class="form-label">
                                                        {{ __('translate.Username') }}
                                                    </label>
                                                    <input name="username" type="text" id="username"
                                                        class="form-control"
                                                        placeholder="{{ __('translate.Enter Your Username') }}"
                                                        value="{{ auth()->user()->username }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="email" class="form-label">
                                                        {{ __('translate.Email') }}
                                                    </label>
                                                    <input name="email" type="email" id="email"
                                                        class="form-control"
                                                        placeholder="{{ __('translate.Enter Your Email') }}"
                                                        value="{{ auth()->user()->email }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="phone" class="form-label">
                                                        {{ __('translate.Phone') }}
                                                    </label>
                                                    <input name="phone" type="text" id="phone"
                                                        class="form-control"
                                                        placeholder="{{ __('translate.Enter Your Phone Number') }}"
                                                        value="{{ auth()->user()->phone }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="address_line" class="form-label">
                                                        {{ __('translate.Address Line') }}
                                                    </label>
                                                    <input name="address_line" type="text" id="address_line"
                                                        class="form-control"
                                                        placeholder="{{ __('translate.Enter Your Address') }}"
                                                        value="{{ auth()->user()->address_line }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="city" class="form-label">
                                                        {{ __('translate.City') }}
                                                    </label>
                                                    <input name="city" type="text" id="city"
                                                        class="form-control"
                                                        placeholder="{{ __('translate.Enter Your City Name') }}"
                                                        value="{{ auth()->user()->city }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="state_or_province" class="form-label">
                                                        {{ __('translate.Province or State') }}
                                                    </label>
                                                    <input name="state_or_province" type="text"
                                                        id="state_or_province" class="form-control"
                                                        placeholder="{{ __('translate.Enter Your Province or State') }}"
                                                        value="{{ auth()->user()->state_or_province }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="postal_code" class="form-label">
                                                        {{ __('translate.Postal Code') }}
                                                    </label>
                                                    <input name="postal_code" type="text" id="postal_code"
                                                        class="form-control"
                                                        placeholder="{{ __('translate.Enter Your Postal Code') }}"
                                                        value="{{ auth()->user()->postal_code }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="country" class="form-label">
                                                        {{ __('translate.Photo') }}
                                                    </label>
                                                    <input onchange="imagePreview(event, 'profilePagePreviewId')"
                                                        name="photo" type="file" placeholder="Default input"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="items-center justify-center w-full mx-auto">
                                                <button type="submit" class="theme-btn btn-one mt-5">
                                                    {{ __('translate.Save Changes') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->
    <x-frontend.cta-subscribe />
</x-frontend-layout>

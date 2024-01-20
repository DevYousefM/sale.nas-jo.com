
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <div class="app-brand justify-content-center">
                    <a href="{{ route('admin.dashboard') }}" class="app-brand-link gap-2">
                      <span class="app-brand-logo demo">
                       {{-- <img src="{{ asset('assets') }}/svg/icons/logo.svg" style="    width: 100px;"> --}}
                       @php
                           $logo = @App\Models\General::first()->logo;
                       @endphp
                       <img src="{{asset("$logo")}}" style="    width: 100px;">
                      </span>
                    </a>
                  </div>

                  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                  </a>
                </div>

            <div class="menu-inner-shadow"></div>
            <ul class="menu-inner py-1">

                @if (Auth::guard('admin')->user()->hasPermission('subadmin-read'))
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div data-i18n="{{ __("admin.subadmins") }}">{{ __("admin.subadmins") }}</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('sub-admin.index') }}" class="menu-link" >
                                <div data-i18n="{{ __("admin.subadmins") }}">{{ __("admin.subadmins") }}</div>
                                </a>
                            </li>
                            @if (Auth::guard('admin')->user()->hasPermission('subadmin-create'))
                                <li class="menu-item">
                                    <a href="{{ route('sub-admin.create') }}" class="menu-link">
                                    <div data-i18n="{{ __("admin.add_new_subadmin") }}">{{ __("admin.add_new_subadmin") }}</div>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('country-read'))
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa-solid fa-globe menu-icon tf-icons"></i>
                        <div data-i18n="{{ __("admin.countries") }}">{{ __("admin.countries") }}</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('country.index') }}" class="menu-link" >
                                <div data-i18n="{{ __("admin.countries") }}">{{ __("admin.countries") }}</div>
                                </a>
                            </li>
                            @if (Auth::guard('admin')->user()->hasPermission('country-create'))
                                <li class="menu-item">
                                    <a href="{{ route('country.create') }}" class="menu-link">
                                    <div data-i18n="{{ __("admin.add_new_country") }}">{{ __("admin.add_new_country") }}</div>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

              @if (Auth::guard('admin')->user()->hasPermission('city-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa-solid fa-city menu-icon tf-icons"></i>
                    <div data-i18n="{{ __("admin.cities") }}">{{ __("admin.cities") }}</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('city.index') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.cities") }}">{{ __("admin.cities") }}</div>
                            </a>
                        </li>
                        @if (Auth::guard('admin')->user()->hasPermission('city-create'))
                            <li class="menu-item">
                                <a href="{{ route('city.create') }}" class="menu-link">
                                <div data-i18n="{{ __("admin.add_new_city") }}">{{ __("admin.add_new_city") }}</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
              @endif


            @if (Auth::guard('admin')->user()->hasPermission('client-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="{{ __("admin.clients") }}">{{ __("admin.clients") }}</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('client.index') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.clients") }}">{{ __("admin.clients") }}</div>
                            </a>
                        </li>
                        @if (Auth::guard('admin')->user()->hasPermission('client-create'))
                            <li class="menu-item">
                                <a href="{{ route('client.create') }}" class="menu-link">
                                <div data-i18n="{{ __("admin.add_new_client") }}">{{ __("admin.add_new_client") }}</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

              @if (Auth::guard('admin')->user()->hasPermission('feature-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-copy"></i>
                    <div data-i18n="{{ __("admin.features") }}">{{ __("admin.features") }}</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('feature.index') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.features") }}">{{ __("admin.features") }}</div>
                            </a>
                        </li>
                        @if (Auth::guard('admin')->user()->hasPermission('feature-create'))
                            <li class="menu-item">
                                <a href="{{ route('feature.create') }}" class="menu-link">
                                <div data-i18n="{{ __("admin.add_new_feature") }}">{{ __("admin.add_new_feature") }}</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
              @endif

            @if (Auth::guard('admin')->user()->hasPermission('category-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-copy"></i>
                    <div data-i18n="{{ __("admin.categories") }}">{{ __("admin.categories") }}</div>
                    </a>
                    <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('category.index') }}" class="menu-link" >
                        <div data-i18n="{{ __("admin.categories") }}">{{ __("admin.categories") }}</div>
                        </a>
                    </li>
                    @if (Auth::guard('admin')->user()->hasPermission('category-create'))
                        <li class="menu-item">
                            <a href="{{ route('category.create') }}" class="menu-link">
                            <div data-i18n="{{ __("admin.add_new_category") }}">{{ __("admin.add_new_category") }}</div>
                            </a>
                        </li>
                    @endif
                    </ul>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->hasPermission('subcategory-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-copy"></i>
                    <div data-i18n="{{ __("admin.subcategories") }}">{{ __("admin.subcategories") }}</div>
                    </a>
                    <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('sub-category.index') }}" class="menu-link" >
                        <div data-i18n="{{ __("admin.subcategories") }}">{{ __("admin.subcategories") }}</div>
                        </a>
                    </li>
                    @if (Auth::guard('admin')->user()->hasPermission('subcategory-create'))
                        <li class="menu-item">
                            <a href="{{ route('sub-category.create') }}" class="menu-link">
                            <div data-i18n="{{ __("admin.add_new_subcategory") }}">{{ __("admin.add_new_subcategory") }}</div>
                            </a>
                        </li>
                    @endif
                    </ul>
                </li>
            @endif


              @if (Auth::guard('admin')->user()->hasPermission('post-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-food-menu"></i>
                    <div data-i18n="{{ __("admin.posts") }}">{{ __("admin.posts") }}</div>
                    </a>
                    <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('post.index') }}" class="menu-link" >
                        <div data-i18n="{{ __("admin.posts") }}">{{ __("admin.posts") }}</div>
                        </a>
                    </li>


                        @if (Auth::guard('admin')->user()->hasPermission('post-create'))
                            <li class="menu-item">
                                <a href="{{ route('post.create') }}" class="menu-link">
                                <div data-i18n="{{ __("admin.add_new_post") }}">{{ __("admin.add_new_post") }}</div>
                                </a>
                            </li>
                        @endif
                        <li class="menu-item">
                        <a href="{{ route('get_app_setting') }}" class="menu-link" >
                        <div data-i18n="{{ __("admin.appsetting") }}">{{ __("admin.appsetting") }}</div>
                        </a>
                    </li>
                    </ul>
                </li>
              @endif

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="{{ __("admin.notifications") }}">{{ __("admin.notifications") }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('admin.notification') }}" class="menu-link" >
                        <div data-i18n="{{ __("admin.notifications") }}">{{ __("admin.notifications") }}</div>
                        </a>
                    </li>
                </ul>
            </li>


              @if (Auth::guard('admin')->user()->hasPermission('TermsAndConditions-read'))
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-food-menu"></i>
                  <div data-i18n="{{ __("admin.TermsAndConditions") }}">{{ __("admin.TermsAndConditions") }}</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('get_term') }}" class="menu-link" >
                        <div data-i18n="{{ __("admin.TermsAndConditions") }}">{{ __("admin.TermsAndConditions") }}</div>
                        </a>
                    </li>

                  </ul>
              </li>
            @endif

            @if (Auth::guard('admin')->user()->hasPermission('PrivacyPolicy-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-food-menu"></i>
                    <div data-i18n="{{ __("admin.PrivacyPolicy") }}">{{ __("admin.PrivacyPolicy") }}</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('get_policy') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.PrivacyPolicy") }}">{{ __("admin.PrivacyPolicy") }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->hasPermission('PrivacyPolicy-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-food-menu"></i>
                    <div data-i18n="{{ __("admin.WebSiteSetting") }}">{{ __("admin.WebSiteSetting") }}</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('get_website_setting') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.generalSetting") }}">{{ __("admin.generalSetting") }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->hasPermission('PrivacyPolicy-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-food-menu"></i>
                    <div data-i18n="{{ __("admin.about_us") }}">{{ __("admin.about_us") }}</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('get_about_us') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.about_us") }}">{{ __("admin.about_us") }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="{{ __("admin.messages") }}">{{ __("admin.messages") }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('contact-us.index') }}" class="menu-link" >
                        <div data-i18n="{{ __("admin.messages") }}">{{ __("admin.messages") }}</div>
                        </a>
                    </li>
                </ul>
            </li>

            @if (Auth::guard('admin')->user()->hasPermission('PrivacyPolicy-read'))
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-food-menu"></i>
                    <div data-i18n="{{ __("admin.slider") }}">{{ __("admin.slider") }}</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('slider.index') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.slider") }}">{{ __("admin.slider") }}</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('slider.create') }}" class="menu-link" >
                            <div data-i18n="{{ __("admin.add_new_slider") }}">{{ __("admin.add_new_slider") }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            </ul>
          </aside>
          <!-- / Menu -->

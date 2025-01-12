<div id="top-navbar">
    <div class="p-3 top-navbar">
        <div class="d-inline-flex w-100">
            <div class="ms-auto d-inline-flex align-items-center position-relative gap-4">
                <!-- Language Switcher -->
                <x-admin.language-switcher/>
                <!-- End Language Switcher -->

                <!-- Profile Info -->
                <div class="profile-info-wrapper mx-2">
                    <div x-data="{ dropdownOpen: false }" class="position-relative d-flex align-items-center gap-2">
                        <img src="{{ auth()->user()->getProfileAvatar() }}"
                             alt="{{ __('admin.top_navbar.profile_information.avatar_alt') }} {{ auth()->user()->full_name }}"
                             class="rounded-circle cursor-pointer object-fit-cover profile-avatar" width="42px"
                             height="42px" @click="dropdownOpen = !dropdownOpen">
                        <div class="d-flex flex-column gap-0 profile-information">
                            <strong>{{ auth()->user()->full_name }}</strong>
                            @foreach(auth()->user()->roles as $role)
                                <p class="m-0 role">{{ '@' . $role->name }}</p>
                                @unless($loop->last)
                                    ,
                                @endunless
                            @endforeach
                        </div>
                        <div class="position-relative">
                            <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false"
                                 class="position-absolute end-0 mt-4 py-2 rounded-3 z-3 bg-secondary shadow profile-dropdown-wrapper"
                                 style="width: 175px;">
                                <div class="profile-dropdown">
                                    <a href="#"
                                       class="d-block px-2 py-1 text-decoration-none mw-100 user-dropdown-hover text-white">
                                        <i class="fa fa-cog me-2"></i>
                                        {{ __('admin.top_navbar.profile_information.settings') }}
                                    </a>
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="border-0 user-dropdown-hover bg-secondary w-100 py-1 text-start px-2 text-danger text-decoration-none">
                                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                        {{ __('admin.top_navbar.profile_information.logout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Profile Info -->
            </div>
        </div>
    </div>
</div>

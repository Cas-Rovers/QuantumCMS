<div id="top-navbar">
    <div class="p-3 top-navbar">
        <div class="d-inline-flex w-100">
            <div class="ms-auto d-inline-flex align-items-center position-relative gap-4">
                <!-- Language Switcher -->
                <x-admin::LanguageSwitcher/>
                <!-- End Language Switcher -->

                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Hallo</button>
                </form>
                <!-- Profile Info -->
                <div>
                    <!-- Profile info here. -->
                </div>
                <!-- End Profile Info -->
            </div>
        </div>
    </div>
</div>

<x-app-layout>
    <div>
        <x-main-banner/>

        <section>
            <picture>
                <source media="(min-width: 768px)" srcset="{{ asset('/images/portadas/banner_login.jpg') }}">
                <img src="{{ asset('/images/portadas/banner_login_sm.jpg') }}" alt="Bienvenido a la quiniela" class="w-full">
            </picture>
        </section>

        <div class="h-4 md:h-8 w-full"></div>

        <section>
            <picture>
                <source media="(min-width: 640px)" srcset="{{ asset('/images/decoracion/banner-grupos.jpg') }}">
                <img src="{{ asset('/images/decoracion/banner-grupos-sm.jpg') }}" alt="" class="w-full">
            </picture>
        </section>
    </div>
</x-app-layout>

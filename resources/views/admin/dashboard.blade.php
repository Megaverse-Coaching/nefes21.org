<x-base-layout>
    @if(!Auth::guard('admin')->check())
        @php
            header("Location: " . URL::to('/admin/login'), true, 302);
            exit();
        @endphp
    @else
        @auth
            <p>{{ Auth::getDefaultDriver() }} </p>
            <span>{{ auth()->user()->email }}</span>
        @endauth
    @endif
</x-base-layout>

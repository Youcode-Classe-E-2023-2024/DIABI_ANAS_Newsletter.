<x-mail::message>
    # Introduction
    @foreach ($subs as $sub)
        {{ $sub->email }} <br>
    @endforeach

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>

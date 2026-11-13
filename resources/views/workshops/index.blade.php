@extends('layouts.app')

@section('title', __('workshops.title'))

@section('content')
<main class="workshop-list">
    <header class="workshop-list__header">
        <h1 class="workshop-list__title">@lang('workshops.title')</h1>
        <p class="workshop-list__subtitle">@lang('workshops.subtitle')</p>

        <p class="workshop-list__lang">
            <a class="workshop-list__lang-link" href="?lang=th">ไทย</a> |
            <a class="workshop-list__lang-link" href="?lang=en">EN</a>
        </p>
    </header>

    <div class="workshop-list-filter">
        <button type="button" class="workshop-list-filter__tab workshop-list-filter__tab--active" data-category="all">@lang('workshops.all')</button>
        @foreach ($categories as $category)
        <button type="button" class="workshop-list-filter__tab" data-category="{{ $category }}">{{ Lang::has("workshops.categories.$category") ? __("workshops.categories.$category") : $category }}</button>
        @endforeach
    </div>

    <p class="workshop-list__count">
    @lang('workshops.showing', [
        'shown' => '<span class="workshop-list__count-shown">' . count($workshops) . '</span>',
        'total' => '<span class="workshop-list__count-total">' . count($workshops) . '</span>',
    ])
    </p>

    <div class="workshop-list__grid">
        @forelse ($workshops as $workshop)
            @include('workshops.partials.card', ['workshop' => $workshop])
        @empty
            <p class="workshop-list__empty">@lang('workshops.empty')</p>
        @endforelse
    </div>
</main>
@endsection

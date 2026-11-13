@php
    $title = Lang::hasForLocale('workshops.titles.' . $workshop['id'])
        ? __('workshops.titles.' . $workshop['id'])
        : $workshop['title'];

    $categoryLabels = collect($workshop['categories'])->map(
        fn ($c) => Lang::has("workshops.categories.$c") ? __("workshops.categories.$c") : $c
    );

    $locationLabels = collect($workshop['locations'])->map(
        fn ($l) => Lang::has("workshops.locations.$l") ? __("workshops.locations.$l") : $l
    );
@endphp

<article class="workshop-list-card"
         data-categories="{{ implode('|', $workshop['categories']) }}">

    <div class="workshop-list-card__media">
        @if ($workshop['image'])
            <img class="workshop-list-card__image"
                 src="{{ asset('images/workshops/' . $workshop['image']) }}"
                 alt="{{ $title }}">
        @else
            <div class="workshop-list-card__placeholder" role="img" aria-label="@lang('workshops.no_image')">
                <svg class="workshop-list-card__placeholder-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <path d="M21 15l-5-5L5 21"></path>
                    <path d="M4 4l16 16"></path>
                </svg>
            </div>
        @endif

        @if ($workshop['featured'])
            <span class="workshop-list-card__badge">@lang('workshops.featured')</span>
        @endif
    </div>

    <div class="workshop-list-card__body">
        <h2 class="workshop-list-card__title" title="{{ $title }}">
            {{ $title }}
        </h2>
        <p class="workshop-list-card__category">@lang('workshops.category') : {{ $categoryLabels->implode(', ') }}</p>
        <p class="workshop-list-card__location">@lang('workshops.location') : {{ $locationLabels->implode(' · ') }}</p>
        <button type="button" class="workshop-list-card__button">@lang('workshops.enroll')</button>
    </div>
</article>

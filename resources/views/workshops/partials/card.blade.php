<article class="workshop-list-card"
         data-categories="{{ implode('|', $workshop['categories']) }}">

    <div class="workshop-list-card__media">
        @if ($workshop['image'])
            <img class="workshop-list-card__image"
                 src="{{ asset('images/workshops/' . $workshop['image']) }}"
                 alt="{{ $workshop['title'] }}">
        @else
            <!-- <div class="workshop-list-card__placeholder">ไม่มีรูป</div> -->
            <div class="workshop-list-card__placeholder" role="img" aria-label="ไม่มีรูป">
                <svg class="workshop-list-card__placeholder-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <path d="M21 15l-5-5L5 21"></path>
                </svg>
            </div>
        @endif

        @if ($workshop['featured'])
            <span class="workshop-list-card__badge">แนะนำ</span>
        @endif
    </div>

    <div class="workshop-list-card__body">
        <h2 class="workshop-list-card__title" title="{{ $workshop['title'] }}">
            {{ $workshop['title'] }}
        </h2>
        <p class="workshop-list-card__category">หมวด : {{ implode(', ', $workshop['categories']) }}</p>
        <p class="workshop-list-card__location">สถานที่ : {{ implode(' · ', $workshop['locations']) }}</p>
        <button type="button" class="workshop-list-card__button">สมัครเรียน</button>
    </div>
</article>

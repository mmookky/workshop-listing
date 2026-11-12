@extends('layouts.app')

@section('title', 'เวิร์กช็อปของเรา')

@section('content')
<main class="workshop-list">
    <header class="workshop-list__header">
        <h1 class="workshop-list__title">เวิร์กช็อปของเรา</h1>
        <p class="workshop-list__subtitle">เลือกเรียนสิ่งที่ใช่ จากหลากหลายหมวดหมู่</p>
    </header>

    <div class="workshop-list-filter">
        <button type="button" class="workshop-list-filter__tab is-active" data-category="all">ทั้งหมด</button>
        @foreach ($categories as $category)
            <button type="button" class="workshop-list-filter__tab" data-category="{{ $category }}">{{ $category }}</button>
        @endforeach
    </div>

    <p class="workshop-list__count">
         แสดง <span class="workshop-list__count-shown">{{ count($workshops) }}</span>
         จาก <span class="workshop-list__count-total">{{ count($workshops) }}</span> รายการ
    </p>

    <div class="workshop-list__grid">
        @forelse ($workshops as $workshop)
            @include('workshops.partials.card', ['workshop' => $workshop])
        @empty
            <p class="workshop-list__empty">ยังไม่มีเวิร์กช็อป</p>
        @endforelse
    </div>
</main>
@endsection

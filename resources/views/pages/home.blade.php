@extends('layouts.app')

@section('page', 'home')
@section('title', 'Financial Planning, Wealth Management & Investment Advice')

@section('content')
    <!-- 1. Hero -->
    @include('sections.hero')

    <!-- 2. Stats Strip -->
    @include('sections.stats')

    <!-- 3. About Us -->
    @include('sections.about')

    <!-- 4. Services Tabs -->
    @include('sections.services-tabs')

    <!-- 5. Core Strengths Bento -->
    @include('sections.strengths')

    <!-- 6. Who We Serve (Horizontal Track) -->
    @include('sections.audiences')

    <!-- 7. Infinite Marquee -->
    @include('sections.marquee')

    <!-- 8. Why Fincun -->
    @include('sections.why')

    <!-- 9. Team -->
    @include('sections.team')

    <!-- 10. Wealth Journal -->
    @include('sections.journal')

    <!-- 11. Our Promise -->
    @include('sections.promise')
@endsection

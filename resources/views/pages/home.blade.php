@extends('layouts.app')

@section('page', 'home')
@section('title', 'Financial Planning, Wealth Management & Investment Advice')

@section('content')
    <!-- 1. Hero Asymmetric Split Banner -->
    @include('sections.hero')

    <!-- 2. Core Operational Stats Strip (Restored) -->
    @include('sections.stats')

    <!-- 3. Three-Pillar Trust Strip -->
    @include('sections.trust-bar')

    <!-- 3. About Us & Foundational Mission -->
    @include('sections.about')

    <!-- 4. Offerings Catalog with Filter Tabs (Wireframe) -->
    @include('sections.offerings-catalog')

    <!-- 5. Interactive Services Deep Dive Tabs -->
    @include('sections.services-tabs')

    <!-- 6. User Guide for First Timer (4-Step Methodology) (Wireframe) -->
    @include('sections.guide-steps')

    <!-- 7. Core Strengths Bento Grid -->
    @include('sections.strengths')

    <!-- 8. Who We Serve (Client Profile Segments) -->
    @include('sections.audiences')

    <!-- 9. Infinite Trust Credentials Marquee -->
    @include('sections.marquee')

    <!-- 10. Satisfied Clients Speak (Wireframe Testimonials) -->
    @include('sections.testimonials')

    <!-- 11. Impact Stats & Regional Transformation Story (Wireframe) -->
    @include('sections.impact-spotlight')

    <!-- 12. Why Fincun & 3 Approach Steps -->
    @include('sections.why')

    <!-- 13. Certified Leadership Team -->
    @include('sections.team')

    <!-- 14. Blog Section / Wealth Journal (Wireframe) -->
    @include('sections.journal')

    <!-- 15. Services (3 Feature Cards: 01 Dark, 02 Light, 03 Light) (Wireframe) -->
    @include('sections.bottom-services')
@endsection

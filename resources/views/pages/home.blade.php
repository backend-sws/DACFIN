@extends('layouts.app')

@section('page', 'home')
@section('title', 'Financial Planning, Wealth Management & Investment Advice')

@section('content')
    <!-- 1. Hero Asymmetric Split Banner (Wireframe Section 1) -->
    @include('sections.hero')

    <!-- 2. Three-Pillar Trust Strip (Wireframe Section 2) -->
    @include('sections.trust-bar')

    <!-- 3. Offerings Catalog with Filter Tabs (Wireframe Section 3) -->
    @include('sections.offerings-catalog')

    <!-- 4. User Guide for First Timer (4-Step Methodology) (Wireframe Section 4) -->
    @include('sections.guide-steps')

    <!-- 5. Satisfied Clients Speak (Testimonials & Layered Cards) (Wireframe Section 5) -->
    @include('sections.testimonials')

    <!-- 6. Impact Stats & Regional Transformation Story (Wireframe Section 6) -->
    @include('sections.impact-spotlight')

    <!-- 7. Blog Section / Wealth Journal (Wireframe Section 7) -->
    @include('sections.journal')

    <!-- 8. Services (3 Feature Cards: 01 Dark, 02 Light, 03 Light) (Wireframe Section 8) -->
    @include('sections.bottom-services')
@endsection

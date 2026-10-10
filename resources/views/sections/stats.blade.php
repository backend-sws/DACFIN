@php
    $stats = config('fincun.home.stats');
@endphp

<section class="relative z-20 -mt-10 sm:-mt-14 mb-8">
    <div class="container-x">
        <div class="rounded-3xl sm:rounded-[2.5rem] bg-cream border border-sand shadow-xl p-6 sm:p-10 text-ink grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 items-center divide-y sm:divide-y-0 sm:divide-x divide-sand/80" data-reveal="up">
            @foreach($stats as $stat)
                <div class="pt-4 sm:pt-0 sm:px-6 first:pt-0 first:pl-0 last:pr-0">
                    <x-ui.counter 
                        :value="$stat['value'] ?? null" 
                        :text="$stat['text'] ?? null" 
                        :pad="$stat['pad'] ?? false" 
                        :label="$stat['label']" 
                    />
                </div>
            @endforeach
        </div>
    </div>
</section>

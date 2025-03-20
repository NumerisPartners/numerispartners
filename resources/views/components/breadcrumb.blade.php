@props(['title'])
<div class="breadcrumb-area bg-cover bg-center">
    <div class="container">
        <div class="breadcrumb-inner">
        <div class="row justify-content-center">
            <div class="custom-md:w-1/2">
                <h1 class="page-title">{{ $title }}</h1>
            </div>
            <div class="custom-md:w-1/2    custom-md:!text-end">
                <ul class="page-list">
                    <li class="flext inline-flex items-center">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="mx-2">
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </span>
                    </li>
                    <li>{{ $title }}</li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
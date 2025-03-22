@props(['title'])
<div class="breadcrumb-area pt-32  pb-12  md:pt-44  md:pb-26 bg-gradient-to-r from-blue-50 to-slate-50 dark:bg-gradient-to-r dark:from-[#3e2485] dark:to-[#0e032d]">
    <div class="container">
        <div class="breadcrumb-inner">
        <div class="row justify-content-center">
            <div class="custom-md:w-1/2">
                <h1 class="page-title dark:text-white">{{ $title }}</h1>
            </div>
            <div class="custom-md:w-1/2    custom-md:!text-end">
                <ul class="page-list">
                    <li class="flext inline-flex items-center">
                        <a href="{{ route('home') }}" class="dark:text-white">Accueil</a>
                        <span class="mx-2">
                            <svg class="h-6 w-6 text-gray-500 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </span>
                    </li>
                    <li class="dark:text-white">{{ $title }}</li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Todo App'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            @layer theme {

                :root,
                :host {
                    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                    --color-slate-50: oklch(.984 .003 247.858);
                    --color-slate-100: oklch(.968 .007 247.896);
                    --color-slate-200: oklch(.929 .013 255.508);
                    --color-slate-300: oklch(.869 .022 252.894);
                    --color-slate-400: oklch(.704 .04 256.788);
                    --color-slate-500: oklch(.554 .046 257.417);
                    --color-slate-600: oklch(.446 .043 257.281);
                    --color-slate-700: oklch(.372 .044 257.287);
                    --color-slate-800: oklch(.279 .041 260.031);
                    --color-slate-900: oklch(.208 .042 265.755);
                    --color-slate-950: oklch(.129 .042 264.695);
                    --color-gray-50: oklch(.985 .002 247.839);
                    --color-gray-100: oklch(.967 .003 264.542);
                    --color-gray-200: oklch(.928 .006 264.531);
                    --color-gray-300: oklch(.872 .01 258.338);
                    --color-gray-400: oklch(.707 .022 261.325);
                    --color-gray-500: oklch(.551 .027 264.364);
                    --color-gray-600: oklch(.446 .03 256.802);
                    --color-gray-700: oklch(.373 .034 259.733);
                    --color-gray-800: oklch(.278 .033 256.848);
                    --color-gray-900: oklch(.21 .034 264.665);
                    --color-gray-950: oklch(.13 .028 261.692);
                    --color-blue-50: oklch(.97 .014 254.604);
                    --color-blue-100: oklch(.932 .032 255.585);
                    --color-blue-200: oklch(.882 .059 254.128);
                    --color-blue-300: oklch(.809 .105 251.813);
                    --color-blue-400: oklch(.707 .165 254.624);
                    --color-blue-500: oklch(.623 .214 259.815);
                    --color-blue-600: oklch(.546 .245 262.881);
                    --color-blue-700: oklch(.488 .243 264.376);
                    --color-blue-800: oklch(.424 .199 265.638);
                    --color-blue-900: oklch(.379 .146 265.522);
                    --color-blue-950: oklch(.282 .091 267.935);
                    --color-green-50: oklch(.982 .018 155.826);
                    --color-green-100: oklch(.962 .044 156.743);
                    --color-green-200: oklch(.925 .084 155.995);
                    --color-green-300: oklch(.871 .15 154.449);
                    --color-green-400: oklch(.792 .209 151.711);
                    --color-green-500: oklch(.723 .219 149.579);
                    --color-green-600: oklch(.627 .194 149.214);
                    --color-green-700: oklch(.527 .154 150.069);
                    --color-green-800: oklch(.448 .119 151.328);
                    --color-green-900: oklch(.393 .095 152.535);
                    --color-green-950: oklch(.266 .065 152.934);
                    --color-red-50: oklch(.971 .013 17.38);
                    --color-red-100: oklch(.936 .032 17.717);
                    --color-red-200: oklch(.885 .062 18.334);
                    --color-red-300: oklch(.808 .114 19.571);
                    --color-red-400: oklch(.704 .191 22.216);
                    --color-red-500: oklch(.637 .237 25.331);
                    --color-red-600: oklch(.577 .245 27.325);
                    --color-red-700: oklch(.505 .213 27.518);
                    --color-red-800: oklch(.444 .177 26.899);
                    --color-red-900: oklch(.396 .141 25.723);
                    --color-red-950: oklch(.258 .092 26.042);
                    --color-amber-50: oklch(.987 .022 95.277);
                    --color-amber-100: oklch(.962 .059 95.617);
                    --color-amber-200: oklch(.924 .12 95.746);
                    --color-amber-300: oklch(.879 .169 91.605);
                    --color-amber-400: oklch(.828 .189 84.429);
                    --color-amber-500: oklch(.769 .188 70.08);
                    --color-amber-600: oklch(.666 .179 58.318);
                    --color-amber-700: oklch(.555 .163 48.998);
                    --color-amber-800: oklch(.473 .137 46.201);
                    --color-amber-900: oklch(.414 .112 45.904);
                    --color-amber-950: oklch(.279 .077 45.635);
                    --color-black: #000;
                    --color-white: #fff;
                    --spacing: .25rem;
                    --radius-sm: .25rem;
                    --radius-md: .375rem;
                    --radius-lg: .5rem;
                    --text-sm: .875rem;
                    --text-base: 1rem;
                    --text-lg: 1.125rem;
                    --text-xl: 1.25rem;
                    --text-2xl: 1.5rem;
                    --font-weight-medium: 500;
                    --font-weight-semibold: 600;
                    --font-weight-bold: 700;
                    --shadow-sm: 0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;
                    --shadow-md: 0 4px 6px -1px #0000001a, 0 2px 4px -2px #0000001a;
                    --shadow-lg: 0 10px 15px -3px #0000001a, 0 4px 6px -4px #0000001a
                }
            }

            @layer base {

                *,
                :after,
                :before,
                ::backdrop {
                    box-sizing: border-box;
                    border: 0 solid;
                    margin: 0;
                    padding: 0
                }

                html,
                :host {
                    line-height: 1.5;
                    font-family: var(--font-sans)
                }

                body {
                    line-height: inherit
                }
            }

            @layer utilities {
                .container {
                    max-width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                    padding-left: 1rem;
                    padding-right: 1rem
                }

                @media (min-width:640px) {
                    .container {
                        max-width: 640px
                    }
                }

                @media (min-width:768px) {
                    .container {
                        max-width: 768px
                    }
                }

                @media (min-width:1024px) {
                    .container {
                        max-width: 1024px
                    }
                }

                @media (min-width:1280px) {
                    .container {
                        max-width: 1280px
                    }
                }

                .bg-white {
                    background-color: var(--color-white)
                }

                .bg-gray-50 {
                    background-color: var(--color-gray-50)
                }

                .bg-gray-100 {
                    background-color: var(--color-gray-100)
                }

                .bg-blue-50 {
                    background-color: var(--color-blue-50)
                }

                .bg-blue-500 {
                    background-color: var(--color-blue-500)
                }

                .bg-green-50 {
                    background-color: var(--color-green-50)
                }

                .bg-green-500 {
                    background-color: var(--color-green-500)
                }

                .bg-red-50 {
                    background-color: var(--color-red-50)
                }

                .bg-red-500 {
                    background-color: var(--color-red-500)
                }

                .text-gray-600 {
                    color: var(--color-gray-600)
                }

                .text-gray-700 {
                    color: var(--color-gray-700)
                }

                .text-gray-800 {
                    color: var(--color-gray-800)
                }

                .text-gray-900 {
                    color: var(--color-gray-900)
                }

                .text-blue-600 {
                    color: var(--color-blue-600)
                }

                .text-green-600 {
                    color: var(--color-green-600)
                }

                .text-red-600 {
                    color: var(--color-red-600)
                }

                .text-white {
                    color: var(--color-white)
                }

                .p-1 {
                    padding: calc(var(--spacing)*1)
                }

                .p-2 {
                    padding: calc(var(--spacing)*2)
                }

                .p-3 {
                    padding: calc(var(--spacing)*3)
                }

                .p-4 {
                    padding: calc(var(--spacing)*4)
                }

                .p-6 {
                    padding: calc(var(--spacing)*6)
                }

                .p-8 {
                    padding: calc(var(--spacing)*8)
                }

                .px-2 {
                    padding-left: calc(var(--spacing)*2);
                    padding-right: calc(var(--spacing)*2)
                }

                .px-3 {
                    padding-left: calc(var(--spacing)*3);
                    padding-right: calc(var(--spacing)*3)
                }

                .px-4 {
                    padding-left: calc(var(--spacing)*4);
                    padding-right: calc(var(--spacing)*4)
                }

                .px-6 {
                    padding-left: calc(var(--spacing)*6);
                    padding-right: calc(var(--spacing)*6)
                }

                .py-2 {
                    padding-top: calc(var(--spacing)*2);
                    padding-bottom: calc(var(--spacing)*2)
                }

                .py-3 {
                    padding-top: calc(var(--spacing)*3);
                    padding-bottom: calc(var(--spacing)*3)
                }

                .py-4 {
                    padding-top: calc(var(--spacing)*4);
                    padding-bottom: calc(var(--spacing)*4)
                }

                .py-6 {
                    padding-top: calc(var(--spacing)*6);
                    padding-bottom: calc(var(--spacing)*6)
                }

                .py-8 {
                    padding-top: calc(var(--spacing)*8);
                    padding-bottom: calc(var(--spacing)*8)
                }

                .m-1 {
                    margin: calc(var(--spacing)*1)
                }

                .m-2 {
                    margin: calc(var(--spacing)*2)
                }

                .m-4 {
                    margin: calc(var(--spacing)*4)
                }

                .mb-2 {
                    margin-bottom: calc(var(--spacing)*2)
                }

                .mb-4 {
                    margin-bottom: calc(var(--spacing)*4)
                }

                .mb-6 {
                    margin-bottom: calc(var(--spacing)*6)
                }

                .mb-8 {
                    margin-bottom: calc(var(--spacing)*8)
                }

                .mt-4 {
                    margin-top: calc(var(--spacing)*4)
                }

                .mt-8 {
                    margin-top: calc(var(--spacing)*8)
                }

                .ml-2 {
                    margin-left: calc(var(--spacing)*2)
                }

                .mr-2 {
                    margin-right: calc(var(--spacing)*2)
                }

                .text-sm {
                    font-size: var(--text-sm)
                }

                .text-base {
                    font-size: var(--text-base)
                }

                .text-lg {
                    font-size: var(--text-lg)
                }

                .text-xl {
                    font-size: var(--text-xl)
                }

                .text-2xl {
                    font-size: var(--text-2xl)
                }

                .font-medium {
                    font-weight: var(--font-weight-medium)
                }

                .font-semibold {
                    font-weight: var(--font-weight-semibold)
                }

                .font-bold {
                    font-weight: var(--font-weight-bold)
                }

                .border {
                    border-width: 1px;
                    border-style: solid;
                    border-color: var(--color-gray-300)
                }

                .border-gray-200 {
                    border-color: var(--color-gray-200)
                }

                .border-gray-300 {
                    border-color: var(--color-gray-300)
                }

                .rounded {
                    border-radius: var(--radius-sm)
                }

                .rounded-md {
                    border-radius: var(--radius-md)
                }

                .rounded-lg {
                    border-radius: var(--radius-lg)
                }

                .shadow-sm {
                    box-shadow: var(--shadow-sm)
                }

                .shadow-md {
                    box-shadow: var(--shadow-md)
                }

                .shadow-lg {
                    box-shadow: var(--shadow-lg)
                }

                .flex {
                    display: flex
                }

                .inline-flex {
                    display: inline-flex
                }

                .block {
                    display: block
                }

                .hidden {
                    display: none
                }

                .w-full {
                    width: 100%
                }

                .max-w-md {
                    max-width: 28rem
                }

                .max-w-2xl {
                    max-width: 42rem
                }

                .max-w-4xl {
                    max-width: 56rem
                }

                .min-h-screen {
                    min-height: 100vh
                }

                .items-center {
                    align-items: center
                }

                .items-start {
                    align-items: flex-start
                }

                .justify-center {
                    justify-content: center
                }

                .justify-between {
                    justify-content: space-between
                }

                .space-x-2>:not([hidden])~:not([hidden]) {
                    margin-left: calc(var(--spacing)*2)
                }

                .space-x-4>:not([hidden])~:not([hidden]) {
                    margin-left: calc(var(--spacing)*4)
                }

                .space-y-2>:not([hidden])~:not([hidden]) {
                    margin-top: calc(var(--spacing)*2)
                }

                .space-y-4>:not([hidden])~:not([hidden]) {
                    margin-top: calc(var(--spacing)*4)
                }

                .space-y-6>:not([hidden])~:not([hidden]) {
                    margin-top: calc(var(--spacing)*6)
                }

                .hover\\:bg-blue-600:hover {
                    background-color: var(--color-blue-600)
                }

                .hover\\:bg-red-600:hover {
                    background-color: var(--color-red-600)
                }

                .hover\\:bg-green-600:hover {
                    background-color: var(--color-green-600)
                }

                .focus\\:outline-none:focus {
                    outline: none
                }

                .focus\\:ring-2:focus {
                    box-shadow: 0 0 0 2px var(--color-blue-500)
                }

                .transition {
                    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
                    transition-timing-function: cubic-bezier(.4, 0, .2, 1);
                    transition-duration: .15s
                }

                .line-through {
                    text-decoration-line: line-through
                }
            }
        </style>
    @endif

    @stack('styles')
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="container max-w-4xl py-8">
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>
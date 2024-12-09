<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- GSAP for animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        /* Black overlay and transition */
        .page-transition {
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            background: #000;
            z-index: 1000;
            transform: scaleX(0);
            transform-origin: left;
        }

        /* Text "Barvio" within the black overlay */
        .transition-text {
            font-size: 4rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;  /* Start hidden */
            z-index: 1001;  /* Above the black overlay */
        }
       .transition-sub {
            font-size: 3rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;  /* Start hidden */
            z-index: 1001;  /* Above the black overlay */
        }

        /* Main content wrapper */
        .content-wrapper {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page transition overlay with "Barvio" text -->
        <div class="page-transition">
            <div class="transition-text">Barvio</div>
                        <div class="transition-sub">Ecologic colors without oil</div>

        </div>

        @include('layouts.navigation')

        <main class="content-wrapper">
            @yield('content')
        </main>
        @include('components.footer')
    </div>

    <!-- Page Transition Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pageTransition = document.querySelector('.page-transition');
            const contentWrapper = document.querySelector('.content-wrapper');
            const transitionText = document.querySelector('.transition-text');
            const transitionSub = document.querySelector('.transition-sub');

            // GSAP animation for page transition
            const tl = gsap.timeline({
                onComplete: () => {
                    contentWrapper.style.opacity = 1; // Show the content after transition
                }
            });

            // Transition animation for the black overlay
            tl.to(pageTransition, { scaleX: 1, duration: 1.5, transformOrigin: 'left' })  // Expand black overlay

            // Animate the "Barvio" text within the black overlay
            .to(transitionText, {
                opacity: 1, // Show text
                y: -50, // Move it slightly up
                duration: 1.5,
                ease: "power3.out",
            })   .to(transitionSub, {
                opacity: 1, // Show text
                y: -50, // Move it slightly up
                duration: 1.5,

                ease: "power3.out",
            }) 
            .to(transitionText, {
                opacity: 0, // Show text
                y: -50, // Move it slightly up
                duration: 0.5,
                ease: "power3.out",
            })  
            .to(transitionSub, {
                opacity: 0, // Show text
                y: -50, // Move it slightly up
                duration:0.5,
                ease: "power3.in",
            })
         
            .to(pageTransition, { scaleX: 0, duration: 1.5, transformOrigin: 'right', });  // Shrink black overlay
          
        });
    </script>
</body>
</htm

<?php
    require_once('app/init/init-login.php');
    
    //session_start();  
    if(isset($_COOKIE["token"]))  {  
        header("location: app/index.php");  
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/png" href="app/icons/favicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="landing/dist/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
                                <img src="app/icons/check.v3.svg" alt="" class="logo">
                                <style>
                                    div.brand img.logo {
                                        height: 40px;
                                        width: auto;
                                    }
                                </style>
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero text-center">
                <div class="container-sm">
                    <div class="hero-inner">
                        <h1 class="hero-title h2-mobile mt-0 is-revealing">Tasks</h1>
                        <p class="hero-paragraph is-revealing">Get things done with a modern and minimal task manager.</p>
                        
                        <a class="button button-primary button-shadow" href="login.php?action=register">Signup</a> 
                        <a class="button button-primary button-shadow" href="login.php">Login</a>
                        <div class="hero-browser">
                            <div class="bubble-3 is-revealing">
                                <svg width="427" height="286" viewBox="0 0 427 286" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M213.5 286C331.413 286 427 190.413 427 72.5S304.221 16.45 186.309 16.45C68.396 16.45 0-45.414 0 72.5S95.587 286 213.5 286z" id="bubble-3-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-3-b" fill="#fff">
                                            <use xlink:href="#bubble-3-a"/>
                                        </mask>
                                        <use fill="#4E8FF8" xlink:href="#bubble-3-a"/>
                                        <path d="M64.5 129.77c117.913 0 213.5-95.588 213.5-213.5 0-117.914-122.779-56.052-240.691-56.052C-80.604-139.782-149-201.644-149-83.73c0 117.913 95.587 213.5 213.5 213.5z" fill="#1274ED" mask="url(#bubble-3-b)"/>
                                        <path d="M381.5 501.77c117.913 0 213.5-95.588 213.5-213.5 0-117.914-122.779-56.052-240.691-56.052C236.396 232.218 168 170.356 168 288.27c0 117.913 95.587 213.5 213.5 213.5z" fill="#75ABF3" mask="url(#bubble-3-b)"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="bubble-4 is-revealing">
                                <svg width="230" height="235" viewBox="0 0 230 235" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M196.605 234.11C256.252 234.11 216 167.646 216 108 216 48.353 167.647 0 108 0S0 48.353 0 108s136.959 126.11 196.605 126.11z" id="bubble-4-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-4-b" fill="#fff">
                                            <use xlink:href="#bubble-4-a"/>
                                        </mask>
                                        <use fill="#7CE8DD" xlink:href="#bubble-4-a"/>
                                        <circle fill="#3BDDCC" mask="url(#bubble-4-b)" cx="30" cy="108" r="108"/>
                                        <circle fill="#B1F1EA" opacity=".7" mask="url(#bubble-4-b)" cx="265" cy="88" r="108"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="hero-browser-inner is-revealing">
                                <!--<svg width="800" height="450" viewBox="0 0 800 450" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="browser-a">
                                            <stop stop-color="#F6F8FA" stop-opacity=".48" offset="0%"/>
                                            <stop stop-color="#F6F8FA" offset="100%"/>
                                        </linearGradient>
                                        <linearGradient x1="50%" y1="100%" x2="50%" y2="0%" id="browser-b">
                                            <stop stop-color="#F6F8FA" stop-opacity=".48" offset="0%"/>
                                            <stop stop-color="#F6F8FA" offset="100%"/>
                                        </linearGradient>
                                        <linearGradient x1="100%" y1="-12.816%" x2="0%" y2="-12.816%" id="browser-c">
                                            <stop stop-color="#F6F8FA" stop-opacity="0" offset="0%"/>
                                            <stop stop-color="#E3E7EB" offset="50.045%"/>
                                            <stop stop-color="#F6F8FA" stop-opacity="0" offset="100%"/>
                                        </linearGradient>
                                        <filter x="-500%" y="-500%" width="1000%" height="1000%" filterUnits="objectBoundingBox" id="dropshadow-1">
                                            <feOffset dy="16" in="SourceAlpha" result="shadowOffsetOuter"/>
                                            <feGaussianBlur stdDeviation="24" in="shadowOffsetOuter" result="shadowBlurOuter"/>
                                            <feColorMatrix values="0 0 0 0 0.12 0 0 0 0 0.17 0 0 0 0 0.21 0 0 0 0.2 0" in="shadowBlurOuter"/>
                                        </filter>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <rect width="800" height="450" rx="4" fill="#FFF" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)"/>
                                        <rect width="800" height="450" rx="4" fill="#FFF"/>
                                        <g fill="url(#browser-a)" transform="translate(47 67)">
                                            <path d="M146 0h122v122H146zM0 0h122v122H0zM292 0h122v122H292zM438 0h122v122H438zM584 0h122v122H584z"/>
                                        </g>
                                        <g transform="translate(47 239)" fill="url(#browser-b)">
                                            <path d="M146 0h122v122H146zM0 0h122v122H0zM292 0h122v122H292zM438 0h122v122H438zM584 0h122v122H584z"/>
                                        </g>
                                        <path fill="url(#browser-c)" d="M0 146h706v2H0z" transform="translate(47 67)"/>
                                        <g transform="translate(0 12)">
                                            <circle fill="#FF6D8B" cx="36" cy="4" r="4"/>
                                            <circle fill="#FFCB4F" cx="52" cy="4" r="4"/>
                                            <circle fill="#7CE8DD" cx="68" cy="4" r="4"/>
                                            <path fill="url(#browser-c)" d="M0 20h800v2H0z"/>
                                            <path fill="#E3E7EB" d="M742 2h24v4h-24z"/>
                                        </g>
                                        <g>
                                            <path fill="#F6F8FA" d="M47 385h706v32H47z"/>
                                            <path fill="#E3E7EB" d="M356 399h88v4h-88z"/>
                                        </g>
                                    </g>
                                </svg>-->
                                <img src="landing/dist/devices-nobg.png" alt="" class="ipad" width="800" height="450">
                            </div>
                            <div class="bubble-1 is-revealing">
                                <svg width="61" height="52" viewBox="0 0 61 52" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M32 43.992c17.673 0 28.05 17.673 28.05 0S49.674 0 32 0C14.327 0 0 14.327 0 32c0 17.673 14.327 11.992 32 11.992z" id="bubble-1-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-1-b" fill="#fff">
                                            <use xlink:href="#bubble-1-a"/>
                                        </mask>
                                        <use fill="#FF6D8B" xlink:href="#bubble-1-a"/>
                                        <path d="M2 43.992c17.673 0 28.05 17.673 28.05 0S19.674 0 2 0c-17.673 0-32 14.327-32 32 0 17.673 14.327 11.992 32 11.992z" fill="#FF4F73" mask="url(#bubble-1-b)"/>
                                        <path d="M74 30.992c17.673 0 28.05 17.673 28.05 0S91.674-13 74-13C56.327-13 42 1.327 42 19c0 17.673 14.327 11.992 32 11.992z" fill-opacity=".8" fill="#FFA3B5" mask="url(#bubble-1-b)"/>
                                    </g>
                                </svg>
                            </div>
                            <!--<div class="bubble-2 is-revealing">
                                <svg width="179" height="126" viewBox="0 0 179 126" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M104.697 125.661c41.034 0 74.298-33.264 74.298-74.298s-43.231-7.425-84.265-7.425S0-28.44 0 12.593c0 41.034 63.663 113.068 104.697 113.068z" id="bubble-2-a"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="bubble-2-b" fill="#fff">
                                            <use xlink:href="#bubble-2-a"/>
                                        </mask>
                                        <use fill="#838DEA" xlink:href="#bubble-2-a"/>
                                        <path d="M202.697 211.661c41.034 0 74.298-33.264 74.298-74.298s-43.231-7.425-84.265-7.425S98 57.56 98 98.593c0 41.034 63.663 113.068 104.697 113.068z" fill="#626CD5" mask="url(#bubble-2-b)"/>
                                        <path d="M43.697 56.661c41.034 0 74.298-33.264 74.298-74.298s-43.231-7.425-84.265-7.425S-61-97.44-61-56.407C-61-15.373 2.663 56.661 43.697 56.661z" fill="#B1B6F1" opacity=".64" mask="url(#bubble-2-b)"/>
                                    </g>
                                </svg>

                            </div>-->
                        </div>
                    </div>
                </div>
            </section>

            <section class="features section text-center">
                <div class="container">
                    <div class="features-inner section-inner has-bottom-divider">
                        <div class="features-wrap">
                            <div class="feature is-revealing">
                                <div class="feature-inner">
                                    <!--<div class="feature-icon">
                                        <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M48.066 61.627c6.628 0 10.087-16.79 10.087-23.418 0-6.627-5.025-9.209-11.652-9.209C39.874 29 24 42.507 24 49.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".24" fill="#A0A6EE"/>
                                                <path d="M26 54l28-28" stroke="#838DEA" stroke-width="2" stroke-linecap="square"/>
                                                <path d="M26 46l20-20M26 38l12-12M26 30l4-4M34 54l20-20M42 54l12-12" stroke="#767DE1" stroke-width="2" stroke-linecap="square"/>
                                                <path d="M50 54l4-4" stroke="#838DEA" stroke-width="2" stroke-linecap="square"/>
                                            </g>
                                        </svg>
                                    </div>-->
                                    <h3 class="feature-title">Flip The Switch</h3>
                                    <p class="text-sm">Complete all of your tasks in a light or dark theme. Whichever you perfer.</p>
                                </div>
                            </div>
                            <div class="feature is-revealing">
                                <div class="feature-inner">
                                    <!--<div class="feature-icon">
                                        <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M48.066 61.627c6.628 0 10.087-16.79 10.087-23.418 0-6.627-5.025-9.209-11.652-9.209C39.874 29 24 42.507 24 49.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".24" fill="#75ABF3"/>
                                                <path d="M34 52V35M40 52V42M46 52V35M52 52V42M28 52V28" stroke="#4D8EF7" stroke-width="2" stroke-linecap="square"/>
                                            </g>
                                        </svg>
                                    </div>-->
                                    <h3 class="feature-title">Web Based</h3>
                                    <p class="text-sm">Built using web technologies so you can run it on any device with a web browser.</p>
                                </div>
                            </div>
                        </div>
                        <div class="features-wrap">
                            <div class="feature is-revealing">
                                <div class="feature-inner">
                                    <!--<div class="feature-icon">
                                        <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M48.066 61.627c6.628 0 10.087-16.79 10.087-23.418 0-6.627-5.025-9.209-11.652-9.209C39.874 29 24 42.507 24 49.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".32" fill="#FF97AC"/>
                                                <path stroke="#FF6D8B" stroke-width="2" stroke-linecap="square" d="M49 45h6V25H35v6M43 55h2v-2M25 53v2h2M27 35h-2v2"/>
                                                <path stroke="#FF6D8B" stroke-width="2" stroke-linecap="square" d="M43 35h2v2M39 55h-2M33 55h-2M39 35h-2M33 35h-2M45 49v-2M25 49v-2M25 43v-2M45 43v-2"/>
                                            </g>
                                        </svg>
                                    </div>-->
                                    <h3 class="feature-title">Secure</h3>
                                    <p class="text-sm">Everything in our data bases is encrypted to make sure that prying eyes can't read your tasks.</p>
                                </div>
                            </div>
                            <div class="feature is-revealing">
                                <div class="feature-inner">
                                    <!--<div class="feature-icon">
                                        <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="translate(24 25)" fill="none" fill-rule="evenodd">
                                                <path d="M24.066 36.627c6.628 0 10.087-16.79 10.087-23.418C34.153 6.582 29.128 4 22.501 4 15.874 4 0 17.507 0 24.135c0 6.627 17.439 12.492 24.066 12.492z" fill-opacity=".32" fill="#A0EEE5"/>
                                                <circle stroke="#39D8C8" stroke-width="2" stroke-linecap="square" cx="5" cy="4" r="4"/>
                                                <path stroke="#39D8C8" stroke-width="2" stroke-linecap="square" d="M23 22h8v8h-8zM11 10l9 9"/>
                                            </g>
                                        </svg>
                                    </div>-->
                                    <h3 class="feature-title">Notes</h3>
                                    <p class="text-sm">Easily add notes to any task to keep links, addresses, and other important information that might pertain to that task.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="newsletter section">
                <div class="container-sm">
                    <div class="newsletter-inner section-inner">
                        <div class="newsletter-header text-center is-revealing">
                            <h2 class="section-title mt-0">Did we convince you?</h2>
                            <p class="section-paragraph">Signup below and we'll work on getting your account setup. Answer a couple quick questions and we'll send you on your road to getting things done.</p>
                        </div>
                        <div class="text-center">
                            <a class="button button-primary button-shadow" href="login.php?action=register">Signup</a> 
                        </div>
                    </div>
                </div>
            </section>

            <section class="newsletter section">
                <div class="container-sm">
                    <div class="newsletter-inner section-inner">
                        <div class="newsletter-header text-center is-revealing">
                            <h2 class="section-title mt-0">Open Source</h2>
                            <p class="section-paragraph">This is an open source project on GitHub. Fill out the form below and get the link to download the source code.</p>
                        </div>
                        <div class="text-center">
                            <a class="button button-primary button-shadow" href="self-host-register.php">Fill Out The Form</a> 
                        </div>
                    </div>
                </div>
            </section>

            <section class="newsletter section">
                <div class="container-sm">
                    <div class="newsletter-inner section-inner">
                        <div class="newsletter-header text-center is-revealing">
                            <h2 class="section-title mt-0">Check out some resources</h2>
                        </div>
                        <div class="text-center">
                            <!--<a target="_blank" href="app/extras/bug-log.html">Known Bugs</a>&nbsp;&nbsp;-->
                            <a target="_blank" href="app/extras/change-log.html">Change Log</a>&nbsp;&nbsp;
                            <!--<a target="_blank" href="app/extras/pwa-install/index.html">Install our Apps</a>&nbsp;&nbsp;-->
                            <!--<a target="_blank" href="app/extras/gettings-started/getting-started.html">Getting Started Document</a>&nbsp;&nbsp;-->
                            <a target="_blank" href="app/extras/screenshots/index.html">Screenshots</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer text-light">
            <div class="container">
                <div class="site-footer-inner">
                    <div class="brand footer-brand">
                        <a href="#">
                            <img src="app/icons/check.v3.svg" alt="" class="logo">
                        </a>
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="login.php?action=register">Signup</a>
                        </li>
                        <li>
                            <a href="privacy-terms.html">Privacy Policy and Terms of Service</a>
                        </li>
                        <li>
                            <a href="mailto:<?php echo $contactemailval; ?>">Contact</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                    </ul>
                    <div class="footer-copyright">Template from &nbsp;<a href="https://onepagelove.com/ava">Ava</a></div>
                </div>
            </div>
        </footer>
    </div>

    <script src="landing/dist/js/main.min.js"></script>
</body>
</html>
    <x-head>{{ $title }}</x-head>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <x-head>{{ $title }}</x-head>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar" id="navbar">
            <div class="nav-container">
                <a href="#" class="logo">
                    <img src="img/logo.webp" alt="Logo"
                        style="height: 45px; margin-right: 20px; vertical-align: bottom" />
                    Indo<span>Bismar</span></a>
                <ul class="nav-menu" id="nav-menu">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="nav-link" onclick="toggleDropdown()"
                            aria-expanded="false">About
                            <svg class="w-[12px] h-[12px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                viewBox="0 0 24 24" style="margin-left: 5px">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1" d="m19 9-7 7-7-7" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu" id="dropdownMenu">
                            <li><a href="#about">Description</a></li>
                            <li><a href="#founder">Founder</a></li>
                            <li><a href="#brand-partner">Brand Partner</a></li>
                            <li><a href="#reviews">Rating</a></li>
                            <li><a href="#business-partner">Company Center</a></li>
                        </ul>
                    </li>
                    <li><a href="#gallery" class="nav-link">Gallery</a></li>
                    <li><a href="#products" class="nav-link">Product</a></li>
                    <li><a href="#section-store" class="nav-link">Store</a></li>
                    <li><a href="#footer" class="nav-link">Contact</a></li>
                </ul>
                <div class="mobile-menu" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </nav>

    </body>

    </html>

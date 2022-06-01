<!doctype html>
<html lang="id">
  <head>
    <title>@yield('title')</title>
    <meta name="description" content="{{$meta['description']}}">
    <meta name="keywords" content="{{$meta['keywords']}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="google-site-verification" content="" />
    <meta name="alexaVerifyID" content="" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:standard, max-video-preview:-1" />
    <meta name="language" content="id-id" />
    <meta name="geo.country" content="id" />
    <meta name="geo.placename" content="Indonesia" />
    <meta name="distribution" content="Global" />
    <meta name="googlebot-news" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta property="fb:app_id" content="" />
    <meta property="fb:pages" content="" />
    <meta property="og:title" content="{{$meta['title']}}">
    <meta property="og:description" content="{{$meta['description']}}">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{$shop['domain']['name']}}">
    <meta property="og:image" content="{{$meta['image']}}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="450">
    <meta property="og:site_name" content="{{$shop['domain']['name']}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="{{$shop['name']}}">
    <meta name="twitter:title" content="{{$meta['title']}}">
    <meta name="twitter:description" content="{{$meta['description']}}">
    <meta name="twitter:image" content="{{$meta['image']}}">

    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}
  </head>
  <body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-3 pt-1">
                <!-- <a class="nav-link" href="#">Subscribe</a> -->
            </div>
            <div class="col-6 text-center">
                <a class="blog-header-logo text-dark text-uppercase" href="/">{{$shop['name']}}</a>
            </div>
            <div class="col-3 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" title="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
            </div>
            </div>
        </header>
    </div>

    <div class="nav-scroller shadow-sm py-1 mb-2">
        <nav class="nav nav-underline d-flex justify-content-lg-center">
            @foreach($menu as $v)
            <a class="nav-link text-uppercase {{(Request::segment(2) == Str::slug($v['name']).'-'.$v['hash'] ? 'active':'')}}" href="/category/{{Str::slug($v['name'])}}-{{$v['hash']}}">{{$v['name']}}</a>
            @endforeach

            @foreach($pages as $v)
            <a class="nav-link text-uppercase" href="/pages/{{Str::slug($v['title'])}}-{{$v['hash']}}">{{$v['title']}}</a>
            @endforeach
        </nav>
    </div>

    <main class="container">
        @yield('content')
    </main>

    <footer class="blog-footer text-center bg-light mb-0">
        <p>&#64;{{date('Y')}} <a href="/" class="text-dark" title="{{$shop['name']}}">{{$shop['name']}}</a></p>
        <a href="whatsapp://send?phone=0000000000" title="Hubungui kami melalui WhatsApp">
            <svg viewBox="0 0 32 32" class="whatsapp-ico">
                <path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path>
            </svg>
        </a>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/pace.min.js"></script>
    <script src="/js/lazy/jquery.lazy.js"></script>
  </body>
</html>
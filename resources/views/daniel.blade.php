<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Daniel S. Billing">

    <title>Daniel S. Billing</title>
    
    <!-- FavIcon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon.ico') }}">

    <link href="{{ mix('css/home.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/home.js') }}" defer></script>
  </head>
<body class="d-flex h-100 text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <header>
        <nav class="nav nav-masthead justify-content-center mb-4">
            @foreach($socials as $social)
                <a class="nav-link" href="{{ $social->link }}"><i class="{{ $social->icon }}"></i>{{ $social->name }}</a>
            @endforeach
        </nav>
    </header>

    <main class="my-auto">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="row align-items-center h-100">
                    <div class="col-sm-8 col-md-5 col-lg-5 mx-auto">
                        <img src="{{ asset('img/daniel.jpg') }}" class="img-fluid img-thumbnail rounded mx-auto d-block">
                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-7 description">
                        <span class="justify-content-center">

                            <h1>Hello, I'm Daniel S. Billing &#x1F44B;</h1>
                            <h5 class="mb-4">...a Software Systems Engineer from Norway &#x1F1F3;&#x1F1F4;</h5>

                            <p>I have {{ $certifications }} certifications, {{ $courses }} courses and {{ ($experience) ? $experience->diffInYears(now()) : '0' }} years of experience under my belt. &#x1F913;</p>
                            
                            <p>What I do in short; AV Systems Development as a primary job, PHP/Laravel as a hobby/side-job, and freelance work for e-sport teams and LAN-parties.</p>
                            
                            <p>If you want to get in touch with me use one of my socials on the top of this page. Say hi! &#x1F44A;</p>

                            <button type="button" class="collapsible">More about me</button>
                            <div class="content">
                                <p>I started my career by getting my diploma for the media graphics profession. After this I go a job as a Support Technician at <a class="badge rounded-pill bg-primary" href="https://intility.no">Intility</a>. About three years later I moved to the AV department of the same company, and there I have been for ~6 years.</p>

                                <p>In the AV realm I have been developing meeting room control with <span class="badge rounded-pill bg-dark">Crestron</span> and creating digital signage displays with <a class="badge rounded-pill bg-dark" href="https://scala.com">Scala</a> and <span class="badge rounded-pill bg-dark">Python</span>. &#x1F4FA;</p>

                                <p>For my hobby projects I create stuff with <span class="badge rounded-pill bg-dark">VB.NET</span>, <span class="badge rounded-pill bg-dark">Python</span> and <span class="badge rounded-pill bg-dark">PHP</span> with <span class="badge rounded-pill bg-dark">Laravel</span> under my own name or my company's name <a class="badge rounded-pill bg-orange" href="https://infihex.com">Infihex</a>. Most of these are available on <a class="badge rounded-pill bg-dark" href="https://github.com/DanielRTRD"><i class="fab fa-github"></i>Github</a>. I am trying to release most of my projects as open-source in 2021, so keep your eyes open. &#x1F440;</p>

                                <p>While doing all of the above I also do freelance work for <span class="badge rounded-pill bg-dark">E-sport</span> teams, <span class="badge rounded-pill bg-dark">LAN-parties</span> and more. So I am quite busy from time to time. &#x1F605;</p>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="text-center justify-content-center text-muted mb-2">
            Built with Laravel {{ explode('.', Illuminate\Foundation\Application::VERSION)[0] }}, check it out on <a class="ml-1 text-muted" href="https://github.com/DanielRTRD/daniel.rtrd.no"><i class="fab fa-github"></i>Github</a>
        </div>
    </footer>

</div>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>

</body>
</html>
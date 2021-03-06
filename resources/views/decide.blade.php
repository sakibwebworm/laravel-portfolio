`<!DOCTYPE HTML>

<html>
<head>
    <title>Md-sakib</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/css/main.css" />
    <noscript><link rel="stylesheet" href="/css/noscript.css" /></noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body class="is-preload">

<!-- Wrapper-->
<div id="wrapper">

    <!-- Nav -->
    <nav id="nav">
        <a href="#" class="icon fa-home"><span>Home</span></a>
        <a href="#work" class="icon fa-folder"><span>Work</span></a>
        <a href="#contact" class="icon fa-envelope"><span>Contact</span></a>
        <a href="https://twitter.com/ajlkn" class="icon fa-twitter"><span>Twitter</span></a>
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Me -->
        <article id="home" class="panel intro">
            <header>
                <h1>MD SAKIB</h1>
                <p>Full stack developer</p>
            </header>
            <a href="#work" class="jumplink pic">
                <span class="arrow icon fa-chevron-right"><span>See my work</span></span>
                <img src="images/me.jpg" alt="" />
            </a>
        </article>
        <!-- Work -->
        <article id="work" class="panel">
            <header>
                <h2>Work</h2>
            </header>
            <p>
                A wide range of projects developed in php, js, mysql, bootstrap, laravel and vue. More details are available when a picture is clicked :)
            </p>
            <section>
                <div class="row portfolio_column">
                    @foreach($works as $work)
                        <div class="col-4 col-6-medium col-12-small">
                            <a style="cursor: pointer" data-id="{{$work->id}}" class="image fit"> <img src="{{$work->image_path}}"alt=""> </a>
                            <div class="overlay update_or_delete" onclick="location.href='/decide/{{$work->id}}'" >Update Or Delete</div>
                        </div>
                    @endforeach
                </div>
            </section>
        </article>

        <!-- Contact -->
        <article id="contact" class="panel">
            <header>
                <h2>Contact Me</h2>
            </header>
            <form action="/contact" method="post">
                {{ csrf_field() }}
                <div>
                    <div class="row">
                        <div class="col-6 col-12-medium">
                            <input type="text" name="name" placeholder="Name" />
                        </div>
                        <div class="col-6 col-12-medium">
                            <input type="text" name="email" placeholder="Email" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" placeholder="Subject" />
                        </div>
                        <div class="col-12">
                            <textarea name="message" placeholder="Message" rows="6"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Send Message" />
                        </div>
                    </div>
                </div>
            </form>
        </article>

    </div>

    <!-- Footer -->
    <div id="footer">
        <ul class="copyright">
            <li>&copy; Portfolio</li><li><a href="http://md-sakib.com">MD SAKIB</a></li>
        </ul>
    </div>

</div>
<div id="demo01" href="#animatedModal" style="display: none">DEMO01</div>

<!--DEMO01-->
<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
    <div class="close-animatedModal">
        <a href="#">X</a>
    </div>

    <div class="modal-content" style="text-align: center">
        <!--Your modal content goes here-->
        <article class="panel modal_content_article image" id="modal_work">

        </article>
    </div>
</div>

<!-- Scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/browser.min.js"></script>
<script src="/js/breakpoints.min.js"></script>
<script src="/js/util.js"></script>
<script src="/js/main.js"></script>
</body>
</html>

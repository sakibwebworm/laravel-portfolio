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
        <a href="https://github.com/sakibwebworm" class="icon fa-github"><span>Twitter</span></a>
       @if (Auth::check()) <a href="#new_work" class="icon fa-clipboard"><span>Add work</span></a>@endif
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
                        @if(Auth::check())<div class="overlay update_or_delete" style="cursor: pointer" onclick="workupdate({{$work->id}})" >Update Or Delete</div>@endif
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

        <!-- Submit new work -->
       @if (Auth::check())
        <article id="new_work" class="panel">
            <header>
                <h2>Add work</h2>
            </header>
            <form action="/add_work" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div>
                    <div class="row">
                        <div class="col-6 col-12-medium">
                            <input type="text" name="title" placeholder="title" />
                        </div>
                        <div class="col-6 col-12-medium">
                            <input type="file" name="image_path" placeholder="picture" />
                        </div>
                        <div class="col-12">
                            <textarea class="textarea" name="body" placeholder="Body" rows="6"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Upload" />
                        </div>
                    </div>
                </div>
            </form>
        </article>
@endif
    <!-- update  work -->
        @if (Auth::check())
            <article id="update_work" class="panel">
                <header>
                    <h2>Update work</h2>
                    <a href="" class="deletework">Delete</a>
                </header>

                <form action="" method="post" enctype="multipart/form-data" name="update_form" >
                    {{ csrf_field() }}
                    <div>
                        <div class="row">
                            <div class="col-6 col-12-medium">
                                <input type="text" name="title" placeholder="title" id="update_form_title"/>
                            </div>
                            <div class="col-6 col-12-medium">
                                <input type="file" name="image_path" placeholder="picture" />
                            </div>
                            <div class="col-12">
                                <textarea class="textarea" name="body" placeholder="Body" id="update_form_body" rows="6"></textarea>
                            </div>
                            <div class="col-12">
                                <input type="submit" value="Update" />
                            </div>
                        </div>
                    </div>
                </form>
            </article>
        @endif
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
<script src="/js/animatedModal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('.textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>
<script>
    function workupdate(id){
        var url="/update_work/"+id;
        var deleteurl="/delete_work/"+id;
        document.update_form.action=url;
        $(".deletework").attr("href", deleteurl);
        window.location.hash='update_work';
        axios.get(url)
            .then(function (response) {
                console.log(response.data.title);
                document.getElementById("update_form_title").value = response.data.title;
                CKEDITOR.instances.update_form_body.setData(response.data.body)
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                // always executed

            });

    }
    $('close-animatedModal a').hide();

    $( ".portfolio_column a" ).on( "click", function(e) {
        function modal_content_create(response){
            var modal_content_article = document.getElementsByClassName("modal_content_article")[0];
            var header=document.createElement("header");
            var h2 = document.createElement("h2");
            var img=document.createElement("img");
            var body=document.createElement("p");
            h2.innerHTML = response.data.title;
            img.src = response.data.image_path;
            body.innerHTML = response.data.body;
            modal_content_article.appendChild(header);
            header.appendChild(h2);
            modal_content_article.appendChild(img);
            modal_content_article.appendChild(body);
        }
        axios.get("/work/"+$(this).data('id'))
            .then(function (response) {
                modal_content_create(response);
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                // always executed
                $("#demo01").animatedModal({
                    color: '#FFFFFF',
                    afterOpen: function(){
                        $('close-animatedModal a').show();
                    },
                    afterClose: function() {
                        $('#modal_work').empty();
                        $('close-animatedModal a').hide();
                    }
                });
                $("#demo01").trigger("click")
            });
    });

</script>
<style>

    .update_or_delete{
        text-align: center;
        background: black;
        opacity: .5;
    }
</style>
</body>
</html>

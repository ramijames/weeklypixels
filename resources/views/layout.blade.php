<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WeeklyPixels</title>

    </head>

    <body>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    @yield('content')

                </div>

            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

        <script type="text/javascript" charset="utf-8">

            $(document).ready(function() {
                var loading_options = {
                    finishedMsg: "<div class='end-msg'>Congratulations! You've reached the end of the internet</div>",
                    msgText: "<div class='center'>Loading news items...</div>",
                    img: "/assets/img/ajax-loader.gif"
                };

                $('#content').infinitescroll({
                    loading: loading_options,
                    navSelector: "ul.pagination",
                    nextSelector: "ul.pagination li:last-child a",
                    itemSelector: "#content div.item"
                });
            });

        </script>

    </body>

</html>






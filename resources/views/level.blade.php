<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
                <!-- Bootstrap -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/lux/bootstrap.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 shadow pt-3">
                    <h2>Contenido del nivel {{$level->name}}</h2>

                    <h5 class="my-3">Posts</h5>
                    <div class="row">
                        @foreach ($posts as $post)

                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{$post->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{$post->category->name}} |
                                                {{$post->comments_count}}
                                                {{Str::plural('comentario', $post->comments_count)}}
                                            </h6>
                                            <p class="card-text small">
                                                @foreach ($post->tags as $tag)
                                                    <span class="badge badge-light">#{{$tag->name}}</span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    <h5 class="my-3">Videos</h5>
                    <div class="row">
                        @foreach ($videos as $video)

                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{$video->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$video->title}}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{$video->category->name}} |
                                                {{$video->comments_count}}
                                                {{Str::plural('comentario', $video->comments_count)}}
                                            </h6>
                                            <p class="card-text small">
                                                @foreach ($video->tags as $tag)
                                                    <span class="badge badge-light">#{{$tag->name}}</span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

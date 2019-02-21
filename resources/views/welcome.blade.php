<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Check Weather</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ url("src/css/bulma.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ url("src/css/bulma.min.css") }}" rel="stylesheet" type="text/css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container is-fluid">
            <section class="hero is-primary">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Checking Weather at your City
                        </h1>
                        <h2 class="subtitle">
                            Make in simple with bulma.io & Ajax
                        </h2>
                    </div>
                </div>
            </section>
            <section class="hero is-light">
                <div class="hero-body">
                    <div class="container">
                        <div class="columns is-desktop">
                            <div class="column is-one-quarter">
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select id="selectcity">
                                                <option style="display:none;">Choose One</option>
                                                <option value="1642907">Jakarta</option>
                                                <option value="1880251">Singapore</option>
                                                <option value="1609350">Bangkok</option>
                                            </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script type="text/javascript">
            $("#selectcity").change(function(){
                var value = $("#selectcity").val();
                $.ajax({
                    type : 'get',
                    url : '{{ route('weather') }}',
                    data:{'checkid':value},
                        success:function(data){
                            $('table').html(data);
                        }
                });
            })
        </script>
    </body>
</html>

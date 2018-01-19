<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tweets from Kazakhstan on Map</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style type="text/css"> 
            html, body { 
                height:100%; 
                margin: 0;
                padding: 0;
            }
            #app{
                width:100%; 
                height:100%;
            }
        </style>
    </head>
    <body>
        <div id="app" style="height: 100%;">
            <googlemaps-with-markers :center="{lat:48.474831, lng: 66.951439}" :zoom="5" :markers="this.markers">
                
            </googlemaps-with-markers>
        </div>
    </body>
    <!-- Scripts -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvWE_sIwKbWkiuJQOf8gSk9qzpO96fhfY"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
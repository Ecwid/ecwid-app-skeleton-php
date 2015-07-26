<!DOCTYPE html>
<html>
    <head>
        <title>Embedded App Home</title>
        
        <!-- Include Ecwid JS SDK -->
        <script src="https://djqizrxa6f10j.cloudfront.net/ecwid-sdk/js/1.0.0/ecwid-app.js"></script>

        <script>
        // Initialize the application
        EcwidApp.init({
            app_id: "{{ $appNamespace }}", // your Ecwid application namespace (not clientID)
            autoloadedflag: true, 
            autoheight: true
        });

        // do something...
        </script>

        <!-- Include Ecwid CSS SDK -->
        <link rel="stylesheet" type="text/css" href="https://djqizrxa6f10j.cloudfront.net/ecwid-sdk/css/1.2.0/ecwid-app-ui.css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Hi, this is Embedded App Home page. Store ID is {{ $storeId }}</div>
            </div>
        </div>
    </body>
</html>

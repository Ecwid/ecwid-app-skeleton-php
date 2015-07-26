## Ecwid Embedded App Skeleton

This skeleton is a default Laravel 5 project with Ecwid-specific functionality to display the embedded app page. It processes Ecwid payload sent to iframe, get the payload data including the access token and displays an empty HTML page with initialized application. 

### Model
Add your application functionality to app/AppMain class, it's supposed to be an entry point with your app business logic

### Controller
The embedded app controller is implemented in the EmbeddedAppController class (app/Http/Controllers/EmbeddedAppController.php). It gets the payload from request, decrypt it and pass the data to the Model and the View

### View 
The main "Home" view is implemented in the app/resources/views/embedded/home.blade.php file. This is a Blade template. Use it as your app main page template

### Configuration
Add your Ecwid app namespace and the app secret key into `.env` file inside the app directory as follows:
`ECWID_APP_NAMESPACE=your-app-namespace`
`ECWID_APP_SECRET_KEY=yourappsecretkey123`

### Building your application on top of this skeleton
Please see the Laravel framework documentation to understand the app structure and development flow: [http://laravel.com/docs/5.1/](http://laravel.com/docs/5.1/)

### Embedded applications in Ecwid
See this documentation for more details on Embedded Apps in Ecwid: [http://api.ecwid.com/#embedded-apps](http://api.ecwid.com/#embedded-apps)
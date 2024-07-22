<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @inertiaHead
    <script>
        window.addEventListener('load', () => {
            if (window.Telegram && window.Telegram.WebApp) {
                // Expand the Web App to the maximum available height
                window.Telegram.WebApp.expand();
            }
        });
    </script>
  </head>
  <body>
    @inertia
  </body>
</html>

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="/img/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{env('APP_NAME')}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,600&display=swap"
      rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="module" crossorigin src="/assets/main-704af5af.js"></script>
    @stack('styles')
  </head>

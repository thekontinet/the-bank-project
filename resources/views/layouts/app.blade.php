<!--Start Layout-->
<!DOCTYPE html>
<html
  lang="en"
  x-data="layout()"
  :class="{
  'dark': $store.app.isDark,
  '': !$store.app.isDark
}"
x-init="$store.app.isDark = JSON.parse(localStorage.getItem('dark'))"
>
  @include('layouts.header')
  <body class="w-full h-full bg-white dark:bg-muted-900 dark:text-muted-100">
    <x-alert/>
    <!--Site sidebar-->
    @include('layouts.sidebar')

    <!--Site panel-->
    @include('layouts.panel')
    <main
    x-cloak
    class="relative z-10 w-full overflow-hidden transition-all duration-300"
    :class="$store.app.isLayoutCompact ? 'ml-0 lg:w-[calc(100%_-_80px)] lg:ml-[80px]' : 'ml-0 lg:w-[calc(100%_-_250px)] lg:ml-[250px]'"
  >
    <!--Container-->
    <div
      class="w-full max-w-5xl min-h-screen px-4 mx-auto bg-white md:px-6 dark:bg-muted-900"
    >
      <!--Site navbar-->
      @include('layouts.navigation')
    {{$slot}}
    @stack('scripts')
  </body>
</html>

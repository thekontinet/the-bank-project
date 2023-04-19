{{-- <a href="/" class="flex items-center gap-2">
    <img
      src="/img/logo/logo-square-outline.png"
      class="w-8 h-8 dark:invert"
      alt="App logo"
      width="48"
      height="48"
    />
    <img
      src="/img/logo/text.svg"
      class="w-24 dark:invert"
      :class="$store.app.isLayoutCompact ? 'hidden' : 'block'"
      alt="App logo"
      width="112"
      height="15"
    />
  </a> --}}
<a href="/" style="display: inline-flex; align-items: center; gap:4">
    <img width="40px" src="/images/logo.png" alt="image">
    <h4 style="font-weight: 800; font-size: 18px">{{config('app.name')}}</h4>
</a>


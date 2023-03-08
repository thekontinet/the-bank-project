<a href="/" class="flex items-center gap-2">
    <img
      src="/img/logo/logo-square-outline-white.svg"
      class="w-10 h-10"
      alt="App logo"
      width="48"
      height="48"
    />
    <img
      src="/img/logo/text-white.svg"
      :class="$store.app.isLayoutCompact ? 'hidden' : 'block'"
      class="hidden w-28 invert md:block"
      alt="App logo"
      width="112"
      height="15"
    />
</a>

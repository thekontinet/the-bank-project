<a href="/" class="flex items-center gap-2">
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
  </a>

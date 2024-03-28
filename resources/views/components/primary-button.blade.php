@props([
  'confirmation',
  'href' => null,
  'type' => 'submit',
  'classes' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150' 
])

<div {{ $attributes->merge(['class' => ' flex h-11 items-center']) }}>
  @isset($href)
    <a
      href="{{ $href }}"
      class="{{ $classes }}"
      @isset($confirmation)
        x-data="{ open: false }"
        @click.prevent="window.location='{{ $href }}';"
      @endisset
    >
      {{ $slot }}
    </a>
  @else
    <button
      type="{{ $type }}"
      class="{{ $classes }}"
    >
      {{ ($slot) }}
    </button>
  @endisset
</div>
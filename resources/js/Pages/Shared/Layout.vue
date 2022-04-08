<template>
  <section class="bg-gray-200 rounded p-3">
    <header class="flex justify-between">
      <h1 class="font-bold text-lg">My App</h1>
      <Nav />
    </header>
  </section>

  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <slot />
    </div>
  </section>
</template>

<script>
import Nav from "./Nav.vue";

export default {
  components: {
    Nav,
  },
};
</script>
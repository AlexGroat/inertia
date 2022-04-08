<template>
  <h1>Users</h1>

  <Nav />

  <div style="margin-top: 1000px">
    <p>Current time is {{ time }}.</p>

    <Link href="/users" class="text-blue-500" preserveScroll> Refresh</Link>
  </div>
</template>

<script>
import Nav from "./Shared/Nav.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: { Nav, Link },

  props: { time: String },
};
</script>
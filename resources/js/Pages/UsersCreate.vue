<template>
  <Head title="Create User" />
  <h1 class="text-3xl">Create New User</h1>

 <!-- prevent default submit, call submit in script line 77 -->
  <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
    <div class="mb-6">
      <label
        class="block mb-2 text-xs font-bold text-gray-700 uppercase"
        for="name"
      >
        Name
      </label>
      <input
        v-model="form.name"
        class="w-full p-2 border border-gray-400 rounded"
        type="text"
        id="name"
        name="name"
        required
      />
    </div>
    <div class="mb-6">
      <label
        class="block mb-2 text-xs font-bold text-gray-700 uppercase"
        for="email"
      >
        Email
      </label>
      <input
        v-model="form.email"
        class="w-full p-2 border border-gray-400 rounded"
        type="email"
        id="email"
        name="email"
        required
      />
    </div>
    <div class="mb-6">
      <label
        class="block mb-2 text-xs font-bold text-gray-700 uppercase"
        for="password"
      >
        Password
      </label>
      <input
        v-model="form.password"
        class="w-full p-2 border border-gray-400 rounded"
        type="password"
        id="password"
        name="password"
        required
      />
    </div>
    <div class="mb-6">
      <button
        type="submit"
        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

let form = reactive({
  name: "",
  email: "",
  password: "",
});

// sending the post request with the above form data
let submit = () => {
  Inertia.post('/users', form);
}
</script>
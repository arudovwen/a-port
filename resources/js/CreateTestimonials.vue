<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

import { ref } from "vue";

import BreezeInput from "@/Components/Input.vue";
import BreezeTextarea from "@/Components/Textarea.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import BreezeButton from "@/Components/Button.vue";


const form = useForm({
  text: "",
  title: "",
});

const submit = () => {

  form.post(route("prefix.testimonials.store"), {
    onFinish: () => form.reset(""),
  });
};
</script>

<template>
  <div class="pt-8 rounded-t-3xl rounded-b-3xl">
    <div class="rounded-t-3xl rounded-b-3xl p-8">
      <BreezeValidationErrors class="mb-4" />

      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>
      <div class="mt-4">
        <BreezeLabel for="title" value="Title" />
        <BreezeInput
          id="title"
          type="text"
          class="mt-1 block w-full"
          v-model="form.title"
          required
          autocomplete="title"
        />
      </div>

      <div class="mt-4">
        <BreezeLabel for="text" value="Text" />
        <textarea
          name="text"
          rows="5"
          id="text"
          class="mt-1 block w-full"
          v-model="form.text"
          required
          autocomplete="text"
        ></textarea>
      </div>

      <div class="mt-4 text-right">
        <BreezeButton
          class="ml-auto"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Submit
        </BreezeButton>
      </div>
    </div>
  </div>
</template>


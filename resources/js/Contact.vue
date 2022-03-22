<script setup>
import {useForm } from "@inertiajs/inertia-vue3";
import {
SpeakerphoneIcon
} from "@heroicons/vue/solid";

import { ref } from "vue";

import BreezeInput from "@/Components/Input.vue";
import BreezeTextarea from "@/Components/Textarea.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import BreezeButton from "@/Components/Button.vue";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  name: "",
  message: "",
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <div
    class="
      text-white
      bg-white-50
      backdrop-blur-sm
      bg-black/30
      pt-8
      rounded-t-3xl rounded-b-3xl
    "
  >
    <h2 class="text-white text-base md:text-2xl mb-6 px-8 flex items-center justify-center md:justify-start">
      <SpeakerphoneIcon class="w-6 h-6 mr-2" /> Contact me today with your idea
    </h2>
    <div class="rounded-t-3xl rounded-b-3xl p-8">
      <BreezeValidationErrors class="mb-4" />

      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>
      <div class="mt-4">
        <BreezeLabel for="name" value="Full Name" class="text-white" />
        <BreezeInput
          id="text"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autocomplete="name"
        />
      </div>
      <div class="mt-4">
        <BreezeLabel for="email" value="Email" class="text-white" />
        <BreezeInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autocomplete="email"
        />
      </div>
      <div class="mt-4">
        <BreezeLabel for="message" value="Message" class="text-white" />
        <BreezeTextarea
          id="message"
          class="mt-1 block w-full"
          v-model="form.message"
          required
          autocomplete="message"
        />
      </div>

      <div class="mt-4 text-right">
        <BreezeButton
          class="ml-auto"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Send message
        </BreezeButton>
      </div>
    </div>
  </div>
</template>


<script setup>
import {useForm } from "@inertiajs/inertia-vue3";

import { ref } from "vue";

import BreezeInput from "@/Components/Input.vue";
import BreezeTextarea from "@/Components/Textarea.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import BreezeButton from "@/Components/Button.vue";
import ImageUpload from './uploadImage.vue'
import VideoUpload from './uploadVideo'
defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  status: String,
});

const form = useForm({
  stack: "",
  title: "",
  cover: "",
  demo:""
});
function getImageUrl(val){
  form.cover = val
}
function getVideoUrl(val){
   form.demo = val
}

const submit = () => {
  if(!form.cover && !form.demo) return
  form.post(route("prefix.projects.update"), {
    onFinish: () => form.reset(""),
  });
};
</script>

<template>
  <div
    class="
      pt-8
      rounded-t-3xl rounded-b-3xl
    "
  >

    <div class="rounded-t-3xl rounded-b-3xl p-8">
      <BreezeValidationErrors class="mb-4" />

      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>
      <div class="mt-4">
        <BreezeLabel for="title" value="Title"  />
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
        <BreezeLabel for="stack" value="Tech Stack"  />
        <BreezeInput
          id="stack"
          type="text"
          class="mt-1 block w-full"
          v-model="form.stack"
          required
          autocomplete="stack"
        />
      </div>
      <ImageUpload  @getImageUrl="getImageUrl"/>
       <VideoUpload  @getVideoUrl="getVideoUrl"/>


      <div class="mt-4 text-right">
        <BreezeButton
          class="ml-auto"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Update
        </BreezeButton>
      </div>
    </div>
  </div>
</template>


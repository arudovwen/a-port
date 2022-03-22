<template>


    <div class="mt-8">
      <div
        class="
          mt-1
          flex
          justify-center
          px-4
          pt-3
          pb-4
          border-2 border-gray-300 border-dashed
          rounded-md
        "
      >
        <div class="space-y-1 text-center">
          <label
            for="image-upload"
            class="
              relative
              cursor-pointer
              bg-white
              rounded-md
              font-medium
              text-indigo-600
              hover:text-indigo-500
              focus-within:outline-none
              focus-within:ring-2
              focus-within:ring-offset-2
              focus-within:ring-indigo-500
            "
          >
            <svg
              class="mx-auto h-10 w-10 text-gray-400"
              stroke="currentColor"
              fill="none"
              viewBox="0 0 48 48"
              aria-hidden="true"
            >
              <path
                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </label>
          <div class="flex text-sm text-gray-600 text-center">
            <div>
              <input
                id="image-upload"
                @change="handleFileUpload($event)"
                name="image-upload"
                type="file"
                class="sr-only"
                accept="gif,jpeg,jpg,png,svg,ico"
              />
            </div>
          </div>
          <span class="text-sm">Upload image</span>
        </div>
      </div>
    </div>
    <div class="text-center">
      <div class="bg-orange-300 rounded-fulltransition ease-in-out" v-if="start">
        <svg
          class="animate-spin mx-auto h-8 w-8 text-white"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
        >
          <circle
            class="opacity-25"
            cx="12"
            cy="12"
            r="10"
            stroke="currentColor"
            stroke-width="4"
          ></circle>
          <path
            class="opacity-75"
            fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
          ></path>
        </svg>
      </div>
        <div v-if="media" class="px-5 py-2 text-sm">Completed</div>
    </div>

</template>

<script setup>

import { ref } from "vue";

const start = ref(false)
const media = ref('')
const emit = defineEmits(['getUrl'])


 function handleFileUpload(e) {
     start.value = true;
      var cloudName = 'arudovwen-me';
      var upload_preset = 'arudovwen';
      var url = "https://api.cloudinary.com/v1_1/" + cloudName + "/upload";

      var file = e.target.files[0];

          const formData = new FormData();
          formData.append("file", file);
          formData.append("upload_preset", upload_preset); // Replace the preset name with your own
          formData.append("api_key", "533392354591265"); // Replace API key with your own Cloudinary API key
          formData.append("timestamp", (Date.now() / 1000) | 0);

          return axios
            .post(`${url}`, formData, {
              headers: { "X-Requested-With": "XMLHttpRequest" },
            })
            .then((response) => {
               emit('getUrl',response.data.secure_url)
               media.value = response.data.secure_url
               start.value = false;
            })
            .catch((err) => {
             start.value = false;
            });
        }




</script>

<script setup>
import { PlusIcon } from "@heroicons/vue/solid";
import Create from "@/Projects/create";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
import { ref } from "vue";

import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogOverlay,
  DialogTitle,
} from "@headlessui/vue";

const isOpen = ref(false);
const type = ref("");
function toggleDemo(val) {
  type.value = val;
  isOpen.value = !isOpen.value;
}
const breakpoints = {
  200: {
    itemsToShow: 1.2,
    snapAlign: "center",
  },
  // 700px and up

  700: {
    itemsToShow: 2.5,
    snapAlign: "center",
  },
  // 1024 and up
  1024: {
    itemsToShow: 5,
    snapAlign: "start",
  },
};
</script>

<template>
  <div
    class="w-full md:h-[300px] bg-transparent ml-auto md:flex items-center md:pr-2"
  >
    <span class="p-3 hidden md:inline">
      <span
        class="
          w-[200px]
          h-[200px]
          border-2 border-white
          rounded-md
          p-5
          shadow-lg
          flex
          items-center
          justify-center
          cursor-pointer
        "
        @click="toggleDemo('create')"
      >
        <PlusIcon class="w-20 h-20 text-white" />
      </span>
    </span>
    <carousel
      :breakpoints="breakpoints"
      class="md:grow bg-transparent projects"
    >
      <slide
        v-for="slide in 5"
        :key="slide"
        class="px-2 w-[350px] md:h-[400px] relative"
      >
        <span
          @click="toggleDemo('zoom')"
          class="
            peer
            transition
            ease-in-out
            delay-150
            duration-300
            w-full
            h-[160px]
            md:h-[200px]
            border-2 border-white
            rounded-md
            md:hover:scale-125
            hover:z-40
            bg-white
            shadow-lg
            ring-offset-2
            hover:ring-4
            cursor-pointer
          "
        >
          {{ slide }}
        </span>
        <span
          class="
            absolute
            md:-bottom-4
            -bottom-16
            transition
            ease-in-out
            delay-150
            duration-300
            md:invisible md:peer-hover:visible
            text-center
            peer-hover:scale-125
          "
        >
          <span class="text-white font-bold text-base md:text-xl"
            >About Text</span
          >
          <br />
          <span class="text-white text-sm">Laravel , Vue Js</span>
        </span>
      </slide>

      <template #addons>
        <navigation />
      </template>
    </carousel>
  </div>

  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="isOpen = false">
      <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
          >
            <DialogOverlay class="fixed inset-0 bg-black opacity-60" />
          </TransitionChild>

          <span class="inline-block h-screen align-middle" aria-hidden="true">
            &#8203;
          </span>

          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <div
              :class="type == 'zoom' ? 'max-w-[80%]' : 'max-w-[30%]'"
              class="
                inline-block
                w-full
                p-6
                my-8
                overflow-hidden
                text-left
                align-middle
                transition-all
                transform
                bg-white
                shadow-xl
                rounded-2xl
              "
            >
              <Create v-if="type == 'create'" />
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>


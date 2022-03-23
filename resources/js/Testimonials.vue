<script setup>

import {ChatAlt2Icon,PlusCircleIcon} from '@heroicons/vue/solid'
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
import {ref} from 'vue'
import Create from './CreateTestimonials.vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogOverlay,
  DialogTitle,
} from "@headlessui/vue";
const isOpen = ref(false);
</script>

<template>
  <div
    class="
    mb-12 md:mb-0
      text-white
      bg-white-50
      backdrop-blur-sm
      bg-black/30
      py-8
      px-8
      rounded-t-3xl rounded-b-3xl
      relative
    "
  >
    <h2 class="text-white text-base md:text-2xl mb-6  flex items-center">
     Clients Testimonials
    </h2>
     <carousel :items-to-show="1" snap-align="center" :autoplay="5000" class=" bg-transparent">
      <slide
        v-for="slide in 5"
        :key="slide"
        class="p-6"

      > <div class="text-center w-full">
      <p class="text-gray-10 mb-4 text-sm md:text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium labore omnis expedita fugiat nemo, est accusamus tenetur excepturi amet soluta.</p>
      <p class="text-sm text-gray-50">John Doe</p>
       <p class="text-xs text-gray-50">John Doe, Project Manager, Karisoft</p>
    </div>

      </slide>

      <template #addons>
        <pagination />
      </template>
    </carousel>

    <ChatAlt2Icon  class="w-12 h-12 absolute top-5 right-5 text-gray-400"/>
     <PlusCircleIcon @click="isOpen=true"  class="w-8 h-8 absolute bottom-5 right-5 text-gray-400"/>

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

              class="
              max-w-[30%]
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
            <DialogTitle>Add Testimonial</DialogTitle>
            <Create />
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>


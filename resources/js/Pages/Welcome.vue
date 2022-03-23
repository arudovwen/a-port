<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { BellIcon, QuestionMarkCircleIcon } from "@heroicons/vue/solid";
import { ref, onMounted } from "vue";
import moment from "moment";

import Contact from "@/Contact";
import About from "@/About";
import Projects from "@/Projects";
import OngoingProjects from "@/OngoingProjects";
import Testimonials from "@/Testimonials.vue";
const titles = [
  'Front-End',
  'Back-End',
  'API'
]
const currentTime = ref(null);
const isOpen = ref(false);
const index = ref(0)
function updateCurrentTime() {
  currentTime.value = moment().format("LTS");
}
onMounted(() => {
  currentTime.value = moment().format("LTS");
  setInterval(() => updateCurrentTime(), 1 * 1000);
   setInterval(() => toggleWord(), 1 * 3500);


});

function toggleWord(){

    index.value++;
    if(index.value==3){
      index.value=0
    }

}


</script>

<template>
  <Head title="Arudovwen Says Welcome" />
  <section class="min-h-screen w-screen bg-fixed px-5 md:px-0">
    <div
      class="
        min-h-screen
        w-full
        flex
        justify-center
        items-center
        relative
         flex-col md:flex-row
        md:p-5
      "
    >
      <span
        class="
          absolute
          top-4
          md:top-10
          left-0
          md:left-8
          text-white
          flex
          items-center
        "
        ><img class="w-[35px] h-[35px] rounded-full bg-black mr-2" />
        <span>{{
          $page.props.auth.user ? $page.props.auth.user.name : "Annonymous"
        }}</span>
      </span>
      <span
        class="
          absolute
          top-4
          md:top-10
          right-0
          md:right-8
          text-white
          flex

          items-center
        "
      >
        <span
          class="
            bg-black/30
            backdrop-blur-md
            rounded-full
            w-8
            h-8
            flex
            items-center
            justify-center
          "
        >
          <BellIcon class="w-5 h-5"
        /></span>
        <span class="ml-2 text-sm">{{ currentTime }}</span></span
      >
      <p class="md:absolute top-10 text-white mb-16 md:mb-0 text-4xl md:text-3xl  ">
        <span

          class="transition ease-in-out delay-150 duration-300 md:hover:text-4xl font-bold"
        >
          Hello, do you need a <br class="md:hidden"> <span class="mx-1 text-gray-800">{{titles[index]}}</span> developer</span
        ></p
      >

      <Projects />
    </div>
    <About />

    <div
      class="
        md:w-[80%]
        flex flex-col-reverse
        md:flex-row md:justify-between
        mx-auto
        mt-24
        mb-8
        md:mb-0
      "
    >
      <div class="md:w-[50%] md:px-3">
        <span
          class="
            mb-4
            text-white
            backdrop-blur-sm
            bg-black/30
            px-8
            py-2
            rounded-full
            text-base
            md:text-xl
            flex
            items-center
            w-full
            md:w-fit
            text-center
            md:text-left
            justify-center
            md:justify-start
          "
        >
          Do you have a project in mind
          <QuestionMarkCircleIcon class="w-6 h-6 ml-1 text-white" />
        </span>
        <Contact />
      </div>

      <div class="md:w-[40%]">
        <OngoingProjects class="mb-6" />
        <Testimonials />
      </div>
    </div>
    <div class="text-center md:text-right mt-10 py-6 px-6">
      <span class="text-white text-sm"
        >Developed by Arudovwen.me ,&copy; {{ new Date().getFullYear() }}</span
      >
    </div>
  </section>
</template>

<style >
section {
  background-image: url("/images/bg2.jpeg");
  background-size: cover;
  background-position: center;
}
.carousel {
  background: transparent;
}
.carousel__prev--in-active,
.carousel__next--in-active {
  display: none;
}
.projects .carousel__viewport {
  overflow: unset;
  overflow-x: clip;
  background: transparent;
}
.projects .carousel__track {
  padding-left: 30px;
  background: transparent;

}
 @media (max-width: 768px) {
    .projects .carousel__track {
      padding-left: 0px;
      background: transparent;
    }
  }
.carousel__prev,
.carousel__next {
  background-color: #333;
}
</style>

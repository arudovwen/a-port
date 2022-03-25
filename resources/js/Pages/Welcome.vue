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
const titles = ["Front-End", "Back-End", "API"];
const currentTime = ref(null);
const isOpen = ref(false);
const index = ref(0);
const robot = ref("john");
function updateCurrentTime() {
  currentTime.value = moment().format("LTS");
}
onMounted(() => {
  currentTime.value = moment().format("LTS");
  setInterval(() => updateCurrentTime(), 1 * 1000);
  setInterval(() => toggleWord(), 1 * 3500);
  generate();
});

function toggleWord() {
  index.value++;
  if (index.value == 3) {
    index.value = 0;
  }
}
function generate() {

  const characters = "abcdefghijklmnopqrstuvwxyz";
  let result = " ";

  for (let i = 0; i < 5; i++) {
    result += characters.charAt(Math.floor(Math.random() * characters.length));
  }
  robot.value = result;

}
</script>

<template>
  <Head title="Success Ahon | Full stack web developer" />
  <section class="min-h-screen w-screen bg-fixed px-5 md:px-0">
    <div
      class="
        min-h-screen
        w-full
        flex
        justify-center
        items-center
        relative
        flex-col
        md:flex-row md:p-5
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
        ><img
          :src="`https://robohash.org/${robot}?set=set3`"
          class="
            w-[30px] h-[30px]
            md:w-[40px] md:h-[40px]
            rounded-full
            object-cover
            mr-1
          "
        />
        <span class="text-sm md:text-base">{{
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
          <BellIcon class="w-4 h-4 md:w-5 md:h-5"
        /></span>
        <span class="ml-2 text-xs md:text-sm">{{ currentTime }}</span></span
      >
      <p
        class="md:absolute top-10 text-white mb-16 md:mb-0 text-2xl sm:text-3xl md:text-3xl"
      >
        <span
          class="
            transition
            ease-in-out
            delay-150
            duration-300
            md:hover:text-4xl
            font-bold
          "
        >
          Hello, do you need a/an <br class="md:hidden" />
          <span class="text-black">{{ titles[index] }}</span>
          developer</span
        >
      </p>

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

    <div
      class="
        flex flex-col
        md:flex-row
        justify-between
        mt-10
        py-6
        px-6
        text-center
      "
    >
      <div
        class="
          flex
          justify-center
          md:justify-start
          text-sm text-white
          mb-3
          md:mb-0
        "
      >
        <a href="https://linkedin.com/in/success-ahon">
          <div class="px-md-3">
            <i class="fa fa-linkedin text-dark" aria-hidden="true"></i>
            <span class="d-none d-md-inline">Linkedin</span>
          </div></a
        >
        <a href="https://github.com/arudovwen">
          <div class="px-3">
            <i class="fa fa-github text-dark" aria-hidden="true"></i>
            <span class="d-none d-md-inline">Github</span>
          </div></a
        >
        <a href="https://wa.link/sapu5k"
          ><div class="px-3">
            <i class="fa fa-whatsapp text-dark" aria-hidden="true"></i>
            <span class="d-none d-md-inline">Whatsapp</span>
          </div></a
        >

        <a href="tel:+2348160723910">
          <div class="px-3">
            <i class="fa fa-phone-square text-dark" aria-hidden="true"></i>
            <span class="d-none d-md-inline">Phone</span>
          </div>
        </a>

        <a href="mailto:successahon@gmail.com"
          ><div class="px-3">
            <i class="fa fa-envelope text-dark" aria-hidden="true"></i>
            <span class="d-none d-md-inline">Email</span>
          </div></a
        >
      </div>
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
  /* .projects .carousel__viewport {
    overflow: hidden;
    overflow-x: hidden;
  } */
}
.carousel__prev,
.carousel__next {
  background-color: #333;
}
</style>

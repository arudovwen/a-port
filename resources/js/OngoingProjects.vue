<template>
    <div class="">
        <h2 class="text-white text-base md:text-xl mb-4">Ongoing Projects</h2>
        <div
          v-for="n in 2"
          :key="n"
          class="
            text-white
            backdrop-blur-sm
            bg-black/30
            px-4
            py-2
            rounded-full
            flex
            items-center
            mb-3
          "
        >
          <img class="w-[35px] h-[35px] rounded-full bg-black mr-2" /> Project
          {{ n }}
        </div>
      </div>
</template>
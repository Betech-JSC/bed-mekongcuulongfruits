<template>
    <div
        class="md:w-[60px] w-[45px] md:h-[60px] h-[45px] overflow-hidden cursor-pointer rounded-full bg-black duration-500 fixed xl:bottom-[50px] bottom-5 xl:right-[40px] right-5 z-[100] text-center flex flex-col items-center justify-center text-white"
        :class="isShowBtn ? 'translate-y-0' : 'translate-y-[200px]'"
        @click="scrollToTop"
    >
        <IconArrowUp class="text-white -rotate-90" />
    </div>
</template>
<script>
export default {
    data() {
        return {
            isShowBtn: false,
        }
    },
    mounted() {
        const self = this
        window.addEventListener('scroll', function () {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 500) {
                self.isShowBtn = true
            } else {
                self.isShowBtn = false
            }
        })
    },
    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            })
        },
    },
}
</script>

<template>
    <section class="relative">
        <swiper
            ref="swiperRef"
            :modules="[Autoplay, Pagination]"
            :slides-per-view="1"
            :space-between="0"
            :loop="true"
            :autoplay="{ delay: 2000, disableOnInteraction: false, pauseOnMouseEnter: true }"
            :breakpoints="breakpoints"
            :pagination="{ clickable: true, el: '.hero-pagination' }"
            @swiper="onSwiperInit"
            class="h-[520px] xl:h-[800px] max-h-screen overflow-hidden relative"
        >
            <swiper-slide v-for="(item, index) in items" :key="index">
                <div class="absolute inset-0">
                    <JPicture
                        :src="item.image.url || '/assets/images/home/bg-hero.webp'"
                        :srcMb="item.image_mobile.url || item.image.url || '/assets/images/home/bg-hero.webp'"
                        :alt="item.image.alt || item.title || 'image hero'"
                        wrapperClass="picture-cover"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="absolute inset-0 bg-black/40 w-full h-full"></div>
                <div class="absolute inset-0 bg-[#1A4728]/10 w-full h-full"></div>
                <div class="relative h-full">
                    <div class="container h-full">
                        <div class="grid grid-cols-12 gap-4 md:gap-6 xl:gap-8 h-full">
                            <div
                                class="col-span-full md:col-span-8 lg:col-span-7 flex items-center h-full"
                            >
                                <div class="space-y-5 md:space-y-[24px] xl:space-y-[30px] max-w-[600px] w-full">
                                    <h1 class="display-2 font-bold uppercase text-brand-200">
                                        {{ item.title || '' }}
                                    </h1>
                                    <a
                                        v-if="item.link"
                                        :href="item.link"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="btn btn-primary space-x-3 flex items-center justify-center"
                                    >
                                        <span>{{ tt('Nhận tư vấn ngay') }}</span>
                                        <Arrow />
                                    </a>
                                    <Link
                                        v-else
                                        :href="route('contact')"
                                        class="btn btn-primary space-x-3 flex items-center justify-center"
                                    >
                                        <span>{{ tt('Nhận tư vấn ngay') }}</span>
                                        <Arrow />
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </swiper-slide>
        </swiper>

        <!-- Pagination đặt ngoài để dễ style/định vị -->
        <div class="hero-pagination absolute left-0 translate-x-[144px] !bottom-8 z-10"></div>
    </section>
</template>

<script>
import { ref } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/pagination'

import Arrow from '@/Components/Icons/Arrow.vue'

export default {
    props: {
        items: {
            type: Array,
            default: () => [],
        },
        breakpoints: {
            type: Object,
            default: () => ({
                320: { slidesPerView: 1, spaceBetween: 0 },
                768: { slidesPerView: 1, spaceBetween: 0 },
                1024: { slidesPerView: 1, spaceBetween: 0 },
            }),
        },
    },
    components: {
        Swiper,
        SwiperSlide,
        Arrow,
    },
    setup() {
        const swiperRef = ref(null)
        const swiperInstance = ref(null)

        const onSwiperInit = (swiper) => {
            swiperInstance.value = swiper
        }

        const onPrevClick = () => {
            swiperInstance.value
                ? swiperInstance.value.slidePrev()
                : console.error('Swiper instance not initialized yet.')
        }

        const onNextClick = () => {
            swiperInstance.value
                ? swiperInstance.value.slideNext()
                : console.error('Swiper instance not initialized yet.')
        }

        return {
            Autoplay,
            Pagination,
            swiperRef,
            // onPrevClick,
            // onNextClick,
            onSwiperInit,
        }
    },
}
</script>

<style lang="scss" scoped>
/* Style pagination bullets */
:deep(.hero-pagination .swiper-pagination-bullet) {
    @apply w-3 h-3 bg-[#D9D9D9] opacity-100;
    transition: transform 0.2s ease;
}
:deep(.hero-pagination .swiper-pagination-bullet-active) {
    @apply bg-brand-300;
}
/* Tuỳ chọn: giãn cách bullets */
:deep(.hero-pagination) {
    @apply flex items-center gap-2;
}
</style>

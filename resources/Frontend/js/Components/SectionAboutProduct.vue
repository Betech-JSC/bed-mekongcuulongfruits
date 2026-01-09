<template>
    <section class="bg-brand-300 md:py-16 py-12 xl:py-20 relative overflow-hidden">
        <div class="container md:space-y-[56px] space-y-8 xl:space-y-20">
            <div class="space-y-8">
                <div class="headline-1 font-bold text-gray-900 text-center">Vietnam Agricultural Products Exporter
                    <br />
                    Fresh Fruits &
                    Agricultural Products from Vietnam
                </div>
                <div class="body-0 text-gray-900 text-center">Vietnam Farmer Co., Ltd is a company specializing in the
                    export of fresh fruits and agricultural products from Vietnam, serving 100% international markets.
                    We
                    dedicate all our resources to meet stringent quality standards and customer requirements for product
                    control.</div>
            </div>

            <div class="md:space-y-[56px] space-y-8 xl:space-y-[72px]">
                <h2 class="display-3 font-bold text-center text-primary">Main products</h2>
                <div class="relative">
                    <button class="btn-swiper swiper-button-prev" @click="onPrevClick">
                        <ArrowSlider />
                    </button>
                    <button class="btn-swiper swiper-button-next" @click="onNextClick">
                        <ArrowSlider />
                    </button>
                    <!-- Sliders -->
                    <swiper ref="swiperRef" :slides-per-view="4" :space-between="32" :loop="true"
                        :autoplay="{ delay: 1000, disableOnInteraction: false }" :breakpoints="breakpoints"
                        @swiper="onSwiperInit" class="swiper-product">
                        <swiper-slide v-for="(item, index) in items" :key="index">
                            <CardProductAbout :item="item" />
                        </swiper-slide>
                    </swiper>
                </div>
            </div>

            <div class="space-y-12">
                <h2 class="display-3 font-bold text-primary">Product origins</h2>

                <div class="grid grid-cols-12 gap-8">
                    <div class="col-span-4"></div>
                    <div class="col-span-6"></div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { ref } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'
import CardProductAbout from './Card/CardProductAbout.vue'
import ArrowSlider from '@/Components/Icons/ArrowSlider.vue'
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
                320: { slidesPerView: 1.4, spaceBetween: 16 },
                768: { slidesPerView: 2.6, spaceBetween: 24 },
                1024: { slidesPerView: 3.3, spaceBetween: 26 },
                1280: { slidesPerView: 4, spaceBetween: 32 },
            }),
        },
    },
    components: {
        Swiper,
        SwiperSlide,
        CardProductAbout,
        ArrowSlider,
        Arrow,
    },
    data() {
        return {
            itemsOrigin: [
                {
                    image: {
                        url: '/assets/images/demo/image-location-1.jpg',
                        alt: "image location 1"
                    },
                    title: 'Mekong Delta (ĐBSCL)',
                    description: 'Leading region for fresh fruit exports.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-2.jpg',
                        alt: "image location 2"
                    },
                    title: 'Mekong Delta (ĐBSCL)',
                    description: 'Leading region for fresh fruit exports.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-3.jpg',
                        alt: "image location 3"
                    },
                    title: 'Mekong Delta (ĐBSCL)',
                    description: 'Leading region for fresh fruit exports.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-4.jpg',
                        alt: "image location 4"
                    },
                    title: 'Mekong Delta (ĐBSCL)',
                    description: 'Leading region for fresh fruit exports.',
                },
            ],
        }
    },
    setup(props) {
        const swiperRef = ref(null) // Tạo ref cho Swiper
        const swiperInstance = ref(null) // Tạo ref để lưu instance Swiper

        // Lấy instance Swiper từ sự kiện
        const onSwiperInit = (swiper) => {
            swiperInstance.value = swiper
        }

        // Xử lý sự kiện nút Previous
        const onPrevClick = () => {
            if (swiperInstance.value) {
                swiperInstance.value.slidePrev()
            } else {
                console.error('Swiper instance not initialized yet.')
            }
        }

        // Xử lý sự kiện nút Next
        const onNextClick = () => {
            if (swiperInstance.value) {
                swiperInstance.value.slideNext()
            } else {
                console.error('Swiper instance not initialized yet.')
            }
        }

        return {
            swiperRef,
            onPrevClick,
            onNextClick,
            onSwiperInit,
        }
    },
}
</script>

<style lang="scss" scoped>
.btn-swiper {
    @apply absolute z-10 top-1/2 -translate-y-1/2 w-12 h-12 bg-white text-brand-100 rounded-full lg:hover:bg-brand-100 lg:hover:text-brand-200 hidden lg:flex items-center justify-center duration-300 ease-in-out;
}

.swiper-button-prev {
    @apply -left-4 xl:-left-16 rotate-180;
}

.swiper-button-next {
    @apply -right-4 xl:-right-16;
}

:deep(.swiper-product) {
    overflow: visible;
}
</style>

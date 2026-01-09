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

            <div class="md:space-y-8 space-y-6 xl:space-y-12">
                <h2 class="display-3 font-bold text-primary">Product origins</h2>

                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="md:col-span-6 col-span-full xl:col-span-4">
                        <CardProductOrigin :item="itemsOrigin[0]" />
                    </div>
                    <div class="md:col-span-6 col-span-full xl:col-span-6">
                        <CardProductOrigin :item="itemsOrigin[1]" />
                    </div>
                </div>

                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="md:col-span-6 col-span-full xl:col-span-7 xl:col-start-2">
                        <CardProductOrigin :item="itemsOrigin[2]" />
                    </div>
                    <div class="md:col-span-6 col-span-full xl:col-span-4">
                        <CardProductOrigin :item="itemsOrigin[3]" />
                    </div>
                </div>

                <div class="title-2 font-medium text-center max-w-[880px] w-full mx-auto">
                    We do not sell products – we offer total product control. Each shipment is strictly managed from
                    cultivation, harvesting, preliminary processing, grading, packaging, to transportation, ensuring
                    consistent quality, traceable origins, and sustainable value for international customers.
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary-25 md:py-20 py-12 xl:py-[100px]">
        <div class="container md:space-y-[80px] space-y-[64px] xl:space-y-[120px]">
            <!-- TODO: Chưa chốt Mission & Vision -->

            <div class="relative">
                <JPicture src="/assets/images/about/bg-core-value.png" alt="background core value"
                    class="w-full h-full object-cover" />
            </div>

            <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                <div class="col-span-full lg:col-span-5 xl:col-span-4 flex flex-col justify-center gap-3 xl:gap-6">
                    <h2 class="display-3 font-bold text-primary uppercase">Why Choose Vietnam Farmer</h2>
                    <ul class="md:space-y-3 space-y-2 xl:space-y-4">
                        <li v-for="(itemChoose, indexChoose) in whyChooses" :key="indexChoose"
                            class="flex items-center gap-2 title-2 font-semibold">
                            <Leaf />
                            <span>{{ itemChoose }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-span-full lg:col-span-7 xl:col-span-8">
                    <div class="relative rounded-[16px] overflow-hidden">
                        <JPicture src="/assets/images/about/bg-why-choose.jpg" alt="background why choose"
                            class="w-full h-full object-cover" />
                    </div>
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
import CardProductOrigin from './Card/CardProductOrigin.vue'
import ArrowSlider from '@/Components/Icons/ArrowSlider.vue'
import Arrow from '@/Components/Icons/Arrow.vue'
import Leaf from './Icons/Leaf.vue'

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
        CardProductOrigin,
        ArrowSlider,
        Arrow,
        Leaf
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
                    title: 'Southeast Vietnam',
                    description: 'Fruits combined with industrial processing.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-3.jpg',
                        alt: "image location 3"
                    },
                    title: 'Central Highlands',
                    description: 'High-value agricultural products: coffee, pepper, cashew.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-4.jpg',
                        alt: "image location 4"
                    },
                    title: 'South Central Coast',
                    description: 'High-quality tropical agricultural products.',
                },
            ],
            whyChooses: [
                "100% Export Focus",
                "Stable & Diverse Source",
                "Full Traceability",
                "International Standards",
                "Global Expertise",
                "Flexible Customization",
            ]
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

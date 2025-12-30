<template>
    <section class="xl:pt-20 xl:pb-[60px] md:py-16 py-12">
        <div class="container space-y-12 md:space-y-16 xl:space-y-20">
            <div class="flex lg:flex-row flex-col items-start md:gap-6 gap-4 xl:gap-8">
                <div class="max-w-full lg:max-w-[320px] w-full">
                    <div class="headline-2 font-bold text-brand-100 uppercase">
                        Certified Quality, Trusted Worldwide
                    </div>
                </div>
                <div class="body-1 text-gray-900">
                    At VietNam Farmer, quality and safety are our top priorities. We comply with international standards
                    and hold globally recognized certifications to ensure our products meet the highest requirements of
                    importers and consumers.
                </div>
            </div>
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div class="headline-1 font-bold text-brand-100 uppercase">Availability season</div>
                    <div class="flex items-center gap-8">
                        <!-- Button Pagination -->
                        <button
                            @click="slidePrev"
                            class="w-12 h-12 flex items-center justify-center text-brand-100 lg:hover:text-brand-300 duration-300 ease-in-out"
                            :disabled="isBeginning"
                            :class="{ 'opacity-50 cursor-not-allowed': isBeginning }"
                        >
                            <ArrowSlider class="rotate-180" />
                        </button>
                        <button
                            @click="slideNext"
                            class="w-12 h-12 flex items-center justify-center text-brand-100 lg:hover:text-brand-300 duration-300 ease-in-out"
                            :disabled="isEnd"
                            :class="{ 'opacity-50 cursor-not-allowed': isEnd }"
                        >
                            <ArrowSlider />
                        </button>
                    </div>
                </div>

                <!-- Custom Title Pagination -->
                <div class="scrollbar-hide overflow-x-auto ">
                    <div class="flex items-center gap-3 md:gap-4 pb-2 w-full">
                    <button
                        v-for="(item, index) in items"
                        :key="index"
                        @click="slideTo(index)"
                        class="label-1 font-semibold flex items-center gap-2.5 p-2 md:p-3 rounded-xl transition-all duration-300"
                        :class="
                            activeIndex === index
                                ? 'bg-brand-100 text-white'
                                : 'bg-brand-200 text-gray-900 lg:hover:bg-brand-300'
                        "
                    >
                        <div class="w-8 h-8">
                            <div class="aspect-w-1 aspect-h-1">
                                <JPicture
                                    :src="item.icon.url"
                                    :alt="item.icon.alt || item.title"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                        </div>
                        <div class="flex-1 w-max">{{ item.title }}</div>
                    </button>
                </div>
                </div>

                <!-- Sliders -->
                <swiper
                    :modules="modules"
                    :slides-per-view="1"
                    :space-between="24"
                    :loop="false"
                    :navigation="false"
                    @swiper="onSwiper"
                    @slideChange="onSlideChange"
                    class="availability-swiper"
                >
                    <swiper-slide v-for="(item, index) in items" :key="index">
                        <div class="">
                            <JPicture
                                :src="item.image.url"
                                :alt="item.image.alt || item.title"
                                class="w-full h-full object-contain"
                            />
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
        </div>
    </section>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'
import ArrowSlider from './Icons/ArrowSlider.vue'

export default {
    components: {
        Swiper,
        SwiperSlide,
        ArrowSlider,
    },
    props: ['items'],
    data() {
        return {
            modules: [],
            swiperInstance: null,
            isBeginning: true,
            isEnd: false,
            activeIndex: 0,
        }
    },
    methods: {
        onSwiper(swiper) {
            this.swiperInstance = swiper
            this.updateNavigationState()
        },
        onSlideChange(swiper) {
            this.activeIndex = swiper.activeIndex
            this.updateNavigationState()
        },
        updateNavigationState() {
            if (this.swiperInstance) {
                this.isBeginning = this.swiperInstance.isBeginning
                this.isEnd = this.swiperInstance.isEnd
            }
        },
        slidePrev() {
            if (this.swiperInstance) {
                this.swiperInstance.slidePrev()
            }
        },
        slideNext() {
            if (this.swiperInstance) {
                this.swiperInstance.slideNext()
            }
        },
        slideTo(index) {
            if (this.swiperInstance) {
                this.swiperInstance.slideTo(index)
            }
        },
    },
}
</script>

<style>
/* Hide scrollbar */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.availability-swiper {
    padding-bottom: 0;
}
</style>

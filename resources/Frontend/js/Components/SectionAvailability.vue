<template>
    <section class="xl:pt-20 xl:pb-[60px] md:py-16 py-12">
        <div class="container space-y-12 md:space-y-16 xl:space-y-20">
            <div class="flex lg:flex-row flex-col items-start md:gap-6 gap-4 xl:gap-8">
                <div class="max-w-full lg:max-w-[320px] w-full">
                    <div class="headline-2 font-bold text-brand-100 uppercase">
                        Chất lượng được kiểm chứng, Tin cậy toàn cầu
                    </div>
                </div>
                <div class="md:space-y-6 space-y-4 xl:space-y-8">
                    <div class="body-1 text-gray-900">
                        Tại Vietnam Farmer, chất lượng và an toàn là ưu tiên hàng đầu của chúng tôi. Chúng tôi tuân thủ
                        các tiêu chuẩn quốc tế
                        và nắm giữ các chứng nhận được công nhận toàn cầu để đảm bảo sản phẩm của chúng tôi đáp ứng các
                        yêu cầu cao nhất của
                        nhà nhập khẩu và người tiêu dùng.
                    </div>
                    <div class="flex items-center gap-4">
                        <div v-for="(itemCertificate, indexCertificate) in certifications" :key="indexCertificate"
                            class="w-auto h-[90px] xl:h-[120px]">
                            <JPicture :src="itemCertificate.image?.url"
                                :alt="itemCertificate.image?.alt || itemCertificate.title"
                                class="w-full h-full object-contain" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div class="headline-1 font-bold text-brand-100 uppercase">Mùa vụ</div>
                    <div class="flex items-center md:gap-6 gap-4 xl:gap-8">
                        <!-- Button Pagination -->
                        <button @click="slidePrev"
                            class="md:w-12 md:h-12 w-8 h-8 flex items-center justify-center text-brand-100 lg:hover:text-brand-300 duration-300 ease-in-out"
                            :disabled="isBeginning" :class="{ 'opacity-50 cursor-not-allowed': isBeginning }">
                            <ArrowSlider class="rotate-180" />
                        </button>
                        <button @click="slideNext"
                            class="md:w-12 md:h-12 w-8 h-8 flex items-center justify-center text-brand-100 lg:hover:text-brand-300 duration-300 ease-in-out"
                            :disabled="isEnd" :class="{ 'opacity-50 cursor-not-allowed': isEnd }">
                            <ArrowSlider />
                        </button>
                    </div>
                </div>

                <!-- Custom Title Pagination -->
                <div class="scrollbar-hide overflow-x-auto ">
                    <div class="flex items-center gap-3 md:gap-4 pb-2 w-full">
                        <button v-for="(item, index) in items" :key="index" @click="slideTo(index)"
                            class="label-1 font-semibold flex items-center gap-2.5 p-2 md:p-3 rounded-xl transition-all duration-300"
                            :class="activeIndex === index
                                ? 'bg-brand-100 text-white'
                                : 'bg-brand-200 text-gray-900 lg:hover:bg-brand-300'
                                ">
                            <div class="w-8 h-8">
                                <div class="aspect-w-1 aspect-h-1">
                                    <JPicture :src="item.image?.static_url || '/assets/images/placeholder-square.png'"
                                        :alt="item.image?.alt || item.title" class="w-full h-full object-cover" />
                                </div>
                            </div>
                            <div class="flex-1 w-max">{{ item.title }}</div>
                        </button>
                    </div>
                </div>

                <!-- Sliders -->
                <swiper :modules="modules" :slides-per-view="1" :space-between="24" :loop="false" :navigation="false"
                    @swiper="onSwiper" @slideChange="onSlideChange" class="availability-swiper">
                    <swiper-slide v-for="(item, index) in items" :key="index">
                        <div v-if="item.image_harvest_season">
                            <JPicture :src="item.image_harvest_season?.static_url"
                                :alt="item.image_harvest_season?.alt || item.title"
                                class="w-full h-full object-contain" />
                        </div>
                        <div v-else class=" flex flex-col items-center xl:gap-8 md:gap-6 gap-4">
                            <div class="max-w-[150px] md:max-w-[320px] w-full">
                                <JPicture src="/assets/images/placeholder-square.png" alt="image empty chart"
                                    class="w-full h-full object-cover" />
                            </div>
                            <h3 class="headline-3 font-bold uppercase text-primary max-md:hidden">Chưa có thông tin biểu
                                đồ</h3>
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
    props: ['items', 'certifications'],
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

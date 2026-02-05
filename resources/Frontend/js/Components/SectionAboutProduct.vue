<template>
    <section class="bg-brand-300 md:py-16 py-12 xl:py-20 relative overflow-hidden">
        <div class="container md:space-y-[56px] space-y-8 xl:space-y-20">
            <div class="space-y-8">
                <div class="headline-1 font-bold text-gray-900 text-center">Nhà Xuất Khẩu Nông Sản Việt Nam
                    <br />
                    Trái Cây Tươi &
                    Nông Sản Từ Việt Nam
                </div>
                <div class="body-0 text-gray-900 text-center">Vietnam Farmer Co., Ltd là công ty chuyên xuất khẩu trái
                    cây tươi và nông sản từ Việt Nam, phục vụ 100% thị trường quốc tế.
                    Chúng tôi dành trọn nguồn lực để đáp ứng các tiêu chuẩn chất lượng nghiêm ngặt và yêu cầu kiểm soát
                    sản phẩm của khách hàng.</div>
            </div>

            <div class="md:space-y-[56px] space-y-8 xl:space-y-[72px]">
                <h2 class="display-3 font-bold text-center text-primary">Sản phẩm chính</h2>
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
                <h2 class="display-3 font-bold text-primary">Nguồn gốc nông sản</h2>

                <div class="space-y-8">
                    <div class="grid grid-cols-12 md:gap-5 gap-4 xl:gap-6">
                        <div class="md:col-span-6 col-span-full xl:col-span-4">
                            <CardProductOrigin :item="itemsOrigin[0]" />
                        </div>
                        <div class="md:col-span-6 col-span-full xl:col-span-8">
                            <CardProductOrigin :item="itemsOrigin[1]" />
                        </div>
                    </div>

                    <div class="grid grid-cols-12 md:gap-5 gap-4 xl:gap-6">
                        <div class="md:col-span-6 col-span-full">
                            <CardProductOrigin :item="itemsOrigin[2]" />
                        </div>
                        <div class="md:col-span-6 col-span-full">
                            <CardProductOrigin :item="itemsOrigin[3]" />
                        </div>
                    </div>
                </div>

                <div class="title-2 font-medium text-center max-w-[880px] w-full mx-auto">
                    Chúng tôi không chỉ bán sản phẩm – chúng tôi cung cấp sự kiểm soát toàn diện. Mỗi lô hàng đều được
                    quản lý chặt chẽ từ
                    vùng trồng, thu hoạch, sơ chế, phân loại, đóng gói đến vận chuyển, đảm bảo chất lượng đồng nhất,
                    nguồn gốc rõ ràng và giá trị bền vững cho khách hàng quốc tế.
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary-25 md:py-20 py-12 xl:py-[100px]">
        <div class="container md:space-y-[80px] space-y-[64px] xl:space-y-[120px]">
            <div class="grid md:grid-cols-2 gap-4 md:gap-6 xl:gap-12">
                <div class="relative rounded-[16px] overflow-hidden">
                    <JPicture src="/assets/images/about/bg-vision-mission.png" alt="background vision mission"
                        class="w-full h-full object-cover" />
                </div>
                <div class="space-y-3">
                    <div v-for="(itemValue, indexValue) in keys" :key="indexValue"
                        class="gap-3 md:p-5 p-4 xl:p-6 space-y-4 md:space-y-5 xl:space-y-6 rounded-[16px] md:rounded-[20px] xl:rounded-[24px] bg-white">
                        <div
                            class="flex items-center gap-3 justify-center gap-6 headline-3 text-primary font-bold uppercase">
                            <div class="xl:w-12 xl:h-12 md:w-10 md:h-10 w-8 h-8">
                                <JPicture :src="itemValue.image.url" :alt="itemValue.image.alt"
                                    class="w-full h-full object-cover" />
                            </div>
                            <span>{{ itemValue.title }}</span>
                        </div>
                        <div class="prose prose-value" v-html="itemValue.description"></div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <JPicture src="/assets/images/about/bg-corevalue.png" alt="background core value"
                    class="w-full h-full object-cover" />
            </div>

            <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                <div class="col-span-full lg:col-span-5 xl:col-span-4 flex flex-col justify-center gap-3 xl:gap-6">
                    <h2 class="display-3 font-bold text-primary uppercase">Tại sao chọn Vietnam Farmer</h2>
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
            keys: [
                {
                    image: {
                        url: '/assets/images/about/icon-vision.png',
                        alt: 'vision'
                    },
                    title: 'Tầm nhìn',
                    description: `
                        <p>Trở thành nhà xuất khẩu nông sản Việt Nam hàng đầu, được khách hàng quốc tế tin cậy thông qua:</p>
                        <ul>
                            <li>Nguồn cung ứng đa dạng từ các vùng nông nghiệp trọng điểm.</li>
                            <li>Quy trình kiểm soát chất lượng và xuất khẩu toàn diện đáp ứng tiêu chuẩn quốc tế.</li>
                            <li>Dịch vụ chuyên nghiệp và tin cậy, giúp nông sản Việt Nam vươn xa trên thị trường toàn cầu.</li>
                        </ul>
                    `,
                },
                {
                    image: {
                        url: '/assets/images/about/icon-mission.png',
                        alt: 'mission'
                    },
                    title: 'Sứ mệnh',
                    description: `
                        <ul>
                            <li>Cung cấp nông sản đạt chuẩn xuất khẩu quốc tế, đảm bảo an toàn thực phẩm và truy xuất nguồn gốc.</li>
                            <li>Xây dựng chuỗi cung ứng bền vững, nâng cao giá trị nông sản Việt và đảm bảo lợi ích cho người nông dân.</li>
                            <li>Quảng bá thương hiệu nông sản Việt Nam thông qua chất lượng ổn định và sự kiểm soát sản phẩm toàn diện.</li>
                        </ul>
                    `,
                },
            ],
            itemsOrigin: [
                {
                    image: {
                        url: '/assets/images/demo/image-location-1.jpg',
                        alt: "image location 1"
                    },
                    title: 'Đồng bằng sông Cửu Long',
                    description: 'Vùng trọng điểm xuất khẩu trái cây tươi.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-2.jpg',
                        alt: "image location 2"
                    },
                    title: 'Đông Nam Bộ',
                    description: 'Trái cây kết hợp chế biến công nghiệp.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-3.jpg',
                        alt: "image location 3"
                    },
                    title: 'Tây Nguyên',
                    description: 'Nông sản giá trị cao: cà phê, hồ tiêu, điều.',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-location-4.jpg',
                        alt: "image location 4"
                    },
                    title: 'Duyên hải Nam Trung Bộ',
                    description: 'Nông sản nhiệt đới chất lượng cao.',
                },
            ],
            whyChooses: [
                "100% Tập trung Xuất khẩu",
                "Nguồn hàng Ổn định & Đa dạng",
                "Truy xuất Nguồn gốc Đầy đủ",
                "Tiêu chuẩn Quốc tế",
                "Chuyên môn Toàn cầu",
                "Tùy chỉnh Linh hoạt",
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

:deep(.prose-value) {
    @apply text-[14px] leading-[150%] font-sans font-medium text-gray-900;

    ul {
        @apply pl-1;
    }
}
</style>

<template>
    <main class="bg-primary-25">
        <BannerIcon :banner="banner" />
        <section class="md:py-16 py-12 xl:py-20">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="col-span-full lg:col-span-6 space-y-2 md:space-y-3 xl:space-y-4">
                        <div class="title-2 text-primary-900">
                            {{ tt('Chúng tôi là ai?') }}
                        </div>
                        <h2 class="display-3 text-primary-800 uppercase">
                            {{ tt('Agency chuyên cung cấp dịch vụ marketing trọn gói') }}
                        </h2>
                        <div class="body-1 text-gray-900 space-y-3 md:space-y-4 xl:space-y-6">
                            <p>
                                {{
                                    tt(
                                        'Sip N Source là agency chuyên cung cấp dịch vụ marketing trọn gói dành riêng cho các thương hiệu rượu nhập khẩu tại Việt Nam.'
                                    )
                                }}
                            </p>
                            <p>
                                {{
                                    tt(
                                        'Với nền tảng hơn 20 năm kinh nghiệm trong ngành và sự thấu hiểu sâu sắc về thị trường cao cấp, chúng tôi giúp thương hiệu rượu không chỉ hiện diện – mà còn ghi dấu trong tâm trí người thưởng thức.'
                                    )
                                }}
                            </p>
                        </div>
                        <ul class="space-y-2 md:space-y-3 xl:space-y-4">
                            <li
                                v-for="(itemAgency, indexAgency) in agencies"
                                :key="indexAgency"
                                class="flex items-center button-1 text-primary-700 gap-2"
                            >
                                <Star />
                                <span>{{ itemAgency }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-full lg:col-span-6 my-auto">
                        <div class="aspect-w-7 aspect-h-5">
                            <JPicture
                                src="/assets/images/about/image-about.webp"
                                alt="image about"
                                wrapperClass="picture-cover"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <JPicture
                src="/assets/images/about/bg-about.webp"
                loading="eager"
                class="object-fit h-full w-full object-cover"
                alt="background about"
            />
        </section>
        <section ref="numberSection" class="md:py-16 py-12 xl:py-20">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="lg:col-span-6 col-span-full xl:col-span-7">
                        <div class="xl:aspect-w-16 xl:aspect-h-9 aspect-w-3 aspect-h-2">
                            <JPicture
                                src="/assets/images/about/image-number.webp"
                                loading="eager"
                                class="object-fit h-full w-full object-cover"
                                alt="image number"
                            />
                        </div>
                    </div>
                    <div class="lg:col-span-6 col-span-full xl:col-span-5 md:space-y-3 space-y-2 xl:space-y-4">
                        <div class="title-2 text-gray-900">
                            {{ tt('Điều chúng tôi làm') }}
                        </div>
                        <h2 class="display-3 text-primary-800 uppercase">
                            {{ tt('Chúng tôi kể đúng câu chuyện của bạn.') }}
                        </h2>
                        <div class="body-1 text-gray-900 md:space-y-5 space-y-3 xl:space-y-6">
                            <p>
                                {{
                                    tt(
                                        'Từ chiến lược thương hiệu, tổ chức sự kiện, thiết kế POSM, đến các giải pháp quảng bá tại điểm bán - mọi hoạt động đều được thiết kế riêng cho ngành rượu.'
                                    )
                                }}
                            </p>
                            <p>
                                {{
                                    tt(
                                        'Chúng tôi tin rằng mỗi dòng rượu đều có bản sắc riêng, và nhiệm vụ của chúng tôi là giúp thương hiệu kể được câu chuyện ấy một cách ấn tượng và đầy cảm xúc.'
                                    )
                                }}
                            </p>
                        </div>
                    </div>
                    <div
                        v-for="(itemNumber, indexNumber) in numbers"
                        :key="indexNumber"
                        class="col-span-6 xl:col-span-3 space-y-2 xl:space-y-3"
                    >
                        <div class="display-1 !leading-[100%] text-primary-800">+{{ itemNumber.count }}</div>
                        <div class="title-1 text-gray-900">{{ itemNumber.description }}</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-primary-100 py-10 space-y-8 xl:space-y-10">
            <div class="container">
                <h2 class="display-3 text-center text-primary-800 uppercase">
                    {{ tt('Đối tác đã tin tưởng chúng tôi') }}
                </h2>
            </div>
            <UIPartner :items="partners" />
        </section>
        <SectionParallax
            image="/assets/images/about/bg-parallax.webp"
            title="Mỗi thương hiệu rượu đều có một câu chuyện riêng. Chúng tôi giúp bạn kể nó một cách đáng nhớ."
        />
        <SectionSlider title="Dấu ấn Khơi Vị" :items="posts" />
        <SectionContact class="max-md:pb-12" />
    </main>
</template>
<script>
import Star from '@/Components/Icons/Star.vue'
import BannerIcon from '@/Components/BannerIcon.vue'

export default {
    props: ['posts'],
    components: {
        Star,
        BannerIcon,
    },
    data() {
        return {
            banner: {
                title: this.tt('Đồng hành cùng thương hiệu tạo nên dấu ấn riêng'),
                image: '/assets/images/home/bg-story.webp',
                breadcrumbs: [
                    {
                        title: this.tt('Giới thiệu'),
                    },
                ],
            },
            agencies: [
                this.tt('Tư vấn chiến lược'),
                this.tt('Tổ chức sự kiện theo yêu cầu'),
                this.tt('Thiết kế và sản xuất POSM, quà tặng'),
                this.tt('Quản lý hình ảnh thương hiệu tại điểm bán'),
            ],
            numbers: [
                {
                    title: '+20',
                    description: 'Năm kinh nghiệm',
                    count: 0,
                },
                {
                    title: '+231',
                    description: 'Dự án hoàn thiện',
                    count: 0,
                },
                {
                    title: '+99',
                    description: 'Sự kiện tổ chức',
                    count: 0,
                },
                {
                    title: '+49',
                    description: 'Thương hiệu đồng hành',
                    count: 0,
                },
            ],
            partners: [
                {
                    image: '/assets/images/home/image-partner-1.webp',
                    title: 'image partner',
                },
                {
                    image: '/assets/images/home/image-partner-2.webp',
                    title: 'image partner',
                },
                {
                    image: '/assets/images/home/image-partner-3.webp',
                    title: 'image partner',
                },
                {
                    image: '/assets/images/home/image-partner-4.webp',
                    title: 'image partner',
                },
                {
                    image: '/assets/images/home/image-partner-5.webp',
                    title: 'image partner',
                },
                {
                    image: '/assets/images/home/image-partner-6.webp',
                    title: 'image partner',
                },
                {
                    image: '/assets/images/home/image-partner-7.webp',
                    title: 'image partner',
                },
                {
                    image: '/assets/images/home/image-partner-8.webp',
                    title: 'image partner',
                },
            ],
            signs: [
                {
                    image: '/assets/images/home/image-sign-1.webp',
                    title: 'CHIVAS MASTERCLASS - Saigon Edition',
                },
                {
                    image: '/assets/images/home/image-sign-2.webp',
                    title: `WINE DINNER "SPIRIT OF BORDEAUX" tại The Deck Saigon`,
                },
                {
                    image: '/assets/images/home/image-sign-1.webp',
                    title: 'Natural Yagurt',
                },
                {
                    image: '/assets/images/home/image-sign-2.webp',
                    title: 'NAVAS MASTERCLASS - Ha Noi Edition',
                },
            ],
        }
    },
    mounted() {
        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        this.numbers.forEach((item, index) => {
                            const number = parseInt(item.title.replace('+', ''))
                            this.animateCounter(index, number)
                        })
                        observer.unobserve(entry.target) // Only trigger once
                    }
                })
            },
            { threshold: 0.6 }
        )

        if (this.$refs.numberSection) {
            observer.observe(this.$refs.numberSection)
        }
    },
    methods: {
        animateCounter(index, endValue) {
            const duration = 1500
            const start = 0
            const startTime = performance.now()

            const update = (currentTime) => {
                const progress = Math.min((currentTime - startTime) / duration, 1)
                const currentValue = Math.floor(progress * endValue)

                this.numbers[index].count = currentValue

                if (progress < 1) {
                    requestAnimationFrame(update)
                }
            }

            requestAnimationFrame(update)
        },
    },
}
</script>

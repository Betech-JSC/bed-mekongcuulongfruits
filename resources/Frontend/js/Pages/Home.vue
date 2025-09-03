<template>
    <main class="bg-primary-25">
        <SectionHeroSlider :items="sliders" />
        <section v-if="services && services.length > 0" class="py-12 md:py-16 xl:py-20">
            <div class="container md:space-y-6 space-y-4 xl:space-y-8">
                <h2 class="display-2 text-primary uppercase">{{ tt('Dịch vụ của chúng tôi') }}</h2>
                <div class="grid md:grid-cols-3 gap-x-4 xl:gap-x-6 md:gap-y-6 gap-y-4 xl:gap-y-8">
                    <CardCardService class="col-span-full" :item="services[0]" :isLarge="true" />
                    <CardCardService
                        v-for="(itemService, indexService) in services.slice(1)"
                        :key="indexService"
                        :item="itemService"
                    />
                </div>
            </div>
        </section>
        <section class="py-12 md:py-16 xl:py-20 relative">
            <div class="absolute inset-0">
                <img
                    src="/assets/images/home/bg-story.webp"
                    alt="background story"
                    class="w-full h-full object-cover"
                />
            </div>
            <div class="relative">
                <div class="container">
                    <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                        <div
                            class="xl:col-span-8 xl:col-start-3 md:space-y-6 space-y-4 xl:space-y-10 text-center lg:col-span-10 lg:col-start-2 col-span-full"
                        >
                            <div class="space-y-3">
                                <div class="title-1 text-primary-900">{{ tt('Our Story') }}</div>
                                <h2 class="display-2 text-primary-800 uppercase">
                                    {{ tt('Hành trình của sự tinh tế trong ngành rượu') }}
                                </h2>
                            </div>
                            <div class="body-1 text-primary-900">
                                {{
                                    tt(
                                        'Với hơn 20 năm kinh nghiệm trong ngành rượu nhập khẩu của đội ngũ sáng lập, SIP N SOURCE ra đời với mục tiêu mang đến những giải pháp marketing chuyên biệt và đẳng cấp cho các thương hiệu rượu quốc tế tại thị trường Việt Nam.'
                                    )
                                }}
                            </div>
                            <Link
                                :href="route('histories.index')"
                                class="btn secondary space-x-3 flex items-center justify-center"
                            >
                                <span>{{ tt('Câu chuyện của chúng tôi') }}</span>
                                <Arrow />
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <SectionParallax
            image="/assets/images/home/bg-parallax.webp"
            title="Vị thế thương hiệu bắt đầu từ cách bạn kể câu chuyện của mình."
        />
        <SectionSlider title="Dấu ấn Khơi Vị" :items="posts" />
        <SectionContact />
        <section class="xl:pt-20 xl:pb-[60px] space-y-5 md:space-y-8 xl:space-y-10 md:py-16 py-12">
            <div class="container">
                <div class="space-y-3 text-center">
                    <h2 class="display-3 text-primary-800 uppercase">{{ tt('khách hàng & đối tác tiêu biểu') }}</h2>
                    <div class="title-2 text-gray-900">
                        {{ tt('Khơi Vị đồng hành cùng những tên tuổi dẫn đầu ngành rượu và ẩm thực cao cấp') }}
                    </div>
                </div>
            </div>
            <UIPartner :items="partners" />
        </section>
        <section class="py-12 md:py-16 xl:py-20">
            <div class="container md:space-y-6 space-y-4 xl:space-y-8">
                <div class="flex md:flex-row flex-col items-center justify-between max-md:space-y-4">
                    <h2 class="display-2 text-primary uppercase">{{ tt('Góc nhìn từ Khơi Vị') }}</h2>
                    <Link :href="route('posts')" class="btn primary space-x-3 flex items-center justify-center">
                        <span>{{ tt('Xem tất cả') }}</span>
                        <Arrow />
                    </Link>
                </div>
                <div v-if="posts && posts[0].slug" class="grid md:grid-cols-2 gap-y-6 group">
                    <Link
                        :href="
                            route('posts.show', {
                                slug: posts[0].slug,
                            })
                        "
                        class="block relative overflow-hidden"
                    >
                        <JPicture
                            :src="posts[0].image.url || '/cover.jpg'"
                            :alt="posts[0].image.alt || posts[0].title"
                            wrapperClass="picture-cover"
                            class="w-full h-full object-cover lg:group-hover:scale-105 duration-300 ease-in-out"
                        />
                    </Link>
                    <div class="md:pl-6 lg:pl-[48px] xl:pl-[108px] flex flex-col justify-center">
                        <div class="body-0 text-gray-700">
                            {{ formatYMD(posts[0].published_at) }}
                        </div>
                        <Link
                            :href="
                                route('posts.show', {
                                    slug: posts[0].slug,
                                })
                            "
                            class="display-3 text-primary-900 mt-3 md:mb-[40px] mb-6 xl:mb-[60px] !font-sans lg:group-hover:text-primary duration-300 ease-in-out notranslate"
                        >
                            {{ posts[0].title }}
                        </Link>

                        <Link
                            :href="
                                route('posts.show', {
                                    slug: posts[0].slug,
                                })
                            "
                            class="flex items-center gap-3 button-1 text-primary-700"
                        >
                            <span> {{ tt('Xem thêm') }}</span>
                            <Arrow />
                        </Link>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
import JamFieldSet from '../Components/Jam/FieldSet.vue'
import Arrow from '@/Components/Icons/Arrow.vue'
import CardService from '@/Components/Card/CardService.vue'
import UIPartner from '@/Components/UIPartner.vue'
import SectionHeroSlider from '@/Components/SectionHeroSlider.vue'

export default {
    components: { JamFieldSet, Arrow, CardService, UIPartner, SectionHeroSlider },
    props: ['posts', 'services', 'sliders'],
    data() {
        return {
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
        }
    },
    methods: {
        formatYMD(ymd, locale = 'en-US') {
            if (!ymd) return ''
            const [y, m, d] = ymd.split('-').map(Number)
            // Dựng Date ở UTC để không bị lệch ngày theo múi giờ
            const dt = new Date(Date.UTC(y, m - 1, d))
            return new Intl.DateTimeFormat(locale, {
                month: 'long', // "December"
                day: '2-digit', // "09"
                year: 'numeric', // "2024"
                timeZone: 'UTC', // khóa theo UTC cho ổn định
            }).format(dt)
        },
    },
}
</script>
<style scoped></style>

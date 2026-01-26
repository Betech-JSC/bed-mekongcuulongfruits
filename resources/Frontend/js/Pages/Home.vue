<template>
    <main>
        <SectionHeroSlider :items="sliders" />
        <SectionProducts :items="$page.props.data.products" />
        <SectionAvailability :items="$page.props.data.products" :certifications="certificates" />
        <SectionFeedback :items="feedbacks" />
        <SectionHotNews :items="posts" />
        <section class="relative">
            <div class="absolute z-10 inset-0 bg-linear-white"></div>
            <div class="aspect-w-13 aspect-h-5">
                <JPicture src="/assets/images/home/image-art-farmer.jpg" alt="item art farmer"
                    wrapperClass="picture-cover" class="w-full h-full object-cover" />
            </div>
        </section>
    </main>
</template>
<script>
import Arrow from '@/Components/Icons/Arrow.vue'
import SectionAvailability from '@/Components/SectionAvailability.vue'
import SectionFeedback from '@/Components/SectionFeedback.vue'
import SectionHeroSlider from '@/Components/SectionHeroSlider.vue'
import SectionHotNews from '@/Components/SectionHotNews.vue'
import SectionProducts from '@/Components/SectionProducts.vue'

export default {
    components: { Arrow, SectionHeroSlider, SectionProducts, SectionAvailability, SectionFeedback, SectionHotNews },
    props: ['certificates', 'products', 'posts', 'sliders'],
    data() {
        return {
            charts: [
                {
                    icon: {
                        url: '/assets/images/demo/image-product-1.png',
                        alt: 'image product demo',
                    },
                    image: {
                        url: '/assets/images/demo/image-chart.png',
                        alt: 'image chart demo',
                    },
                    title: 'Chuối cavendish',
                },
                {
                    icon: {
                        url: '/assets/images/demo/image-product-2.png',
                        alt: 'image product demo',
                    },
                    image: {
                        url: '/assets/images/demo/image-chart.png',
                        alt: 'image chart demo',
                    },
                    title: 'Chanh không hạt',
                },
                {
                    icon: {
                        url: '/assets/images/demo/image-product-3.png',
                        alt: 'image product demo',
                    },
                    image: {
                        url: '/assets/images/demo/image-chart.png',
                        alt: 'image chart demo',
                    },
                    title: 'Hạt cà phê',
                },
                {
                    icon: {
                        url: '/assets/images/demo/image-product-4.png',
                        alt: 'image product demo',
                    },
                    image: {
                        url: '/assets/images/demo/image-chart.png',
                        alt: 'image chart demo',
                    },
                    title: 'Dừa',
                },
            ],
            feedbacks: [
                {
                    rating: 5,
                    content: `Exceptional freshness! The Dragon Fruit shipment arrived in perfect condition. Farmer Vietnam is officially our top supplier for exotic fruits.`,
                    title: "Sarah Jenkins",
                    description: "Procurement Manager, Organic Foods UK",
                    image: {
                        url: '/assets/images/demo/author.jpg',
                        alt: 'image author',
                    },
                },
                {
                    rating: 5,
                    content: `Exceptional freshness! The Dragon Fruit shipment arrived in perfect condition. Farmer Vietnam is officially our top supplier for exotic fruits.`,
                    title: "Sarah Jenkins",
                    description: "Procurement Manager, Organic Foods UK",
                    image: {
                        url: '/assets/images/demo/author.jpg',
                        alt: 'image author',
                    },
                },
                {
                    rating: 5,
                    content: `Exceptional freshness! The Dragon Fruit shipment arrived in perfect condition. Farmer Vietnam is officially our top supplier for exotic fruits.`,
                    title: "Sarah Jenkins",
                    description: "Procurement Manager, Organic Foods UK",
                    image: {
                        url: '/assets/images/demo/author.jpg',
                        alt: 'image author',
                    },
                },
                {
                    rating: 5,
                    content: `Exceptional freshness! The Dragon Fruit shipment arrived in perfect condition. Farmer Vietnam is officially our top supplier for exotic fruits.`,
                    title: "Sarah Jenkins",
                    description: "Procurement Manager, Organic Foods UK",
                    image: {
                        url: '/assets/images/demo/author.jpg',
                        alt: 'image author',
                    },
                },
            ]
        }
    },
}
</script>
<style lang="scss" scoped>
.bg-linear-white {
    background: linear-gradient(180deg, rgba(255, 255, 255, 0) 60%, #ffffff 100%, #ffffff 100%, #ffffff 100%);
}
</style>

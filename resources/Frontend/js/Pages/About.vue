<template>
    <main>
        <BannerImage :banner="banner" classBanner="md:h-[550px] h-[550px] xl:h-[700px]" />
        <SectionAboutProduct :items="$page.props.data.products" />
    </main>
</template>
<script>
import BannerImage from '@/Components/BannerImage.vue';

export default {
    props: ['posts'],
    components: {
        BannerImage,
    },
    data() {
        return {
            banner: {
                title: this.tt('About us'),
                image: '/assets/images/about/banner.jpg',

            },
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

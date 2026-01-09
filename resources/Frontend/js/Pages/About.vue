<template>
    <main>
        <BannerImage :banner="banner" classBanner="md:h-[550px] h-[550px] xl:h-[700px]" />
        <SectionAboutProduct :items="products" />
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
            products: [
                {
                    image: {
                        url: '/assets/images/demo/image-product-1.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 1,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-2.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 4,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-3.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 3,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-4.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 2,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-5.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 1,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-6.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 3,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-1.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 1,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-2.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 4,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-3.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 3,
                },
                {
                    image: {
                        url: '/assets/images/demo/image-product-4.png',
                        alt: 'image product demo',
                    },
                    slug: 'demo',
                    subTitle: 'Cavendish banana',
                    title: 'Chuối già Nam Mỹ Cavendish',
                    description:
                        'Chuối Cavendish thuộc loại cây thảo, cao từ 5m – 6m, là loài sống lâu năm, thân cây tròn, mềm, thẳng, có bẹ lá. Lá cây to dài. Trái nằm trên buồng, có từ 6-8 trái, mỗi nải có khoảng 12trái. Trái chuối Canvendish nhỏ, dài, có mùi thơm. Khi chín, vỏ vẫn màu xanh nhưng khi chín mùi thì vỏ chuyển sang màu vàng.  Quả chuối thơm ngon, có vị ngọt nhẹ.',
                    type: 2,
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

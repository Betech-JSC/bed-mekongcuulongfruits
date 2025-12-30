<template>
    <main>
        <SectionHeroSlider :items="slidersHero" />
        <SectionProducts :items="products" />
        <SectionAvailability :items="charts" />
        <SectionFeedback />
        <SectionHotNews :items="posts" />
        <section class="relative">
            <div class="absolute z-10 inset-0 bg-linear-white"></div>
            <div class="aspect-w-13 aspect-h-5">
                <JPicture
                    src="/assets/images/home/image-art-farmer.jpg"
                    alt="item art farmer"
                    wrapperClass="picture-cover"
                    class="w-full h-full object-cover"
                />
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
    // props: ['posts', 'services', 'sliders'],
    data() {
        return {
            slidersHero: [
                {
                    image: {
                        url: '/assets/images/demo/image-slider-1.jpg',
                        alt: 'image demo',
                    },
                    image_mobile: {
                        url: '/assets/images/demo/image-slider-1.jpg',
                        alt: 'image demo',
                    },
                    title: 'Bringing the Essence of the Mekong Delta to the World',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-slider-2.jpg',
                        alt: 'image demo',
                    },
                    image_mobile: {
                        url: '/assets/images/demo/image-slider-2.jpg',
                        alt: 'image demo',
                    },
                    title: 'Bringing the Essence of the Mekong Delta to the World',
                },
                {
                    image: {
                        url: '/assets/images/demo/image-slider-3.jpg',
                        alt: 'image demo',
                    },
                    image_mobile: {
                        url: '/assets/images/demo/image-slider-3.jpg',
                        alt: 'image demo',
                    },
                    title: 'Bringing the Essence of the Mekong Delta to the World',
                },
            ],
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
            posts: [
                {
                    image: {
                        url: '/assets/images/posts/banner.jpg',
                        alt: 'image demo',
                    },
                    title: 'VietNam Farmer Expands Export to Japan',
                    slug: 'demo',
                    description:
                        'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                },
                {
                    image: {
                        url: '/assets/images/posts/banner.jpg',
                        alt: 'image demo',
                    },
                    title: 'VietNam Farmer Expands Export to Japan',
                    slug: 'demo',
                    description:
                        'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                },
                {
                    image: {
                        url: '/assets/images/posts/banner.jpg',
                        alt: 'image demo',
                    },
                    title: 'VietNam Farmer Expands Export to Japan',
                    slug: 'demo',
                    description:
                        'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                },
            ],
        }
    },
}
</script>
<style lang="scss" scoped>
.bg-linear-white {
    background: linear-gradient(180deg, rgba(255, 255, 255, 0) 60%, #ffffff 100%, #ffffff 100%, #ffffff 100%);
}
</style>

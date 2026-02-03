<template>
    <main>
        <section class="relative">
            <BannerImage :banner="banner" classBanner="md:h-[550px] h-[550px] xl:h-[700px]" />
            <UITabs :tabs="tabs" />
        </section>

        <section id="product-information" class="py-12 md:py-16 xl:pt-20 xl:pb-10 bg-brand-300">
            <div class="container">
                <div class="flex flex-col lg:flex-row items-center md:gap-12 gap-8 xl:gap-20">
                    <div
                        class="max-w-full max-lg:mx-auto lg:max-w-[380px] xl:max-w-[480px] w-full relative overflow-hidden">
                        <JPicture class="w-full h-full object-contain"
                            :src="product.image?.url || productDemo.overview.image.src"
                            :mobileSrc="product.image?.url || productDemo.overview.image.src"
                            :alt="product.image?.alt || 'item image'" />
                    </div>
                    <div class="flex-1">
                        <div class="body-0 text-gray-900 uppercase mb-3">Tổng quan</div>
                        <h2 class="display-3 font-bold text-primary mb-6 md:mb-8 xl:mb-10">
                            {{ product.title_overview }}
                        </h2>
                        <div class="prose-overview" v-html="product.content_overview"></div>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row items-center md:gap-12 gap-8 xl:gap-20">
                    <div
                        class="max-w-full max-lg:mx-auto lg:max-w-[380px] xl:max-w-[480px] w-full relative overflow-hidden">
                        <JPicture class="w-full h-full object-contain"
                            :src="product.images_characteristics?.url || productDemo.characteristics.image.src"
                            :mobileSrc="product.images_characteristics?.url || productDemo.characteristics.image.src"
                            :alt="product.images_characteristics?.alt || 'item image'" />
                    </div>
                    <div class="flex-1">
                        <h2 class="display-3 font-bold text-primary mb-6 md:mb-8 xl:mb-10">
                            {{ product.title_characteristics }}
                        </h2>
                        <div class="prose-characteristics" v-html="product.content_characteristics"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="harvest-seasons" class="md:py-16 py-12 xl:py-20 relative">
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[320px] md:w-[425px] md:h-[425px] xl:w-[625px] xl:h-[625px] opacity-20">
                <JPicture class="w-full h-full object-contain" src="/assets/images/logo-mask.png"
                    alt="image logo mask" />
            </div>
            <div class="relative">
                <div class="container">
                    <h2 class="headline-1 font-bold text-primary uppercase">Mùa vụ</h2>
                    <div class="body-1 text-gray-900 max-w-[630px] w-full mt-2 mb-6" v-html="product.harvest_season">
                    </div>

                    <JPicture class="w-full h-full object-contain"
                        :src="product.image_harvest_season?.url || '/assets/images/products/image-chart.png'"
                        :alt="product.image_harvest_season?.alt || 'image chart'" />
                </div>
            </div>
        </section>
        <section id="production-process" class="bg-primary md:py-16 py-12 xl:py-20">
            <div class="container space-y-12">
                <div class="grid lg:grid-cols-2 gap-6 md:gap-8 xl:gap-20">
                    <div class="grid grid-cols-2 gap-3">
                        <JPicture wrapperClass="aspect-w-6 aspect-h-4 relative" class="w-full h-full object-cover" :src="product.images_product_process?.[0]?.url ||
                            '/assets/images/products/image-progress-1.jpg'
                            " :alt="product.images_product_process?.[0]?.alt || 'image progress 1'" />
                        <div class="space-y-3 flex flex-col">
                            <JPicture wrapperClass="aspect-w-2 aspect-h-1 relative" class="w-full h-full object-cover"
                                :src="product.images_product_process?.[1]?.url ||
                                    '/assets/images/products/image-progress-2.jpg'
                                    " :alt="product.images_product_process?.[1]?.alt || 'image progress 2'" />
                            <JPicture wrapperClass="aspect-w-2 aspect-h-1 relative" class="w-full h-full object-cover"
                                :src="product.images_product_process?.[2]?.url ||
                                    '/assets/images/products/image-progress-3.jpg'
                                    " :alt="product.images_product_process?.[2]?.alt || 'image progress 3'" />
                        </div>
                    </div>
                    <div>
                        <h2 class="headline-1 font-bold uppercase text-brand-300 mb-4">Quy trình sản xuất</h2>
                        <div class="title-2 text-white" v-html="product.product_process"></div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-6 md:gap-8 xl:gap-20">
                    <div class="flex items-center justify-center">
                        <JPicture wrapperClass="relative block" class="w-full h-full object-cover" :src="product.images_package_specification?.[0]?.url ||
                            '/assets/images/products/image-packing.jpg'
                            " :alt="product.images_package_specification?.[0]?.alt || 'image packing'" />
                    </div>
                    <div class="space-y-5">
                        <div class="space-y-2 text-brand-300">
                            <h2 class="headline-1 font-bold uppercase">Quy cách đóng gói</h2>
                        </div>
                        <div v-html="product.package_included"></div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-6 md:gap-8 xl:gap-20">
                    <div class="grid md:grid-cols-2 gap-[22px]">
                        <div v-for="(itemMethod, indexMethod) in product.images_preservation_methods" :key="indexMethod"
                            class="block w-full h-full aspect-w-3 aspect-h-2 relative">
                            <JPicture class="w-full h-full object-cover"
                                :src="itemMethod?.url || '/assets/images/products/image-method.jpg'"
                                :alt="itemMethod?.alt || 'image method'" />
                        </div>
                    </div>
                    <div>
                        <h2 class="headline-1 font-bold uppercase text-brand-300">Phương pháp bảo quản</h2>
                        <div class="body-1 text-white mt-2 mb-6" v-html="product.product_preservation"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
export default {
    props: ['product', 'related_products', 'most_viewed_products'],
    data() {
        return {
            banner: {
                title: this.$props.product?.title ?? '',
                image: this.$props.product?.banner?.url ?? '/assets/images/products/banner.jpg',
            },
            tabs: [
                { title: this.tt('Thông tin sản phẩm'), value: 'product-information' },
                { title: this.tt('Mùa vụ'), value: 'harvest-seasons' },
                { title: this.tt('Quy trình sản xuất'), value: 'production-process' },
            ],
            progressList: [
                'Harvest bananas',
                'Cut and clean each bunch by soaking and washing',
                'Dry the bananas, sort according to specifications, and weigh',
                'Pack the bananas',
                'Store in cold storage',
                'Load goods onto the container',
            ],
            imagesMethod: ['/assets/images/products/image-method-1.jpg', '/assets/images/products/image-method-2.jpg'],
            productDemo: {
                overview: {
                    image: {
                        src: '/assets/images/products/image-product.png',
                        alt: 'image overview',
                    },
                },
                characteristics: {
                    image: {
                        src: '/assets/images/products/image-product.png',
                        alt: 'image overview',
                    },
                },
                productionProcess: `
                    <ol>
                        <li>Harvest bananas</li>
                        <li>Cut and clean each bunch by soaking and washing</li>
                        <li>Dry the bananas, sort according to specifications, and weigh</li>
                        <li>Pack the bananas</li>
                        <li>Store in cold storage</li>
                        <li>Load goods onto the container</li>
                    </ol>
                `,
            },
        }
    },
}
</script>
<style lang="scss" scoped>
:deep(.prose-overview) {
    p {
        @apply text-[18px] leading-[150%] text-gray-900;
    }
}

:deep(.prose-characteristics) {
    @apply text-gray-900;

    ul {
        @apply list-disc pl-6 text-[16px] leading-[150%];
    }
}
</style>

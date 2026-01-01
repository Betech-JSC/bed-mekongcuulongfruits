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
                        class="max-w-full max-lg:mx-auto lg:max-w-[380px] xl:max-w-[480px] w-full relative overflow-hidden"
                    >
                        <JPicture
                            class="w-full h-full object-contain"
                            :src="productDemo.overview.image.src"
                            :mobileSrc="productDemo.overview.image.src"
                            alt="item image"
                        />
                    </div>
                    <div class="flex-1">
                        <div class="body-0 text-gray-900 uppercase mb-3">Over view</div>
                        <h2 class="display-3 font-bold text-primary mb-6 md:mb-8 xl:mb-10">
                            {{ productDemo.overview.title }}
                        </h2>
                        <div class="prose-overview" v-html="productDemo.overview.description"></div>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row items-center md:gap-12 gap-8 xl:gap-20">
                    <div
                        class="max-w-full max-lg:mx-auto lg:max-w-[380px] xl:max-w-[480px] w-full relative overflow-hidden"
                    >
                        <JPicture
                            class="w-full h-full object-contain"
                            :src="productDemo.characteristics.image.src"
                            :mobileSrc="productDemo.characteristics.image.src"
                            alt="item image"
                        />
                    </div>
                    <div class="flex-1">
                        <h2 class="display-3 font-bold text-primary mb-6 md:mb-8 xl:mb-10">
                            {{ productDemo.characteristics.title }}
                        </h2>
                        <div class="prose-characteristics" v-html="productDemo.characteristics.description"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="harvest-seasons" class="md:py-16 py-12 xl:py-20 relative">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[320px] md:w-[425px] md:h-[425px] xl:w-[625px] xl:h-[625px] opacity-20">
                <JPicture
                    class="w-full h-full object-contain"
                    src="/assets/images/logo-mask.png"
                    alt="image logo mask"
                />
            </div>
            <div class="relative">
                <div class="container">
                    <h2 class="headline-1 font-bold text-primary uppercase">Harvest Seasons</h2>
                    <div class="body-1 text-gray-900 max-w-[630px] w-full mt-2 mb-6">
                        Available year-round thanks to continuous cultivation cycles. Peak harvest occurs from March to
                        October, ensuring stable volumes and reliable export supply.
                    </div>

                    <JPicture
                        class="w-full h-full object-contain"
                        src="/assets/images/products/image-chart.png"
                        alt="image chart"
                    />
                </div>
            </div>
        </section>
        <section id="production-process" class="bg-primary md:py-16 py-12 xl:py-20">
            <div class="container space-y-12">
                <div class="grid lg:grid-cols-2 gap-6 md:gap-8 xl:gap-20">
                    <div class="grid grid-cols-2 gap-3">
                        <JPicture
                            wrapperClass="aspect-w-6 aspect-h-4 relative"
                            class="w-full h-full object-cover"
                            src="/assets/images/products/image-progress-1.jpg"
                            alt="image progress"
                        />
                        <div class="space-y-3 flex flex-col">
                            <JPicture
                                wrapperClass="aspect-w-2 aspect-h-1 relative"
                                class="w-full h-full object-cover"
                                src="/assets/images/products/image-progress-2.jpg"
                                alt="image progress"
                            />
                            <JPicture
                                wrapperClass="aspect-w-2 aspect-h-1 relative"
                                class="w-full h-full object-cover"
                                src="/assets/images/products/image-progress-3.jpg"
                                alt="image progress"
                            />
                        </div>
                    </div>
                    <div>
                        <h2 class="headline-1 font-bold uppercase text-brand-300 mb-4">Production Process</h2>
                        <div
                            class="title-2 text-white"
                            v-for="(itemProgress, indexProgress) in progressList"
                            :key="indexProgress"
                        >
                            {{ `${indexProgress + 1}. ${itemProgress}` }}
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-6 md:gap-8 xl:gap-20">
                    <div class="flex items-center justify-center">
                        <JPicture
                            wrapperClass="relative block"
                            class="w-full h-full object-cover"
                            src="/assets/images/products/image-packing.jpg"
                            alt="image packing"
                        />
                    </div>
                    <div class="space-y-5">
                        <div class="space-y-2 text-brand-300">
                            <h2 class="headline-1 font-bold uppercase">Packing Specifications</h2>
                            <div class="headline-3">Box Weight 13Kg</div>
                        </div>
                        <div class="space-y-2 text-white">
                            <div class="title-2 font-bold">Container 40ft:</div>
                            <div class="body-1">
                                - Palletized Loading: 22 pallets, each pallet holds 60 boxes (Total: 1,320 boxes, Total
                                weight: 17,160kg)
                            </div>
                        </div>
                        <div class="space-y-2 text-white">
                            <div class="title-2 font-bold">Box Specifications:</div>
                            <div class="body-1">
                                <p>- Hand:</p>
                                <p>6H: 1.9kg - 2.3kg per Hand, 13 or more bananas per hand.</p>
                                <p>8H: 1.5kg - 1.9kg per Hand, 11 or more bananas per hand.</p>
                                <p>Evenly sized banana bunches, with no missing fruits on either side.</p>
                                <p>- CP:</p>
                                <p>10CP: 1.1 - 1.5kg per CP, 6-8 bananas per CP.</p>
                                <p>12CP: 0.9 - 1.3kg per CP, 5-8 bananas per CP.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-6 md:gap-8 xl:gap-20">                    
                    <div class="grid md:grid-cols-2 gap-[22px]">
                        <div
                            v-for="(itemMethod, indexMethod) in imagesMethod"
                            :key="indexMethod"
                            class="block w-full h-full aspect-w-3 aspect-h-2 relative"
                        >
                            <JPicture class="w-full h-full object-cover" :src="itemMethod" alt="image method" />
                        </div>
                    </div>
                    <div>
                        <h2 class="headline-1 font-bold uppercase text-brand-300">Preservation methods</h2>
                    <div class="body-1 text-white mt-2 mb-6">
                        Cavendish bananas are stored at 13–14°C with 85–95% humidity to maintain freshness. Ethylene
                        control and proper ventilation help regulate ripening and prevent decay during transport and
                        storage.
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
export default {
    props: ['posts', 'services', 'sliders'],
    data() {
        return {
            banner: {
                title: this.tt('Cavendish banana'),
                image: '/assets/images/products/banner.jpg',
            },
            tabs: [
                { title: this.tt('Product Information'), value: 'product-information' },
                { title: this.tt('Harvest Seasons'), value: 'harvest-seasons' },
                { title: this.tt('Production Process'), value: 'production-process' },
            ],
            progressList: [
                'Harvest bananas',
                'Cut and clean each bunch by soaking and washing',
                'Dry the bananas, sort according to specifications, and weigh',
                'Pack the bananas',
                'Store in cold storage',
                'Load goods onto the container',
            ],
            imagesMethod: [
                '/assets/images/products/image-method-1.jpg',
                '/assets/images/products/image-method-2.jpg',
            ],
            productDemo: {
                overview: {
                    image: {
                        src: '/assets/images/products/image-product.png',
                        alt: 'image overview',
                    },
                    title: 'The world’s favorite banana, proudly grown in Vietnam’s fertile Mekong Delta.',
                    description: `
                        <p>The Cavendish banana is one of Vietnam’s most popular export fruits, loved worldwide for its sweet flavor, soft texture, and natural freshness.</p>
                        <p>Grown in the fertile Mekong Delta, our bananas are carefully cultivated and harvested to ensure consistent quality and year-round supply.</p>
                    `,
                },
                characteristics: {
                    image: {
                        src: '/assets/images/products/image-product.png',
                        alt: 'image overview',
                    },
                    title: 'Characteristics of Cavendish Bananas',
                    description: `
                    <ul>
                        <li>Ideal harvest age: 10–12 weeks (from the day the bunch is cut), with a diameter of 30mm – 45mm, and still retaining the natural threads.</li>
                        <li>Bananas should not be too old (avoid overly round fruit or those with slight sickle cuts).</li>
                        <li>Bananas should not be too green, ensuring proper flesh development, sweetness, and quality for ripening.</li>
                        <li>Color: Bright green or uniform green without patches, spots, or premature yellowing caused by light.</li>
                        <li>Fruits must be intact, naturally developed, with a gentle curve. No double bananas or deformities are accepted.</li>
                        <li>When ripened, bananas should turn a vibrant yellow with a chewy, fragrant, and sweet flesh.</li>
                        <li class="font-semibold">Brix (when ripened): 22–24.</li>
                    </ul>
                `,
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

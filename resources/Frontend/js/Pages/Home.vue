<template>
    <main>
        <SectionHeroSlider :items="slidersHero" />
        <section class="bg-brand-300 py-20">
            <div class="container space-y-[72px]">
                <div class="grid grid-cols-12 gap-8">
                    <div class="col-span-7 space-y-3">
                        <div class="headline-3 text-brand-100 uppercase">Our Products</div>
                        <h2 class="display-2 font-bold text-brand-100 uppercase">Fresh From Vietnam’s Mekong Delta</h2>
                    </div>
                    <div class="col-span-5 ml-auto">
                        <Link
                            :href="route('contact')"
                            class="btn btn-secondary space-x-3 flex items-center justify-center"
                        >
                            <span>{{ tt('See more') }}</span>
                            <Arrow />
                        </Link>
                    </div>
                </div>
                <div>
                    <!-- Sliders -->
                </div>
            </div>
        </section>
        <section class="pt-20 pb-[60px]">
            <div class="container space-y-20">
                <div class="flex items-start gap-8">
                    <div class="max-w-[320px] w-full">
                        <div class="headline-2 font-bold text-brand-100 uppercase">Certified Quality, Trusted Worldwide</div>
                    </div>
                    <div class="body-1 text-gray-900">
                        At VietNam Farmer, quality and safety are our top priorities. We comply with international standards and hold globally recognized certifications to ensure our products meet the highest requirements of importers and consumers.
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="headline-1 font-bold text-brand-100 uppercase">Availability season</div>
                        <div class="flex items-center gap-8">
                            <!-- Button Pagination -->
                        </div>
                    </div>
                    <!-- Sliders -->
                </div>
            </div>
        </section>
        <section class="relative">
            <div class="absolute inset-0">                
                <JPicture
                    alt="background feedback"
                    src="/assets/images/home/bg-feedback.jpg"
                    class="w-full h-full object-cover"
                />
            </div>
            <div class="relative">
                <div class="container">
                    
                </div>
            </div>
        </section>
    </main>
</template>
<script>
import Arrow from '@/Components/Icons/Arrow.vue'
import SectionHeroSlider from '@/Components/SectionHeroSlider.vue'

export default {
    components: { Arrow, SectionHeroSlider },
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
        }
    },
}
</script>

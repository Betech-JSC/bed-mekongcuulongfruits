<template>
    <main>
        <section id="about-our-factory" class="relative">
            <BannerImage :banner="banner" classBanner="md:h-[550px] h-[200px] xl:h-[700px]" />
        </section>
        <section id="production-technology" class="py-12 md:py-16 xl:py-20 bg-[#E5C025]">
            <div class="container space-y-[32px] md:space-y-[56px] xl:space-y-[72px]">
                <AnimatedAppear class="max-w-[900px] w-full mx-auto text-gray-900 text-center headline-3 !font-medium">
                    Our fruit processing facility is located right in the heart of the Mekong Delta, near local farms.
                    This helps us keep every fruit fresh from harvest to export.
                </AnimatedAppear>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3 xl:gap-6">
                    <AnimatedAppear v-for="(itemImageFactory, indexImageFactory) in imageFactories"
                        :key="indexImageFactory" :delay="indexImageFactory * 100"
                        class="aspect-w-3 aspect-h-2 relative overflow-hidden rounded-2xl">
                        <JPicture class="w-full h-full object-cover lg:hover:scale-105 duration-300 ease-in-out"
                            :src="itemImageFactory || '/cover.jpg'" :mobileSrc="itemImageFactory || '/cover.jpg'"
                            alt="image factory" />
                    </AnimatedAppear>
                </div>
            </div>
        </section>
        <SectionVideo id="certified-quality" />
        <section id="global-export" class="bg-[#FFFBEF] pb-[48px] md:pb-[64px] xl:pb-[100px]">
            <div class="container">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-[url('/assets/images/factory/bg-global-export.png')] bg-contain bg-no-repeat bg-top w-full h-full">
                    </div>
                    <div class="relative pt-[48px] md:pt-[64px] xl:pt-[100px]">
                        <AnimatedAppear>
                            <div class="display-3 font-bold text-brand-100 text-center">Global Export</div>
                        </AnimatedAppear>
                        <AnimatedAppear>
                            <div
                                class="headline-3 text-center text-gray-900 max-w-[930px] w-full mx-auto md:mt-4 mt-3 xl:mt-6 mb-8 md:mb-14 xl:mb-16">
                                With strong capabilities and strategic location near seaports, we can supply large
                                volumes
                                of fresh fruit to partners in Asia, Europe, and North America.
                            </div>
                        </AnimatedAppear>
                    </div>
                </div>
            </div>
            <Marquee :marquee="globalExportMarquee" />
        </section>
    </main>
</template>
<script>
import AnimatedAppear from '@/Components/AnimatedAppear.vue';
import Marquee from '@/Components/Marquee.vue'

export default {
    components: { Marquee },
    props: ['posts', 'services', 'sliders'],
    data() {
        return {
            banner: {
                title: this.tt('Our Factory'),
                image: '/assets/images/factory/banner.jpg',
            },
            tabs: [
                { title: this.tt('About Our Factory'), value: 'about-our-factory' },
                { title: this.tt('Technology & Production'), value: 'production-technology' },
                { title: this.tt('Certified Quality'), value: 'certified-quality' },
                { title: this.tt('Global Export'), value: 'global-export' },
            ],
            imageFactories: [
                '/assets/images/factory/image-factory-1.webp',
                '/assets/images/factory/image-factory-2.webp',
                '/assets/images/factory/image-factory-3.webp',
                '/assets/images/factory/image-factory-4.webp',
                '/assets/images/factory/image-factory-5.webp',
                '/assets/images/factory/image-factory-6.webp',
            ],
            imagesGlobalExport: [
                '/assets/images/factory/image-global-1.webp',
                '/assets/images/factory/image-global-2.webp',
                '/assets/images/factory/image-global-3.webp',
                '/assets/images/factory/image-global-4.webp',
                '/assets/images/factory/image-global-5.webp',
                '/assets/images/factory/image-global-6.webp',
            ],
        }
    },
    computed: {
        globalExportMarquee() {
            return this.imagesGlobalExport.map((item) => {
                return {
                    image: {
                        url: item,
                        alt: 'global export',
                    },
                }
            })
        },
    },
}
</script>

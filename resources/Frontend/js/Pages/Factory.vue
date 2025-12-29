<template>
    <main>
        <section id="about-our-factory" class="relative">
            <BannerImage :banner="banner" classBanner="md:h-[550px] h-[550px] xl:h-[700px]" />
            <UITabs :tabs="tabs" />
        </section>
        <section id="production-technology" class="py-12 md:py-16 xl:py-20 bg-[#E5C025]">
            <div class="container space-y-[32px] md:space-y-[56px] xl:space-y-[72px]">
                <div class="max-w-[900px] w-full mx-auto text-gray-900 text-center headline-3 !font-medium">
                    Our fruit processing factory is located in the heart of the Mekong Delta, close to local farms. This
                    helps us keep every fruit fresh from harvest to export.
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3 xl:gap-6">
                    <JPicture
                        v-for="indexImage in 6"
                        :key="indexImage"
                        wrapperClass="aspect-w-3 aspect-h-2 relative overflow-hidden rounded-2xl"
                        class="w-full h-full object-cover lg:hover:scale-105 duration-300 ease-in-out"
                        src="/assets/images/cover.jpg"
                        mobileSrc="/assets/images/cover.jpg"
                        alt="item image"
                    />
                </div>
            </div>
        </section>
        <SectionVideo id="certified-quality" />
        <section id="global-export" class="bg-[#FFFBEF]">
            <div class="container">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-[url('/assets/images/factory/bg-global-export.png')] bg-contain bg-no-repeat bg-top"
                    ></div>
                    <div class="relative py-[48px] md:py-[64px] xl:py-[100px]">
                        <div class="display-3 text-brand-100 text-center">Global Export</div>
                        <div
                            class="headline-3 text-center text-gray-900 max-w-[900px] w-full mx-auto md:mt-4 mt-3 xl:mt-6 mb-8 md:mb-14 xl:mb-16"
                        >
                            With strong capacity and strategic location near ports, we can deliver large volumes of
                            fresh fruits to partners in Asia, Europe, and North America.
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-x-10 gap-4 xl:gap-x-14">
                            <JPicture
                                v-for="indexImage in 2"
                                :key="indexImage"
                                wrapperClass="aspect-w-3 aspect-h-2 relative overflow-hidden rounded-2xl"
                                class="w-full h-full object-cover lg:hover:scale-105 duration-300 ease-in-out"
                                src="/assets/images/cover.jpg"
                                mobileSrc="/assets/images/cover.jpg"
                                alt="item image"
                            />
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
                title: this.tt('Our Factory'),
                image: '/assets/images/factory/banner.jpg',
            },
            tabs: [
                { title: this.tt('About our factory'), value: 'about-our-factory' },
                { title: this.tt('Production & Technology'), value: 'production-technology' },
                { title: this.tt('Certified Quality'), value: 'certified-quality' },
                { title: this.tt('Global Export'), value: 'global-export' },
            ],
        }
    },
}
</script>

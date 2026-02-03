<template>
    <main>
        <section id="about-our-factory" class="relative">
            <BannerImage :banner="banner" classBanner="md:h-[550px] h-[550px] xl:h-[700px]" />
            <UITabs :tabs="tabs" />
        </section>
        <section id="production-technology" class="py-12 md:py-16 xl:py-20 bg-[#E5C025]">
            <div class="container space-y-[32px] md:space-y-[56px] xl:space-y-[72px]">
                <div class="max-w-[900px] w-full mx-auto text-gray-900 text-center headline-3 !font-medium">
                    Nhà máy chế biến trái cây của chúng tôi nằm ngay tại trung tâm của Đồng Bằng Sông Cửu Long, gần các
                    trang trại địa phương.
                    Điều này giúp chúng tôi giữ cho từng trái cây luôn tươi mới từ lúc thu hoạch đến khi xuất khẩu.
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3 xl:gap-6">
                    <JPicture v-for="(itemImageFactory, indexImageFactory) in imageFactories" :key="indexImageFactory"
                        wrapperClass="aspect-w-3 aspect-h-2 relative overflow-hidden rounded-2xl"
                        class="w-full h-full object-cover lg:hover:scale-105 duration-300 ease-in-out"
                        :src="itemImageFactory || '/cover.jpg'" :mobileSrc="itemImageFactory || '/cover.jpg'"
                        alt="image factory" />
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
                        <div class="display-3 font-bold text-brand-100 text-center">Xuất Khẩu Toàn Cầu</div>
                        <div
                            class="headline-3 text-center text-gray-900 max-w-[930px] w-full mx-auto md:mt-4 mt-3 xl:mt-6 mb-8 md:mb-14 xl:mb-16">
                            Với năng lực mạnh mẽ và vị trí chiến lược gần các cảng biển, chúng tôi có thể cung cấp khối
                            lượng lớn trái cây tươi cho các đối tác ở Châu Á, Châu Âu và Bắc Mỹ.
                        </div>
                    </div>
                </div>
            </div>
            <Marquee :marquee="globalExportMarquee" />
        </section>
    </main>
</template>
<script>
import Marquee from '@/Components/Marquee.vue'

export default {
    components: { Marquee },
    props: ['posts', 'services', 'sliders'],
    data() {
        return {
            banner: {
                title: this.tt('Nhà Máy Của Chúng Tôi'),
                image: '/assets/images/factory/banner.jpg',
            },
            tabs: [
                { title: this.tt('Về nhà máy'), value: 'about-our-factory' },
                { title: this.tt('Công nghệ & Sản xuất'), value: 'production-technology' },
                { title: this.tt('Chất lượng được chứng nhận'), value: 'certified-quality' },
                { title: this.tt('Xuất khẩu toàn cầu'), value: 'global-export' },
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

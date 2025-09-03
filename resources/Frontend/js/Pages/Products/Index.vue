<template>
    <main>
        <BannerImage :banner="banner" classBanner="h-[320px] xl:h-[440px]" />
        <section class="py-12">
            <div class="container md:space-y-6 space-y-4 xl:space-y-8">
                <div class="md:flex items-center justify-between">
                    <JamBreadcrumb :items="banner.breadcrumbs" />
                    <div class="flex items-center gap-3">
                        <!-- Select category -->
                        <CustomSelect title="Danh mục" :options="categories" filterKey="categories" />
                        <CustomSelect title="Sắp xếp" :options="sortOptions" filterKey="sort" />
                    </div>
                </div>
                <div>
                    <div
                        class="grid md:grid-cols-3 grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 xl:gap-8 border-b border-gray-200 md:pb-6 pb-4 xl:pb-8 notranslate"
                    >
                        <CardCardProduct v-for="(product, index) in products.data" :key="index" :item="product" />
                    </div>
                    <Pagination :links="products.links" class="pt-3 pb-4" />
                </div>
            </div>
        </section>
        <section
            class="flex relative justify-center items-end bg-white min-h-[350px] lg:min-h-[320px] xl:min-h-[400px] md:py-0 py-12"
        >
            <div class="absolute bottom-0 left-0 w-full bg-primary-500 h-full md:h-[250px] xl:h-[283px] z-[1]"></div>

            <div class="relative w-full">
                <div class="container">
                    <div class="md:flex items-center justify-between">
                        <div class="relative z-[1] text-white max-w-[770px] w-full max-md:text-center">
                            <h2 class="display-3">
                                {{ tt('Tặng phẩm thiết kế riêng') }}
                            </h2>
                            <p class="body-1 mt-3 xl:mt-4 mb-3 md:mb-4 xl:mb-5">
                                {{
                                    tt(
                                        'Dù là quà tặng trong sự kiện, vật phẩm khuyến mại hay bộ kit giới thiệu sản phẩm mới,Sip N Source luôn đảm bảo sự chỉn chu, cảm xúc và hiệu quả truyền thông lâu dài.'
                                    )
                                }}
                            </p>
                            <Link :href="route('products.index')" class="btn third flex items-center justify-center">
                                <span>{{ tt('Xem ngay') }}</span>
                            </Link>
                        </div>
                        <div
                            class="flex relative justify-center items-center max-md:mx-auto w-[300px] md:w-[250px] xl:w-[310px] z-[1]"
                        >
                            <div
                                class="aspect-w-1 aspect-h-1 max-md:mx-auto w-[300px] md:w-[250px] md:h-[250px] xl:w-[310px] xl:h-[310px] md:translate-y-[-64px]"
                            >
                                <JPicture
                                    src="/assets/images/products/image-box-gift.webp"
                                    alt="Gift box image"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <SectionCustomerSlider :items="customers" />
    </main>
</template>
<script>
import axios from 'axios'
import JamBreadcrumb from '@/Components/Jam/Breadcrumb.vue'
import Pagination from '@/Components/Paginate.vue'
import BannerImage from '@/Components/BannerImage.vue'
import CustomSelect from '@/Components/CustomSelect.vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    props: ['categories', 'category', 'products'],
    components: { JamBreadcrumb, Pagination, BannerImage, CustomSelect },
    data() {
        return {
            filters: {
                sort: 'desc', // default
                category: null,
            },
            sortOptions: [
                { title: 'Mới nhất', value: 'desc' },
                { title: 'Cũ nhất', value: 'asc' },
                { title: 'A → Z', value: 'az' },
                { title: 'Z → A', value: 'za' },
            ],
            banner: {
                title: this.tt('Quà tặng'),
                description: this.tt('Đồng hành cùng thương hiệu tạo nên dấu ấn riêng'),
                image: '/assets/images/products/bg-banner.webp',
                breadcrumbs: [
                    {
                        title: this.tt('Sản phẩm'),
                    },
                ],
            },

            customers: [
                {
                    image: '/assets/images/home/image-partner.webp',
                    title: 'Johnnie Walker',
                    description:
                        'Món quà nhỏ nhưng được khách hàng của chúng tôi cực kỳ yêu thích. Thiết kế dễ thương, chất liệu an toàn, lại mang dấu ấn thương hiệu rõ ràng.',
                },
                {
                    image: '/assets/images/home/image-partner.webp',
                    title: 'Johnnie Walker',
                    description:
                        'Món quà nhỏ nhưng được khách hàng của chúng tôi cực kỳ yêu thích. Thiết kế dễ thương, chất liệu an toàn, lại mang dấu ấn thương hiệu rõ ràng.',
                },
                {
                    image: '/assets/images/home/image-partner.webp',
                    title: 'Johnnie Walker',
                    description:
                        'Món quà nhỏ nhưng được khách hàng của chúng tôi cực kỳ yêu thích. Thiết kế dễ thương, chất liệu an toàn, lại mang dấu ấn thương hiệu rõ ràng.',
                },
                {
                    image: '/assets/images/home/image-partner.webp',
                    title: 'Johnnie Walker',
                    description:
                        'Món quà nhỏ nhưng được khách hàng của chúng tôi cực kỳ yêu thích. Thiết kế dễ thương, chất liệu an toàn, lại mang dấu ấn thương hiệu rõ ràng.',
                },
                {
                    image: '/assets/images/home/image-partner.webp',
                    title: 'Johnnie Walker',
                    description:
                        'Món quà nhỏ nhưng được khách hàng của chúng tôi cực kỳ yêu thích. Thiết kế dễ thương, chất liệu an toàn, lại mang dấu ấn thương hiệu rõ ràng.',
                },
            ],
        }
    },
    methods: {
        applyFilters() {
            Inertia.get('/posts', this.filters, {
                preserveState: true,
                preserveScroll: true,
            })
        },
    },
}
</script>

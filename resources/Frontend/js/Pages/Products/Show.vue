<template>
    <main class="bg-primary-25">
        <section class="relative pt-6 pb-12">
            <div class="container space-y-3">
                <JamBreadcrumb :items="breadcrumbs" />
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="col-span-full md:col-span-6">
                        <div class="flex relative flex-col gap-2 justify-center items-start max-sm:gap-1.5">
                            <div
                                class="flex relative gap-2.5 items-center self-stretch aspect-w-1 aspect-h-1 h-[300px] lg:h-[400px] xl:h-[558px]"
                            >
                                <JPicture
                                    :src="mainImage.url"
                                    :alt="altText"
                                    class="w-full h-full object-cover"
                                    @click="selectImage(mainImage)"
                                />
                            </div>
                            <div class="grid grid-cols-5 gap-2 w-full">
                                <div
                                    v-for="(thumbnail, index) in product.images"
                                    :key="index"
                                    class="relative aspect-w-1 aspect-h-1 cursor-pointer h-full w-full"
                                    :class="{ 'opacity-30': thumbnail !== mainImage }"
                                    @click="selectImage(thumbnail)"
                                >
                                    <JPicture
                                        :src="thumbnail.url"
                                        alt="image thumbnail"
                                        wra
                                        class="w-full h-full object-cover"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full md:col-span-6 flex items-center justify-center">
                        <div class="space-y-4 md:space-y-6 xl:space-y-8 w-full">
                            <h1 class="display-2 text-gray-900 uppercase">{{ product.title }}</h1>

                            <div class="headline-1 text-gray-700">
                                {{ new Intl.NumberFormat('vi-VN').format(product.price) + ' VNĐ' }}
                            </div>

                            <div
                                class="flex relative gap-2 items-start self-stretch max-lg:flex-col max-lg:gap-3 max-sm:gap-2"
                            >
                                <button
                                    @click="addToCart('order')"
                                    class="flex relative gap-2 justify-center items-center px-2 xl:px-5 py-3 bg-white border border-gray-300 border-solid shadow-sm cursor-pointer flex-[1_0_0] rounded-[800px] max-lg:w-full max-sm:px-4 max-sm:py-2.5 hover:bg-gray-50 transition-colors"
                                >
                                    <svg
                                        width="19"
                                        height="19"
                                        viewBox="0 0 19 19"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M9.49935 6.16675V12.8334M6.16602 9.50008H12.8327M17.8327 9.50008C17.8327 14.1025 14.1017 17.8334 9.49935 17.8334C4.89698 17.8334 1.16602 14.1025 1.16602 9.50008C1.16602 4.89771 4.89698 1.16675 9.49935 1.16675C14.1017 1.16675 17.8327 4.89771 17.8327 9.50008Z"
                                            stroke="#344054"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>

                                    <span
                                        class="relative text-lg font-bold tracking-normal leading-7 text-slate-700 max-sm:text-base"
                                    >
                                        Thêm vào giỏ hàng
                                    </span>
                                </button>

                                <button
                                    @click="addToCart('buyNow')"
                                    class="flex relative gap-2 justify-center items-center px-5 py-3 bg-yellow-700 border border-yellow-700 border-solid shadow-sm cursor-pointer flex-[1_0_0] h-[51px] rounded-[800px] max-lg:w-full max-sm:px-4 max-sm:py-2.5 hover:bg-yellow-800 transition-colors"
                                >
                                    <span
                                        class="relative text-lg font-bold tracking-normal leading-7 text-orange-100 max-sm:text-base"
                                    >
                                        Mua ngay
                                    </span>
                                </button>
                            </div>
                            <div class="body-1" v-html="product.description"></div>

                            <div class="space-y-2">
                                <h3 class="label-1 text-gray-800">Additional Information:</h3>
                                <div class="body-1 text-gray-800 prose-infomation" v-html="product.content"></div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="body-2 text-gray-800">Share</div>
                                <div class="flex items-center gap-6">
                                    <a
                                        :href="facebookUrl"
                                        target="_blank"
                                        class="inline-block lg:hover:opacity-70 duration-300 ease-in-out cursor-pointer"
                                    >
                                        <FacebookProduct />
                                    </a>
                                    <a
                                        :href="youtubeUrl"
                                        target="_blank"
                                        class="inline-block lg:hover:opacity-70 duration-300 ease-in-out cursor-pointer"
                                    >
                                        <YoutubeProduct />
                                    </a>
                                    <a
                                        :href="instagramUrl"
                                        target="_blank"
                                        class="inline-block lg:hover:opacity-70 duration-300 ease-in-out cursor-pointer"
                                    >
                                        <InstagramProduct />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <SectionRelatedProducts :items="related_products" />
        <section
            class="flex relative justify-center items-end bg-white min-h-[350px] lg:min-h-[320px] xl:min-h-[400px] md:py-0 py-12"
        >
            <div class="absolute bottom-0 left-0 w-full bg-primary-500 h-full md:h-[250px] xl:h-[283px] z-[1]"></div>

            <div class="relative w-full">
                <div class="container">
                    <div class="md:flex items-center justify-between">
                        <div class="relative z-[1] text-white max-w-[770px] w-full max-md:text-center">
                            <h2 class="display-3">Tặng phẩm thiết kế riêng</h2>
                            <p class="body-1 mt-3 xl:mt-4 mb-3 md:mb-4 xl:mb-5">
                                Dù là quà tặng trong sự kiện, vật phẩm khuyến mại hay bộ kit giới thiệu sản phẩm mới,
                                Sip N Source luôn đảm bảo sự chỉn chu, cảm xúc và hiệu quả truyền thông lâu dài.
                            </p>
                            <Link :href="route('products.index')" class="btn third flex items-center justify-center">
                                <span>Xem ngay</span>
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

import FacebookProduct from '@/Components/Icon/FacebookProduct.vue'
import YoutubeProduct from '@/Components/Icon/YoutubeProduct.vue'
import InstagramProduct from '@/Components/Icon/InstagramProduct.vue'

import { useAppStore } from '@/stores/index'

export default {
    components: { FacebookProduct, YoutubeProduct, InstagramProduct },
    props: ['related_products', 'product'],
    data() {
        return {
            breadcrumbs: [
                {
                    title: this.tt('Sản phẩm'),
                    link: '/',
                },
                {
                    title: this.product?.title,
                },
            ],
            thumbnails: [
                'https://api.builder.io/api/v1/image/assets/TEMP/a4e497b8353f9ecf774a9e55a821ee8b464c2b98?width=210',
                'https://api.builder.io/api/v1/image/assets/TEMP/2b13aa2c8981fa0d2e8d19ecdf71be1b2d5f4a5a?width=210',
                'https://api.builder.io/api/v1/image/assets/TEMP/c4db74839791702c923d77cf5f15dde20da2d653?width=210',
                'https://api.builder.io/api/v1/image/assets/TEMP/09496e28ad87befc79c535d79a81735444519253?width=210',
                'https://api.builder.io/api/v1/image/assets/TEMP/2a4d8f9a09e724c6961463f81f22040c6e446b8d?width=210',
            ],
            mainImage:
                'https://api.builder.io/api/v1/image/assets/TEMP/831ae213fb47669010e40e2e7e10a6506281fdda?width=1116',
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
            quantity: 1,
            isLoadingCart: false,
            mainImage: null,
        }
    },
    created() {
    if (this.product && this.product.images && this.product.images.length > 0) {
        this.mainImage = this.product.images[0];
    }
},
    computed: {
        appStore() {
            return useAppStore()
        },
    },
    methods: {
        selectImage(imageUrl) {
            this.mainImage = imageUrl
        },
        async addToCart(type) {
            if (this.isLoadingCart) return
            this.isLoadingCart = true
            this.$bus.emit('popup-cart-success')
            const productID = this.product.id
            const { data } = await axios.post(this.route('checkout.cart.store'), {
                product_id: productID,
                quantity: this.quantity,
            })
            this.appStore.$patch({
                cart: data,
            })

            this.isLoadingCart = false

            if (typeof this.$gtm !== 'undefined') {
                this.$gtm.trackEvent({
                    event: 'add_to_cart', // Event type [default = 'interaction'] (Optional)
                    action: 'click',
                    value: this.currentProduct.price,
                    items: [
                        {
                            id: this.currentProduct.id.toString(),
                            google_business_vertical: 'retail',
                        },
                    ],
                })
            }

            if (typeof fbq !== 'undefined') {
                fbq('track', 'AddToCart', {
                    content_ids: [productID.toString()],
                    content_type: 'product_group',
                    content_name: this.product.title,
                    value: this.product.price,
                    currency: 'VND',
                    num_items: this.quantity,
                })
            }
            if (typeof ttq !== 'undefined') {
                ttq.track('AddToCart', {
                    content_id: productID.toString(),
                    content_type: 'product',
                    content_name: this.product.title,
                    value: this.product.price,
                    currency: 'VND',
                })
            }
            const BASE_URL_ORDER = this.route('checkout.cart.index')
            type === 'buyNow' ? this.$inertia.visit(BASE_URL_ORDER) : ''
        },
    },
}
</script>

<style></style>

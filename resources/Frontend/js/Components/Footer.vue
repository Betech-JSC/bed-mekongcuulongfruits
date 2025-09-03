<template>
    <footer class="relative py-10">
        <div class="absolute inset-0">
            <div class="absolute inset-0">
                <JPicture
                    src="/assets/images/bg-footer.webp"
                    alt="background footer"
                    class="w-full h-full object-cover"
                />
            </div>
        </div>
        <div class="relative">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="col-span-full xl:col-span-4">
                        <div class="max-w-[200px] lg:max-w-[269px] max-h-[106px] opacity-75 max-xl:mx-auto">
                            <Link :href="route('home')">
                                <JPicture src="/assets/images/logo-footer.png" alt="logo" class="w-full h-full" />
                            </Link>
                        </div>
                    </div>
                    <div
                        class="col-span-full xl:col-span-8 flex md:flex-row flex-col items-start justify-between gap-8 lg:gap-16"
                    >
                        <div class="space-y-3 md:max-w-[300px] lg:max-w-[400px] xl:max-w-[307px] w-full">
                            <div class="label-1 text-primary-100/75 uppercase">CÔNG TY TNHH KHƠI VỊ</div>
                            <div class="label-2 !font-normal text-primary-100/75 space-y-3">
                                <div v-for="(itemInfo, indexInfo) in infos" :key="indexInfo">
                                    <span class="mr-1">{{ itemInfo.title }}</span>
                                    <span class="lg:hover:text-primary-100 duration-300 ease-in-out">
                                        <a
                                            :href="itemInfo.href"
                                            :target="itemInfo.target"
                                            rel="noopener noreferrer nofollow"
                                        >
                                            {{ itemInfo.content }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <a
                                    v-for="(itemSocial, indexSocial) in socials"
                                    :key="indexSocial"
                                    :href="itemSocial.href"
                                    target="_blank"
                                    rel="noopener noreferrer nofollow"
                                    class="lg:hover:opacity-100 opacity-75 duration-300 ease-in-out"
                                >
                                    <JPicture :src="itemSocial.icon" :alt="itemSocial.alt" />
                                </a>
                            </div>
                            <div class="max-w-[114px] max-h-[43px]">
                                <JPicture src="/assets/images/image-gov.png" alt="image gov" class="w-full h-full" />
                            </div>
                        </div>
                        <div class="md:space-y-6 space-y-4 xl:space-y-8">
                            <div class="label-1 text-primary-100/75">Sip N Source</div>
                            <ul class="md:space-y-3 space-y-2 xl:space-y-4">
                                <li v-for="(itemMenu, indexMenu) in menus" :key="indexMenu">
                                    <Link
                                        :href="itemMenu.slug"
                                        class="button-1 !font-normal text-primary-100/75 lg:hover:text-primary-100 duration-300 ease-in-out"
                                    >
                                        {{ itemMenu.title }}
                                    </Link>
                                </li>
                            </ul>
                        </div>
                        <div class="md:space-y-6 space-y-4 xl:space-y-8">
                            <div class="label-1 text-primary-100/75">Sản phẩm</div>
                            <ul class="md:space-y-3 space-y-2 xl:space-y-4">
                                <li v-for="(itemProduct, indexProduct) in categories" :key="indexProduct">
                                    <Link
                                        v-if="itemProduct.slug"
                                        :href="
                                            route('products.categories', {
                                                slug: itemProduct.slug,
                                            })
                                        "
                                        class="button-1 !font-normal text-primary-100/75 lg:hover:text-primary-100 duration-300 ease-in-out"
                                    >
                                        {{ itemProduct.title }}
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            infos: [
                {
                    title: 'Email:',
                    content: this.tt('sipnsource@gmail.com'),
                    href: `mailto:${this.tt('sipnsource@gmail.com')}`,
                    target: '_self',
                },
                {
                    title: 'Điện thoại:',
                    content: this.tt('0987 654 321'),
                    href: `tel:${this.tt('0987 654 321')}`,
                    target: '_self',
                },
                {
                    title: 'Văn phòng:',
                    content: '91/55 Đường T8, Phường Tây Thạnh, Quận Tân Phú, Thành phố Hồ Chí Minh, Việt Nam.',
                    href: 'https://maps.app.goo.gl/VamA4nKhMs1BzcRQA',
                    target: '_blank',
                },
            ],
            socials: [
                {
                    link: this.$page.props.global.general_fb_link ?? '',
                    icon: '/assets/svg/social/facebook.svg',
                    alt: 'fb icon',
                },
                {
                    link: this.$page.props.global.general_youtube_link ?? '',
                    icon: '/assets/svg/social/youtube.svg',
                    alt: 'youtube icon',
                },
                {
                    link: this.$page.props.global.general_instagram_link ?? '',
                    icon: '/assets/svg/social/instagram.svg',
                    alt: 'instagram icon',
                },
            ],
            menus: [
                {
                    title: this.tt('Giới thiệu'),
                    slug: this.route('histories.index'),
                    type: 'histories',
                    subMenu: [],
                },
                {
                    title: this.tt('Sản phẩm'),
                    slug: this.route('products.index'),
                    type: 'products',
                    subMenu: [],
                },
                {
                    title: this.tt('Dịch vụ'),
                    slug: this.route('services'),
                    type: 'services',
                    subMenu: [],
                },
                {
                    title: this.tt('Bài viết'),
                    slug: this.route('posts'),
                    type: 'posts',
                    subMenu: [],
                },
                {
                    title: this.tt('Liên hệ'),
                    slug: this.route('contact'),
                    type: 'contact',
                    subMenu: [],
                },
            ],
            currentYear: '',
        }
    },
    computed: {
        categories() {
            return this.$page.props.data.footer_categories || []
        },
        products() {
            return this.$page.props.data.footer_products || []
        },
        policies() {
            return this.$page.props.data.policies || []
        },
        global() {
            return this.$page.props.data.global
        },
    },
    created: function () {
        this.currentYear = new Date().getFullYear()
    },
}
</script>
<style lang="scss" scoped>
.bg-footer {
    background: url('/assets/images/footer/background-mobile.webp');
    @apply bg-cover bg-no-repeat;
}
@media screen and (min-width: 768px) {
    .bg-footer {
        background: url('/assets/images/footer/background.webp');
        @apply bg-cover bg-no-repeat;
    }
}
</style>

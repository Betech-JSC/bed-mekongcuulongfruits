<template>
    <footer class="relative space-y-10 py-10">
        <div class="container">
            <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                <div class="col-span-full xl:col-span-4">
                    <div class="max-w-[200px] lg:max-w-[221px] max-h-[215px] max-xl:mx-auto">
                        <Link :href="route('home')">
                        <JPicture src="/assets/images/logo-footer.png" alt="logo" class="w-full h-full" />
                        </Link>
                    </div>
                </div>
                <div
                    class="col-span-full xl:col-span-8 flex md:flex-row flex-col items-start justify-between gap-8 lg:gap-16">
                    <div class="space-y-3 md:max-w-[300px] lg:max-w-[400px] xl:max-w-[307px] w-full">
                        <div class="label-1 font-semibold text-brown uppercase">Công ty TNHH Vietnam Farmer</div>
                        <div class="label-2 !font-normal space-y-3">
                            <div v-for="(itemInfo, indexInfo) in infos" :key="indexInfo">
                                <span class="mr-1 font-bold">{{ itemInfo.title }}</span>
                                <span class="text-gray-900 lg:hover:text-primary duration-300 ease-in-out">
                                    <a :href="itemInfo.href" :target="itemInfo.target"
                                        rel="noopener noreferrer nofollow">
                                        {{ itemInfo.content }}
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <a v-for="(itemSocial, indexSocial) in socials" :key="indexSocial" :href="itemSocial.link"
                                target="_blank" rel="noopener noreferrer nofollow"
                                class="w-8 h-8 lg:hover:opacity-100 opacity-75 duration-300 ease-in-out">
                                <JPicture :src="itemSocial.icon" :alt="itemSocial.alt" />
                            </a>
                        </div>
                    </div>
                    <div class="md:space-y-6 space-y-4 xl:space-y-8">
                        <div class="label-1 font-semibold uppercase text-brown">Vietnam Farmer</div>
                        <ul class="md:space-y-3 space-y-2 xl:space-y-4">
                            <li v-for="(itemMenu, indexMenu) in menus" :key="indexMenu">
                                <Link :href="itemMenu.slug"
                                    class="body-2 text-gray-900 lg:hover:text-primary duration-300 ease-in-out">
                                {{ itemMenu.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div class="md:space-y-6 space-y-4 xl:space-y-8 max-w-[150px]">
                        <div class="label-1 font-semibold text-brown">Products</div>
                        <ul class="md:space-y-3 space-y-2 xl:space-y-4">
                            <li v-for="(itemProduct, indexProduct) in $page.props.data.products" :key="indexProduct">
                                <Link v-if="itemProduct.slug" :href="route('products.show', {
                                    slug: itemProduct.slug,
                                })
                                    " class="body-2 text-gray-900 lg:hover:text-primary duration-300 ease-in-out">
                                {{ itemProduct.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="border-t border-[#F9EDD0] border-opacity-30 py-3">
            <div class="container">
                <div class="flex md:flex-row flex-col items-center justify-between gap-4 md:gap-0 text-gray-700 body-2">
                    <div>© FARMER VIETNAM. All rights reserved.</div>
                    <div class="flex items-center gap-4 body-2">
                        <div v-for="(itemPolicy, indexPolicy) in policies" :key="indexPolicy"
                            class="lg:hover:text-primary duration-300 ease-in-out relative flex items-center justify-center gap-3">
                            <Link :href="route('policies.show', { slug: itemPolicy.slug })">
                            {{ itemPolicy.title }}
                            </Link>
                            <span v-if="indexPolicy < policies.length - 1"
                                class="w-1 h-1 bg-gray-500 rounded-full mt-0.5"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </footer>
</template>
<script>
export default {
    data() {
        return {
            infos: [
                {
                    title: 'Email:',
                    content: this.tt('vietnamfarmer@gmail.com'),
                    href: `mailto:${this.tt('vietnamfarmer@gmail.com')}`,
                    target: '_self',
                },
                {
                    title: 'Phone:',
                    content: this.tt('0909 981 381'),
                    href: `tel:${this.tt('0909 981 381')}`,
                    target: '_self',
                },
                {
                    title: 'Office:',
                    content: 'No. 4 Street 1A, Hamlet 57, Tan Nhut Commune, Ho Chi Minh City, Vietnam',
                    href: 'https://maps.app.goo.gl/SA8X8sqzuSftUyEPA',
                    target: '_blank',
                },
            ],
            socials: [
                // {
                //     link: this.$page.props.global.general_fb_link ?? '',
                //     icon: '/assets/svg/social/facebook.svg',
                //     alt: 'fb icon',
                // },
                {
                    link: 'https://vietnamfarmer.com.vn',
                    icon: '/assets/images/icon-website.png',
                    alt: 'website icon',
                },
                {
                    link: this.$page.props.global.general_whatapp_link ?? 'https://wa.me/84909981381',
                    icon: '/assets/svg/social/whatapp.svg',
                    alt: 'whatapp icon',
                },
                // {
                //     link: this.$page.props.global.general_youtube_link ?? '',
                //     icon: '/assets/svg/social/youtube.svg',
                //     alt: 'youtube icon',
                // },
                // {
                //     link: this.$page.props.global.general_instagram_link ?? '',
                //     icon: '/assets/svg/social/instagram.svg',
                //     alt: 'instagram icon',
                // },
            ],
            menus: [
                {
                    title: this.tt('About Us'),
                    slug: this.route('histories.index'),
                    type: 'histories',
                    subMenu: [],
                },
                {
                    title: this.tt('Products'),
                    slug: this.route('products.show', { slug: this.$page.props.data.products[0]?.slug }),
                    type: 'products',
                    subMenu: [],
                },
                {
                    title: this.tt('Factory'),
                    slug: this.route('factory.index'),
                    type: 'factory',
                    subMenu: [],
                },
                {
                    title: this.tt('Careers'),
                    slug: this.route('jobs'),
                    type: 'jobs',
                    subMenu: [],
                },
                {
                    title: this.tt('News'),
                    slug: this.route('posts'),
                    type: 'posts',
                    subMenu: [],
                },
                {
                    title: this.tt('Contact'),
                    slug: this.route('contact'),
                    type: 'contact',
                    subMenu: [],
                },
            ],
            policies: [
                {
                    title: this.tt('Policy'),
                    slug: 'policy',
                },
                {
                    title: this.tt('Trade Terms'),
                    slug: 'trade-terms',
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
        // policies() {
        //     return this.$page.props.data.policies || []
        // },
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

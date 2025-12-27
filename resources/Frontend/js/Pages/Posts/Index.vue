<template>
    <main>
        <BannerImage :banner="banner" classBanner="h-[320px]" />
        <section class="py-20">
            <div class="container md:space-y-6 space-y-4 xl:space-y-12">
                    <div
                        class="grid md:grid-cols-2 md:gap-6 gap-4 xl:gap-12"
                    >
                        <CardCardPost
                            :item="postsHot.data[0]"
                        />
                        <div class="flex flex-col md:gap-6 gap-4 xl:gap-12">
                            <CardCardPostRow v-for="(itemPostHot, indexPostHot) in postsHot.data.slice(1,4)" :key="indexPostHot" :item="itemPostHot" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:grid-cols-3 md:gap-6 gap-4 xl:gap-12">
                        <CardCardPost v-for="(itemPost, indexPost) in posts.data" :key="indexPost" :item="itemPost" />
                    </div>
                    <Pagination :links="posts.links" />
            </div>
        </section>
    </main>
</template>
<script>
import Pagination from '@/Components/Paginate.vue'

export default {
    components: { Pagination },

    props: ['categories', 'posts', 'banner'],
    data() {
        return {
            banner: {
                title: this.tt('News'),
                image: '/assets/images/posts/banner.jpg',
            },
            postsHot: {
                data: [
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                ]
            }
,
            posts: {
                data: [
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                    {
                        image: {
                            url: "/assets/images/posts/banner.jpg",
                            alt: "image demo"
                        },
                        title: "VietNam Farmer Expands Export to Japan",
                        slug: "demo",
                        description: "We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality."
                    },
                ]
            }        }
    },
}
</script>

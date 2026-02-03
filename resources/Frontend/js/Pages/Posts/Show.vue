<template>
    <main>
        <section class="pt-[72px] pb-3 md:py-[112px]">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="col-span-full lg:col-span-5 flex flex-col justify-between">
                        <div class="md:space-y-6 space-y-3 xl:space-y-8">
                            <JamBreadcrumb :items="breadcrumbs" />
                            <h1 class="headline-3 font-bold text-brand-100 uppercase">
                                {{ post?.title }}
                            </h1>
                        </div>

                        <div class="space-y-4">
                            <div class="body-1">
                                {{ formatDateBlog(post?.published_at) }}
                            </div>
                            <SocialShare />
                        </div>
                    </div>
                    <div class="col-span-full lg:col-span-7">
                        <div class="aspect-w-8 aspect-h-5">
                            <JPicture :src="post?.image?.url || '/assets/images/posts/banner.jpg'"
                                :alt="post?.image?.alt || post.title || 'image demo'" wrapperClass="picture-cover"
                                class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="md:py-16 py-12 xl:py-20">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div
                        class="lg:col-span-10 lg:col-start-2 col-span-full xl:col-span-8 xl:col-start-3 pb-16 border-b border-[#F2F2F2]">
                        <div class="label-1 text-black font-semibold">
                            {{ post?.description }}
                        </div>
                        <div class="prose prose-blog mt-10 mb-16" v-html="post?.content">

                        </div>
                        <SocialShare />
                    </div>
                </div>
            </div>
        </section>

        <SectionRelatedPosts :items="related_posts" />
    </main>
</template>

<script>
import JamBreadcrumb from '@/Components/Jam/Breadcrumb.vue'
export default {
    components: { JamBreadcrumb },
    props: ['post', 'related_posts'],
    data() {
        return {
            breadcrumbs: [
                {
                    title: 'Tin tức',
                    link: this.route('posts'),
                },
                {
                    title: this.post?.title,
                },
            ],
            posts: {
                data: [
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                    {
                        image: {
                            url: '/assets/images/posts/banner.jpg',
                            alt: 'image demo',
                        },
                        title: 'VietNam Farmer Expands Export to Japan',
                        slug: 'demo',
                        description:
                            'We are proud to announce our first shipment of Cavendish bananas to Japan, a market known for its strict quality standards. This milestone reflects our commitment to global growth and premium quality.',
                    },
                ],
            },
        }
    },
}
</script>

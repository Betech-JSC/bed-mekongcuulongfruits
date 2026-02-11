<template>
    <main>
        <BannerImage :banner="banner" classBanner="h-[320px]" />
        <section class="py-20">
            <div class="container md:space-y-6 space-y-4 xl:space-y-12">
                <AnimatedAppear class="grid md:grid-cols-2 md:gap-6 gap-4 xl:gap-12">
                    <CardCardPost :item="top_posts[0]" />
                    <div class="flex flex-col md:gap-6 gap-4 xl:gap-12">
                        <CardCardPostRow v-for="(itemPostHot, indexPostHot) in top_posts.slice(1, 4)"
                            :key="indexPostHot" :item="itemPostHot" />
                    </div>
                </AnimatedAppear>
                <div class="grid grid-cols-2 lg:grid-cols-3 md:gap-6 gap-4 xl:gap-12">
                    <AnimatedAppear v-for="(itemPost, indexPost) in posts.data" :key="indexPost">
                        <CardCardPost :item="itemPost" />
                    </AnimatedAppear>
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

    props: ['categories', 'posts', 'top_posts'],
    data() {
        return {
            banner: {
                title: this.tt('News'),
                image: '/assets/images/posts/banner.jpg',
            },
        }
    },
}
</script>

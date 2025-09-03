<template>
    <main class="bg-primary-25">
        <BannerImage :banner="bannerBlog" classBanner="h-[320px]" />
        <section class="py-12">
            <div class="container md:space-y-6 space-y-4 xl:space-y-8">
                <div class="md:flex items-center justify-end">
                    <div class="flex items-center gap-3">
                        <CustomSelect title="Danh mục" :options="categories" filterKey="categories" type="post" />
                        <CustomSelect
                            title="Sắp xếp"
                            :options="[
                                { title: 'Mới nhất', value: 'desc' },
                                { title: 'Cũ nhất', value: 'asc' },
                                { title: 'A → Z', value: 'az' },
                                { title: 'Z → A', value: 'za' },
                            ]"
                            filterKey="sort"
                            type="post"
                        />
                    </div>
                </div>
                <div v-if="posts.data && posts.data.length">
                    <div
                        class="grid grid-cols-2 md:gap-6 gap-3 xl:gap-8 border-b border-gray-200 md:pb-6 pb-4 xl:pb-8 notranslate"
                    >
                        <CardCardPostRow class="col-span-full" :item="posts.data[0]" />
                        <CardCardPost
                            v-for="(itemPost, indexPost) in posts.data.slice(1)"
                            :key="indexPost"
                            :item="itemPost"
                        />
                    </div>
                    <Pagination :links="posts.links" class="pt-3 pb-4" />
                </div>
            </div>
        </section>
    </main>
</template>
<script>
import JamBreadcrumb from '@/Components/Jam/Breadcrumb.vue'
import Pagination from '@/Components/Paginate.vue'
import LogoSymbol from '@/Components/Icons/LogoSymbol.vue'

export default {
    components: { JamBreadcrumb, Pagination, LogoSymbol },

    props: ['categories', 'posts', 'banner'],
    data() {
        return {
            bannerBlog: {
                title: this.tt('Góc Nhìn Từ Sip N Source'),
                description: this.tt('Chia sẻ kiến thức, kinh nghiệm và cảm hứng từ những chiến dịch'),
                image: '/assets/images/posts/bg-banner.webp',
                breadcrumbs: [
                    {
                        title: this.tt('Bài viết'),
                    },
                ],
            },
        }
    },
}
</script>

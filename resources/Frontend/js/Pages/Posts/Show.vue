<template>
    <main>
        <section class="pt-6 xl:pb-[112px]">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div class="col-span-full lg:col-span-5 flex flex-col justify-between">
                        <div class="md:space-y-6 space-y-3 xl:space-y-8">
                            <JamBreadcrumb :items="breadcrumbs" />
                            <h1 class="headline-3 font-bold text-brand-100 uppercase">
                                Vietnam fruit, vegetable exports hit record high in September, led by durian, processed
                                goods
                            </h1>
                        </div>

                        <div class="space-y-4">
                            <div class="body-1">11 Jan 2022</div>
                            <SocialShare />
                        </div>
                    </div>
                    <div class="col-span-full lg:col-span-7">
                        <div class="aspect-w-8 aspect-h-5">
                            <JPicture
                                src="/assets/images/posts/banner.jpg"
                                alt="image demo"
                                wrapperClass="picture-cover"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="md:py-16 py-12 xl:py-20">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 xl:gap-8">
                    <div
                        class="lg:col-span-10 lg:col-start-2 col-span-full xl:col-span-8 xl:col-start-3 pb-16 border-b border-[#F2F2F2]"
                    >
                        <div class="label-1 text-black font-semibold">
                            Vietnam’s fruit and vegetable exports reached nearly US$1.3 billion in September, a record
                            high, driven by strong shipments of durians and rising demand for processed products,
                            customs data showed.
                        </div>
                        <div class="prose prose-blog mt-10 mb-16">
                            <h2>Introduction</h2>
                            <p>
                                Export value in the first half of the month totaled $650 million, up 41 percent from a
                                year earlier.
                            </p>
                            <p>
                                The full-month estimate puts fruit and vegetables ahead of wood and seafood for the
                                first time, making the category Vietnam’s top agricultural export.
                            </p>
                            <p>
                                Cumulative exports between January and September rose 8.3 percent year on year to $6.1
                                billion.
                            </p>
                            <p>
                                Durians led September shipments, contributing $800 million to $900 million, according to
                                industry estimates.
                            </p>
                            <p>
                                Exporters said durian containers to China more than doubled from August, after new food
                                safety controls were introduced earlier this year to address prior quality rejections.
                            </p>
                            <img src="/assets/images/posts/banner.jpg" />
                            <i>Durian is the Vietnamese fruit with the highest export revenu. (Photo: Minh Ha)</i>
                            <p>
                                Processed fruits and vegetables also gained momentum, driven by investments in factories
                                and expanded raw material zones, said Dang Phuc Nguyen, general secretary of the Vietnam
                                Fruit and Vegetable Association (VinaFruit).
                            </p>
                            <p>“This is becoming a new growth engine for the sector,” Nguyen said.</p>
                            <p>
                                China remained Vietnam’s largest market, accounting for 58 percent of the Southeast
                                Asian country's total fruit and vegetable exports in the first nine months.
                            </p>
                            <p>
                                However, shipments to other markets rose sharply: exports to the United States rose 60
                                percent to $363 million, Japan increased 21 percent, the Netherlands 39 percent, and
                                Malaysia 67 percent.
                            </p>
                            <p>
                                Exporters said the shift reflects an effort to reduce dependence on China, where trade
                                is often affected by seasonal demand and shifting import rules.
                            </p>
                            <p>
                                Recent trade protocols signed with China in 2024–25 have allowed official exports of
                                frozen durians, fresh coconuts, chili peppers, and passion fruits, creating new
                                opportunities for growth.
                            </p>
                            <p>
                                VinaFruit expects full-year exports to reach or exceed $8 billion, supported by rising
                                demand and continued investment in processing.
                            </p>
                        </div>
                        <SocialShare />
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-primary-25 py-12 md:py-20 xl:py-[112px]">
            <div class="container space-y-4 md:space-y-6 xl:space-y-10">
                <h2 class="display-2 text-center uppercase font-bold">Related posts</h2>
                <div class="grid md:grid-cols-3 gap-4 md:gap-6 xl:gap-12">
                    <CardCardPost
                        v-for="(itemPost, indexPost) in posts.data.slice(1, 4)"
                        :key="indexPost"
                        :item="itemPost"
                    />
                </div>
            </div>
        </section>
        <!-- <SectionRelatedPosts :items="related_posts" /> -->
    </main>
</template>

<script>
import JamBreadcrumb from '@/Components/Jam/Breadcrumb.vue'
export default {
    components: { JamBreadcrumb },
    props: ['post', 'related_posts', 'breadcrumbs'],
    data() {
        return {
            breadcrumbs: [
                {
                    title: 'News',
                    link: 'news',
                },
                {
                    title: 'Import and Export',
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


<style lang="scss" scoped>
.prose-blog {

}
</style>

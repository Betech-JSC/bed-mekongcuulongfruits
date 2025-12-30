<template>
    <div v-if="item.slug" class="space-y-3 group">
        <Link
            :href="
                route('products.show', {
                    slug: item.slug,
                })
            "
            class="aspect-w-1 aspect-h-1 block relative overflow-hidden rounded-xl"
        >
            <JPicture
                :src="item.image?.url || '/assets/images/demo/image-product.jpg'"
                :alt="item.title"
                wrapperClass="picture-cover"
                class="w-full h-full object-cover lg:group-hover:scale-95 duration-300 ease-in-out"
            />
        </Link>
        <div class="md:space-y-4 space-y-3 xl:space-y-6 bg-white p-3 rounded-xl">
            <div class="space-y-1">
                <div class="body-2 text-gray-900">{{ item.subTitle }}</div>
                <Link
                    :href="
                        route('products.show', {
                            slug: item.slug,
                        })
                    "
                    class="label-1 font-semibold text-brand-100 lg:group-hover:text-primary duration-300 ease-in-out"
                >
                    {{ item.title }}
                </Link>
            </div>
            <div class="body-2 text-gray-900 line-clamp-3">
                {{ item.description }}
            </div>
            <div class="flex items-center gap-1">
                <div class="body-2 text-gray-9">Sản lượng</div>
                <div 
                    :style="{ backgroundColor: production.color }"
                    class="text-gray-900 body-2 py-1 px-2.5 rounded-full"
                >
                    {{ production.text }}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        item: {
            type: Object,
            required: true,
        },
    },
    computed: {
        production() {
            return this.checkProduction(this.item.type)
        },
    },
    methods: {
        checkProduction(idx) {
            const production = {
                1: { text: 'Ổn định', color: '#8BC34A' },
                2: { text: 'Có nhiều', color: '#8BC34A' },
                3: { text: 'Tương đối ít', color: '#E5C025' },
                4: { text: 'Hiếm', color: '#FF9757' },
            }
            return production[idx] || { text: '', color: '#000000' }
        },
    },
}
</script>

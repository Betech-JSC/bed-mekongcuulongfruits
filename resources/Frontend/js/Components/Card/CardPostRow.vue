<template>
    <div v-if="item.slug" class="flex items-start md:gap-2.5 gap-1.5 xl:gap-[14px] group">
        <Link
            :href="
                route('posts.show', {
                    slug: item.slug,
                })
            "
            class="max-w-[171px] w-full relative overflow-hidden rounded-2xl block"
        >
            <div class="aspect-w-3 aspect-h-2">
                <JPicture
                    :src="item.image.url || '/cover.jpg'"
                    :alt="item.image.alt || item.title || 'image card post'"
                    wrapperClass="picture-cover"
                    class="w-full h-full object-cover lg:group-hover:scale-105 duration-300 ease-in-out"
                />
            </div>
        </Link>

        <div class="flex-1 w-full md:space-y-2.5 space-y-1.5 xl:space-y-[14px]">
            <Link
                :href="
                    route('posts.show', {
                        slug: item.slug,
                    })
                "
                class="title-2 line-clamp-2 font-bold text-gray-900 lg:group-hover:text-primary duration-300 ease-in-out"
            >
                {{ item.title }}
            </Link>
            <p class="body-1 text-gray-700 line-clamp-2">
                {{ item.description }}
            </p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    item: {
        type: Object,
        required: true,
        default: () => ({
            title: '',
            description: '',
            image: '',
            date: '',
            readTime: 0,
        }),
    },
})
</script>

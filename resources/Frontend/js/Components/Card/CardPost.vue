<template>
    <div v-if="item.slug" class="group md:space-y-2.5 space-y-1.5 xl:space-y-[14px]">
        <Link
            :href="
                route('posts.show', {
                    slug: item.slug,
                })
            "
            class="aspect-w-3 aspect-h-2 relative rounded-2xl overflow-hidden block"
        >
            <JPicture
                :src="item.image.url || '/cover.jpg'"
                :alt="item.image.alt || item.title || 'image card post'"
                wrapperClass="picture-cover"
                class="w-full h-full object-cover lg:group-hover:scale-105 duration-300 ease-in-out"
            />
        </Link>
        <Link
            :href="
                route('posts.show', {
                    slug: item.slug,
                })
            "
            class="headline-3 line-clamp-2 font-bold text-gray-900 lg:group-hover:text-primary duration-300 ease-in-out block"
        >
            {{ item.title }}
        </Link>
        <p class="body-1 text-gray-700 line-clamp-2">
            {{ item.description }}
        </p>
    </div>
</template>

<script setup>
defineProps({
    item: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <div>
        <Link :href="route('products.show', {
            slug: item.slug,
        })
            " class="w-full h-[408px] block relative overflow-hidden rounded-xl">
        <JPicture :src="item.image?.url || '/assets/images/demo/image-product.jpg'" :alt="item.title"
            wrapperClass="picture-cover"
            class="w-full h-full object-cover lg:group-hover:scale-95 duration-300 ease-in-out" />
        </Link>
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
}
</script>

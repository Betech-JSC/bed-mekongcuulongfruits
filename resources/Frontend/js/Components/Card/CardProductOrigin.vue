<template>
    <div class="space-y-2">
        <div class="w-full h-[408px] block relative overflow-hidden rounded-[16px]">
            <JPicture :src="item.image?.url || '/assets/images/demo/image-product.jpg'" :alt="item.title"
                wrapperClass="picture-cover"
                class="w-full h-full object-cover lg:group-hover:scale-95 duration-300 ease-in-out" />
        </div>
        <div class="space-y-2">
            <div class="body-0 font-bold">{{ item.title }}</div>
            <div class="body-1">{{ item.description }}</div>
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
}
</script>

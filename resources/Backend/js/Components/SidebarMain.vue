<template>
    <span class="hidden">
        {{ $page.props.route.name }}
    </span>
    <Link
        v-if="can('admin.product-categories.index')"
        :href="route('admin.product-categories.index')"
        :class="{ active: isUrl('admin.product-categories.*') }"
        class="item"
    >
        <fluent-mdl2:product-list />
        <span>{{ tt('models.table_list.product-categories') }}</span>
    </Link>
    <Link
        v-if="can('admin.post-categories.index')"
        :href="route('admin.post-categories.index')"
        :class="{ active: isUrl('admin.post-categories.*') }"
        class="item"
    >
        <bx:category />
        <span>{{ tt('models.table_list.post-categories') }}</span>
    </Link>
    <Link
        v-if="can('admin.products.index')"
        :href="route('admin.products.index')"
        :class="{ active: isUrl('admin.products.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span>{{ tt('models.table_list.products') }}</span>
    </Link>
    <Link
        v-if="can('admin.posts.index')"
        :href="route('admin.posts.index')"
        :class="{ active: isUrl('admin.posts.*') }"
        class="item"
    >
        <ph-newspaper-clipping-light />
        <span>{{ tt('models.table_list.posts') }}</span>
    </Link>
    <Link
        v-if="can('admin.services.index')"
        :href="route('admin.services.index')"
        :class="{ active: isUrl('admin.services.*') }"
        class="item"
    >
        <ph-newspaper-clipping-light />
        <span>{{ tt('models.table_list.services') }}</span>
    </Link>
    <Link
        v-if="can('admin.orders.index')"
        :href="route('admin.orders.index')"
        :class="{ active: isUrl('admin.orders.*') }"
        class="item"
    >
        <mdi:order-bool-ascending-variant />
        <span>{{ tt('models.table_list.orders') }}</span>
        <span class="badge badge-danger" v-if="newOrder">{{ newOrder }}</span>
    </Link>
    <Link
        v-if="can('admin.contacts.index')"
        :href="route('admin.contacts.index')"
        :class="{ active: isUrl('admin.contacts.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span>{{ tt('models.table_list.contacts') }}</span>
        <span class="badge badge-danger" v-if="newContact">{{ newContact }}</span>
    </Link>
    <Link
        v-if="can('admin.customers.index')"
        :href="route('admin.customers.index')"
        :class="{ active: isUrl('admin.customers.*') }"
        class="item"
    >
        <ri:user-shared-line />
        <span>{{ tt('models.table_list.customers') }}</span>
    </Link>
    <Link
        v-if="can('admin.sliders.index')"
        :href="route('admin.sliders.index')"
        :class="{ active: isUrl('admin.sliders.*') }"
        class="item"
    >
        <bi:sliders2 />
        <span>{{ tt('models.table_list.sliders') }}</span>
    </Link>
    <Link
        v-if="can('admin.policies.index')"
        :href="route('admin.policies.index')"
        :class="{ active: isUrl('admin.policies.*') }"
        class="item"
    >
        <material-symbols:policy-outline-sharp />
        <span>{{ tt('models.table_list.policies') }}</span>
    </Link>
</template>

<script>
export default {
    computed: {
        newContact() {
            return this.$page.props.data.new_contact_count
        },
        newApply() {
            return this.$page.props.data.new_apply_count
        },
        newOrder() {
            return this.$page.props.data.new_order_count
        },
    },
}
</script>
<style scoped>
.badge {
    @apply px-2 py-1 text-xs font-medium rounded;
}
.badge-success {
    @apply text-green-700 bg-green-200;
}
.badge-danger {
    @apply text-red-600 bg-red-200;
}
</style>

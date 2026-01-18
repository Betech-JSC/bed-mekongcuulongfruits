<template layout>
    <Form v-model="formData">
        <template #default="{ form }">
            <div class="card">
                <div class="flex justify-between">
                    <div class="card-header">{{ tt('models.setting.general_information') }}</div>
                    <Link
                        class="p-button btn-primary"
                        :text="tt('models.table.create')"
                        :href="route('admin.products.form')"
                    />
                </div>
                <div class="card-body">
                    <Field
                        v-model="form.title"
                        :field="{
                            type: 'text',
                            name: 'title',
                            label: 'Tiêu đề',
                        }"
                    />
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <Field
                        v-model="form.categories"
                        :field="{
                            type: 'select_multiple',
                            name: 'categories',
                            keyBy: 'id',
                            labelBy: 'title',
                            label: 'Danh mục',
                            source: {
                                model: 'App\\Models\\Product\\ProductCategory',
                                method: 'getNested',
                            },
                        }"
                    />
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <Field
                        v-model="form.description"
                        :field="{
                            type: 'textarea',
                            name: 'description',
                            label: 'Mô tả',
                        }"
                    />

                    <Field
                        v-model="form.content"
                        :field="{
                            type: 'richtext',
                            name: 'content',
                            label: 'Tổng quan',
                        }"
                    />
                    <Field
                        v-model="form.harvest_season"
                        :field="{
                            type: 'richtext',
                            name: 'harvest_season',
                            label: 'Mùa vụ',
                        }"
                    />
                    <Field
                        v-model="form.product_process"
                        :field="{
                            type: 'richtext',
                            name: 'product_process',
                            label: 'Quy trình sản xuất',
                        }"
                    />
                </div>
            </div>
            <SeoFields :modelValue="form" @update:modelValue="form = $event" />
        </template>
        <template #aside="{ form }">
            <div class="card">
                <div class="card-body">
                    <Field
                        v-model="form.status"
                        :field="{
                            type: 'radio_list',
                            name: 'status',
                            label: 'Trạng thái',
                            options: schema.columns.status.list,
                        }"
                    />
                    <Field
                        v-model="form.is_featured"
                        :field="{
                            type: 'checkbox',
                            name: 'is_featured',
                            label: 'Nổi bật',
                        }"
                    />

                    <Field
                        v-model="form.view_count"
                        :disabled="true"
                        :field="{
                            type: 'number',
                            name: 'view_count',
                            label: 'Lượt xem',
                        }"
                    />
                    <Field
                        v-model="form.position"
                        :field="{
                            type: 'number',
                            name: 'position',
                            label: 'Thứ tự sắp xếp',
                        }"
                    />
                    <Field
                        v-model="form.image"
                        :field="{
                            type: 'file_upload',
                            name: 'image',
                            label: 'Hình ảnh đại diện',
                            multiple: false,
                        }"
                    />
                    <Field
                        v-model="form.images_overviews"
                        :field="{
                            type: 'file_upload',
                            name: 'images_overviews',
                            label: 'Hình ảnh tổng quan',
                            multiple: true,
                        }"
                    />

                    <Field
                        v-model="form.images_product_process"
                        :field="{
                            type: 'file_upload',
                            name: 'images_product_process',
                            label: 'Hình ảnh quy trình sản xuất',
                            multiple: true,
                        }"
                    />
                    <Field
                        v-model="form.images_package_specification"
                        :field="{
                            type: 'file_upload',
                            name: 'images_package_specification',
                            label: 'Hình ảnh bao bì và quy cách đóng gói',
                            multiple: true,
                        }"
                    />
                    <Field
                        v-model="form.images_preservation_methods"
                        :field="{
                            type: 'file_upload',
                            name: 'images_preservation_methods',
                            label: 'Hình ảnh phương pháp bảo quản',
                            multiple: true,
                        }"
                    />
                    <Field
                        v-model="form.related_products"
                        :field="{
                            type: 'select_multiple',
                            name: 'related_products',
                            label: 'Sản phẩm liên quan',
                            labelBy: 'title',
                            source: {
                                model: 'App\\Models\\Product\\Product',
                                method: 'get',
                                only: ['id', 'title'],
                            },
                        }"
                    />
                </div>
            </div>
        </template>
    </Form>
</template>
<script>
export default {
    props: ['item', 'schema'],
    computed: {
        currentResource() {
            return this.config.resource ?? this.getResource()
        },
        formUrl() {
            return this.config.formUrl ?? this.route(`admin.${this.currentResource}.form`)
        },
    },
    data() {
        return {
            categories: [],
            selectedKey: null,
            formData: {
                ...this.item,
                images: this.item.images ?? [],
                status: this.item.status ?? 'ACTIVE',
                view_count: this.item.view_count ?? 0,
                price: this.item.price ?? 0,
                old_price: this.item.old_price ?? 0,
                sale_price: this.item.sale_price ?? 0,

                images_overviews: this.item.images_overviews ?? [],
                images_product_process: this.item.images_product_process ?? [],
                images_package_specification: this.item.images_package_specification ?? [],
                images_preservation_methods: this.item.images_preservation_methods ?? [],
            },
        }
    },

    watch: {
        item() {
            this.formData = {
                ...this.item,
                status: this.item.status ?? 'ACTIVE',
                view_count: this.item.view_count ?? 0,
            }
        },
    },

    methods: {
        onNodeSelect(node) {
            this.$toast.add({ severity: 'success', summary: 'Node Selected', detail: node.label, life: 3000 })
        },
        onNodeUnselect(node) {
            this.$toast.add({ severity: 'success', summary: 'Node Unselected', detail: node.label, life: 3000 })
        },
        getCategories() {
            const locale = this.getCurrentLocale()
            this.$axios
                .post(this.route(`admin.helper.model-data`, { locale }), {
                    model: 'App\\Models\\Product\\ProductCategory',
                    method: 'getNested',
                })
                .then((res) => {
                    this.categories = res.data
                })
        },
    },
}
</script>




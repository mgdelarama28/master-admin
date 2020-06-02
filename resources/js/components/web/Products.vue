<template>
    <div class="row">
        <div class="col-md-3 d-flex" v-for="product in this.products" :key="product.id">
            <div class="product">
                <div class="img d-flex align-items-center justify-content-center" :style="{ backgroundImage: `url(/storage/${product.image_path})` }">
                    <div class="desc">
                        <p class="meta-prod d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center" @click.prevent="addToCart(product.id)"><span class="flaticon-shopping-bag"></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                            <a :href="`/products/${product.id}`" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                        </p>
                    </div>
                </div>
                
                <div class="text text-center">
                    <span class="category">{{ product.category.name }}</span>
                    <h2>{{ product.name }}</h2>
                    <span class="price">${{ product.price }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../EventBus';

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: {
            products: Array,
        },

        methods: {
            addToCart(id) {
                axios.post('/api/v1/cart_item/' + id).then((res) => {
                    EventBus.$emit('update-cart');
                    Swal.fire(
                        'Added to cart!',
                        'This item has been added to your cart.',
                        'success'
                    );
                }).catch((err) => {
                    console.log(err);
                });
            },
        },
    }
</script>

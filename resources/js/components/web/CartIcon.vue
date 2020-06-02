<template>
    <div class="order-lg-last btn-group">
        <a href="/shopping-cart" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="flaticon-shopping-bag"></span>
            <div class="d-flex justify-content-center align-items-center"><small>{{ cart.cart_items.length }}</small></div>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-item d-flex align-items-start" href="#" v-for="cartItem in cart.cart_items" :key="cartItem.id">
                <div class="img" :style="{ backgroundImage: `url(/storage/${cartItem.product.image_path})` }"></div>
                <div class="text pl-3">
                    <h4>{{ cartItem.product.name }}</h4>
                    <p class="mb-0"><a href="#" class="price">${{ cartItem.product.price }}</a><span class="quantity ml-3">Quantity: {{ cartItem.quantity }}</span></p>
                </div>
            </div>

            <a class="dropdown-item text-center btn-link d-block w-100" href="/shopping-cart" v-if="cart.cart_items.length > 0">
                View All
                <span class="ion-ios-arrow-round-forward"></span>
            </a>

            <p class="dropdown-item text-center btn-link d-block w-100 mb-0" v-else>Your cart is empty.</p>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../EventBus';

    export default {
        mounted() {
            this.fetchCart();
            EventBus.$on('update-cart', this.fetchCart);
        },

        data() {
            return {
                cart: {
                    cart_items: [],
                },
            }
        },

        methods: {
            fetchCart() {
                axios.get('/api/v1/cart').then((res) => {
                    this.cart = res.data.cart;
                }).catch((err) => {
                    console.log(err);
                });
            }
        }
    }
</script>

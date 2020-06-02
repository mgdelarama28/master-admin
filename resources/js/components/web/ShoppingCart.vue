<template>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="table-wrap" v-if="cart.cart_items.length > 0">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>&nbsp;</th>
						    </tr>
                        </thead>
                          
                        <tbody>
						    <tr class="alert" role="alert" v-for="cartItem in cart.cart_items" :key="cartItem.id">
						    	<td>
						    		<div class="img" :style="{ backgroundImage: `url(/storage/${cartItem.product.image_path})` }"></div>
						    	</td>
                              
                                <td>
                                    <div class="email">
                                        <span>{{ cartItem.product.name }}</span>
                                        <span>{{ cartItem.product.description || 'No description written.' }}</span>
                                    </div>
                                </td>

						        <td>${{ cartItem.product.price }}</td>
                              
                                <td class="quantity">
                                        <div class="input-group">
                                        <input type="number" name="quantity" class="form-control text-center" id="quantity" :value="cartItem.quantity" min="1" max="100" @change="updateCartItemQuantity(cartItem.id)">
                                    </div>
                                </td>
                              
                                <td>${{ cartItem.total }}</td>
        
                                <td>
                                    <button type="button" class="btn btn-danger" aria-label="Close" @click.prevent="removeCartItem(cartItem.id)">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
				        	    </td>
						    </tr>
                        </tbody>
                    </table>
                   
                </div>
                 
                <div class="col-md-12 text-center" v-else>
                    <h1>There are no items in your cart.</h1>
                </div>
            </div>
            
    		<div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap">
    				<div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>${{ cart.subtotal }}</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$0.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>${{ cart.total }}</span>
    					</p>
                    </div>
                    
    				<p class="text-center" v-if="cart.cart_items.length > 0"><a href="/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
    	</div>
    </section>
</template>

<script>
    import EventBus from '../../EventBus';

    export default {
        mounted() {
            this.fetchCart();
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
            },

            updateCartItemQuantity(id) {
                let quantity = document.querySelector('#quantity').value;

                axios.post(`/api/v1/cart_item/${id}/update`, {
                    quantity: quantity,
                }).then((res) => {
                    EventBus.$emit('update-cart');
                    this.fetchCart();
                }).catch((err) => {
                    console.log(err);
                });
            },

            removeCartItem(id) {
                Swal.fire({
                    title: 'Remove item from cart?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it!'
                }).then((result) => {
                if (result.value) {
                    axios.delete(`/api/v1/cart_item/${id}`).then((res) => {
                        EventBus.$emit('update-cart');
                        this.fetchCart();
                    }).catch((err) => {
                        console.log(err);
                    });

                    Swal.fire(
                        'Removed from cart!',
                        'This item has been removed from your cart.',
                        'success'
                        )
                    }
                });
            }
        }
    }
</script>

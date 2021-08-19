if (window.performance) {
    "{{ App\Classes\Session::remove('errors') }}";
    addCartCount();
}
// Add Cart
function addCart(id) {
    let ary = JSON.parse(localStorage.getItem('cart'));
    if (ary == null) {
        let saveCart = [id];
        localStorage.setItem('cart', JSON.stringify(saveCart));
        toastAlret('success', 'add to cart');
    } else {
        let checkExist = ary.indexOf(id);
        if (checkExist == -1) {
            ary.push(id);
            localStorage.setItem('cart', JSON.stringify(ary));
            toastAlret('success', 'add to cart');
        } else {
            toastAlret('info', 'already add cart');
        }
    }
    $('#cart_count').html(getCartAry().length)
}

// insert cart count to navbar if start page reload
function addCartCount() {
    let count = JSON.parse(localStorage.getItem('cart')) != null ? getCartAry().length : 0;
    $('#cart_count').html(count);
}

// Get Cart From Local Storeage
function getCartAry() {
    return JSON.parse(localStorage.getItem('cart'));
}
// Clear Cart From Local Storeage
function clearCartAry() {
    localStorage.removeItem('cart');
    $('#cart_count').html('0');
}

// Remove Item Count
function removeItemCount(id){
    let carts = getCartAry();
    carts.forEach(cart=>{
        if(cart == id){
            let index = carts.indexOf(id);
            carts.splice(index,1);
        }
    });
    localStorage.setItem('cart',JSON.stringify(carts));
    addCartCount();
    fetchCartData();
}

// document.addEventListener('DOMContentLoaded', function() {
//     const addToCartButtons = document.querySelectorAll('.add-to-cart');

//     addToCartButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const name = this.getAttribute('data-name');
//             const price = this.getAttribute('data-price');

//             addToCart(name, price);
//         });
//     });

//     function addToCart(name, price) {
//         const cartItem = `
//             <div class="cart-item">
//                 <span>${name}</span>
//                 <span>${price}</span>
//                 <input type="number" value="1" min="1" class="quantity">
//             </div>
//         `;
//         document.getElementById('cart').insertAdjacentHTML('beforeend', cartItem);
//     }

//     // Show modal when the cart button is clicked
//     document.getElementById('cartButton').addEventListener('click', function() {
//         const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
//         cartModal.show();
//     });
// });

// document.addEventListener('DOMContentLoaded', function() {
//     const addToCartButtons = document.querySelectorAll('.add-to-cart');

//     addToCartButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             // Find the parent element that contains the product details
//             const productContainer = this.closest('.card-body');

//             // Extract the name and price from the product container
//             const name = productContainer.querySelector('.card-title').innerText;
//             const price = productContainer.querySelector('.card-text').innerText.replace('Price: ', '');

//             addToCart(name, price);
//         });
//     });

//     function addToCart(name, price) {
//         const cartItem = `
//             <div class="cart-item">
//                 <span>${name}</span>
//                 <span>${price}</span>
//                 <input type="number" value="1" min="1" class="quantity">
//             </div>
//         `;
//         document.getElementById('cartButton').insertAdjacentHTML('beforeend', cartItem);
//     }

//     // Show modal when the cart button is clicked
//     document.getElementById('cartButton').addEventListener('click', function() {
//         const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
//         cartModal.show();
//     });
// });


// document.addEventListener('DOMContentLoaded', function() {
//     const addToCartButtons = document.querySelectorAll('.add-to-cart');

//     addToCartButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             // Find the parent element that contains the product details
//             const productContainer = this.closest('.card-body');

//             // Extract the name and price from the product container
//             const name = productContainer.querySelector('.card-title').innerText;
//             const price = productContainer.querySelector('.card_price').innerText.replace('Price: ', '');

//             addToCartModal(name, price);
//         });
//     });

//     function addToCartModal(name, price) {
//         const cartItem = `
//             <div class="cart-item">
//                 <span>${name}</span>
//                 <span>${price}</span>
//                 <input type="number" value="1" min="1" class="quantity">
//             </div>
//         `;
//         document.getElementById('cart').insertAdjacentHTML('beforeend', cartItem);
//     }

//     // Show modal when the cart button is clicked
//     document.getElementById('cartButton').addEventListener('click', function() {
//         const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
//         cartModal.show();
//     });
// });

// document.addEventListener('DOMContentLoaded', function() {
//     const addToCartButtons = document.querySelectorAll('.add-to-cart');

//     addToCartButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             // Find the parent element that contains the product details
//             const productContainer = this.closest('.card-body');

//             // Extract the name and price from the product container
//             const name = productContainer.querySelector('.card-title').innerText;
//             const price = productContainer.querySelector('.card_price').innerText.replace('Price: ', '');

//             addToCartModal(name, price);
//         });
//     });

//     function addToCartModal(name, price) {
//         const cartItem = `
//         <div class container-fluid >
//             <div class="cart-item my-2 row">
//                 <span class="col-md-3">${name}</span>
//                 <span class="col-md-3">${price}</span>
//                 <input type="number" value="1" min="1" class="quantity col-md-3 ">
//                 <button class="btn btn-outline-danger col-md-3 ml-1 btn-remove">Remove</button>
//             </div>
//             </div>
//         `;
//         document.getElementById('cart').insertAdjacentHTML('beforeend', cartItem);

//         // Add event listener to the remove button
//         const removeButtons = document.querySelectorAll('.btn-remove');
//         removeButtons.forEach(button => {
//             button.addEventListener('click', function() {
//                 this.closest('.cart-item').remove();
//             });
//         });
//     }

//     // Show modal when the cart button is clicked
//     document.getElementById('cartButton').addEventListener('click', function() {
//         const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
//         cartModal.show();
//     });
// });


document.addEventListener('DOMContentLoaded', function() {
  const addToCartButtons = document.querySelectorAll('.add-to-cart');

  addToCartButtons.forEach(button => {
      button.addEventListener('click', function() {
          // Find the parent element that contains the product details
          const productContainer = this.closest('.card-body');

          // Extract the name and price from the product container
          const name = productContainer.querySelector('.card-title').innerText;
          const price = productContainer.querySelector('.card_price').innerText.replace('Price: ', '');

          addToCartModal(name, price);
      });
  });
// <span class="total col-md-2">${price}</span>
  function addToCartModal(name, price) {
      const cartItem = `
      <div class container-fluid >
          <div class="cart-item my-2 row">
              <span class="col-md-3">${name}</span>
              <span class=" total col-md-3">${price}</span>
              <input type="number" value="1" min="1" class="quantity col-md-3">
              
              <button class="btn btn-outline-danger col-md-3 ml-1 btn-remove">Remove</button>
          </div>
      </div>
      `;
      document.getElementById('cart').insertAdjacentHTML('beforeend', cartItem);

      // Add event listener to the remove button
      const removeButtons = document.querySelectorAll('.btn-remove');
      removeButtons.forEach(button => {
          button.addEventListener('click', function() {
              this.closest('.cart-item').remove();
              updateTotalPrice(); // Update total price when an item is removed
          });
      });

      // Add event listener to the quantity input
      const quantityInputs = document.querySelectorAll('.quantity');
      quantityInputs.forEach(input => {
          input.addEventListener('input', function() {
              updateTotalPrice(); // Update total price when quantity changes
          });
      });

      // Calculate and update the total price
      function updateTotalPrice() {
          let totalPrice = 0;
          document.querySelectorAll('.cart-item').forEach(item => {
              const itemPrice = parseFloat(item.querySelector('.total').innerText.replace('$', ''));
              const quantity = parseInt(item.querySelector('.quantity').value);
              totalPrice += itemPrice * quantity;
          });
          document.getElementById('totalPrice').innerText = `Total Price: $${totalPrice.toFixed(2)}`;
      }
  }

  // Show modal when the cart button is clicked
  document.getElementById('cartButton').addEventListener('click', function() {
      const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
      cartModal.show();
  });
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    iconColor: 'white',
    customClass: {
      popup: 'colored-toast',
    },
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
  })


/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00;
var fadeTime = 300;


/* Assign actions */



/* Recalculate cart */
function recalculateCart() {
  var subtotal = 0;

  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });

  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;

  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function () {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if (total == 0) {
      $('.checkout').fadeOut(fadeTime);
    } else {
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}


/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function () {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });
}


/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function () {
    productRow.remove();
    recalculateCart();
  });
}


function mostrarProductos() {
  const productos = JSON.parse(localStorage.getItem('productos')) || [];
  let table = '';
  let suma = 0;
  if (productos.length === 0) {
    table = '<p>No hay productos en el carrito.</p>';
  } else {
    productos.forEach((prod, index) => {
      suma += Number(prod.subtotal);
      table += `
      <div class="product">
        <div class="product-image">
          <img src="../../controlador/${prod.imagen}">
        </div>
        <div class="product-details">
          <div class="product-title">${prod.nombre}</div>
          <div class="product-title">${prod.descripcion}</div>
        </div>
        <div class="product-price">${prod.precio}</div>
        <div class="product-quantity">
          <input type="number" value="${prod.cantidad}" min="1" data-index="${index}">
        </div>
        <div class="product-removal">
          <button class="remove-product" data-index="${index}">
            X
          </button>
        </div>
        <div class="product-line-price">${prod.subtotal}</div>
      </div>

        `;
    });

  }

  $('#carrito').on('change', '.product-quantity input', function () {
    const index = $(this).data('index');
    const prod = JSON.parse(localStorage.getItem('productos')) || [];
    const nuevaCantidad = Number($(this).val());

    const precio = Number(prod[index].precio);
    const subtotal = nuevaCantidad * precio;

    // Actualiza el producto en el array y en localStorage
    prod[index].cantidad = nuevaCantidad;
    prod[index].subtotal = subtotal;
    localStorage.setItem('productos', JSON.stringify(prod));

    // Actualiza el subtotal mostrado
    $(this).closest('.product').find('.product-line-price').text(subtotal);
    suma = prod.reduce((acc, prod) => acc + Number(prod.subtotal), 0);
    $('#cart-total').text(suma);
  });

  $('#carrito').on('click', '.product-removal button', function () {
    const index = $(this).data('index');
    const prod = JSON.parse(localStorage.getItem('productos')) || [];

    // Elimina el producto del array
    prod.splice(index, 1);
    localStorage.setItem('productos', JSON.stringify(prod));

    // Vuelve a mostrar los productos
    mostrarProductos();
  });

  // Suponiendo que tienes un elemento con el ID 'carrito'
  document.getElementById('carrito').innerHTML = table;
  document.getElementById('cart-total').innerHTML = suma;

}

// Llamar a mostrarProductos cuando se cargue la página
window.onload = function () {
  mostrarProductos();
};



function confirmarPedido() {
  const productos = JSON.parse(localStorage.getItem('productos')) || [];

  if (productos.length < 1) {
    return;
  }
  
  Swal.fire({
      title: '¿Estas seguro de realizar el pedido?',
      showCancelButton: true,
      confirmButtonText: 'Si',
      cancelButtonText: 'No',
  }).then((result) => {
      if (result.isConfirmed) {
          
          const data = {
            total:  $('#cart-total').text(),
            productos: productos,
            operacion: "Crear"
          }

          $.post('../../controlador/pedido.controlador.php', data, function (respuesta) {
            let res = JSON.parse(respuesta)
            Swal.fire({
              title: res[1],
              icon: res[0],
              confirmButtonText: "Continuar",
              allowOutsideClick: false,  // Evita que se cierre al hacer clic fuera del cuadro de diálogo
              allowEscapeKey: false      // Evita que se cierre al presionar la tecla Esc
            }).then((r => {
              let prod = '';
              productos.forEach(element => {
                prod += `*${element.cantidad} ${element.nombre} = $${element.subtotal}* %0D%0A`;
              });

              window.open(`https://api.whatsapp.com/send/?phone=573144432212&text=Hola CalzaShop %0D%0A%0D%0ATengo el siguiente pedido: %0D%0A${prod} %0D%0A *TOTAL: $${$('#cart-total').text()}* %0D%0A%0D%0ASe puede verificar en el siguiente enlace:  %0D%0Ahttp://localhost/calzashop/Vista/general/verificar_pedido.php?orden=${res[2]} &type=phone_number&app_absent=0`, '_blank');
                localStorage.removeItem('productos');
                mostrarProductos();
            }));

          });
      }
  });
}

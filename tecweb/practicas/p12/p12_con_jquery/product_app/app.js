document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchForm').addEventListener('submit', buscarProducto);
    document.getElementById('addProductForm').addEventListener('submit', agregarProducto);
    document.getElementById('search').addEventListener('input', buscarProducto);
    document.getElementById('deleteProductForm').deleteEventListener('submit',eliminarProducto);
  
    init();
  });
  
  // JSON BASE A MOSTRAR EN FORMULARIO
  var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };
  
  function init() {
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
  
    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
  }
  
  $(document).ready(function() {
    function listarProductos() {
      $.ajax({
        url: './backend/product-list.php',
        method: 'GET',
        dataType: 'json',
        success: function (productos) {
          if (productos.length > 0) {
            let template = '';
  
            productos.forEach(producto => {
              if (producto.eliminado == 0) {
                let descripcion = `
                  <li>precio: ${producto.precio}</li>
                  <li>unidades: ${producto.unidades}</li>
                  <li>modelo: ${producto.modelo}</li>
                  <li>marca: ${producto.marca}</li>
                  <li>detalles: ${producto.detalles}</li>
                `;
  
                template += `
                  <tr productId="${producto.id}">
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td><ul>${descripcion}</ul></td>
                    <td>
                      <button class="product-delete btn btn-danger" onclick="confirmarEliminacion(${producto.id})">
                        Eliminar
                      </button>
                    </td>
                  </tr>
                `;
              }
            });
  
            $('#products').html(template);
          }
        }
      });
    }
  
    function buscarProducto(e) {
      e.preventDefault();
      var search = $('#search').val();
  
      $.ajax({
        url: './backend/product-search.php',
        method: 'GET',
        data: { search: search },
        dataType: 'json',
        success: function (productos) {
          if (productos.length > 0) {
            let template = '';
            let template_bar = '';
  
            productos.forEach(producto => {
              if (producto.eliminado == 0) {
                let descripcion = `
                  <li>precio: ${producto.precio}</li>
                  <li>unidades: ${producto.unidades}</li>
                  <li>modelo: ${producto.modelo}</li>
                  <li>marca: ${producto.marca}</li>
                  <li>detalles: ${producto.detalles}</li>
                `;
  
                template += `
                  <tr productId="${producto.id}">
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td><ul>${descripcion}</ul></td>
                    <td>
                      <button class="product-delete btn btn-danger" onclick="confirmarEliminacion(${producto.id})">
                        Eliminar
                      </button>
                    </td>
                  </tr>
                `;
  
                template_bar += `
                  <li>${producto.nombre}</li>
                `;
              }
            });
  
            $('#product-result').addClass('d-block');
            $('#container').html(template_bar);
            $('#products').html(template);
          }
        }
      });
    }
  
    function agregarProducto(e) {
      e.preventDefault();
  
      var productoJsonString = $('#description').val();
      var finalJSON = JSON.parse(productoJsonString);
      finalJSON['nombre'] = $('#name').val();
      productoJsonString = JSON.stringify(finalJSON);
  
      $.ajax({
        url: './backend/product-add.php',
        method: 'POST',
        contentType: 'application/json;charset=UTF-8',
        data: productoJsonString,
        dataType: 'json',
        success: function (respuesta) {
          let template_bar = `
            <li style="list-style: none;">status: ${respuesta.status}</li>
            <li style="list-style: none;">message: ${respuesta.message}</li>
          `;
  
          $('#product-result').addClass('d-block');
          $('#container').html(template_bar);
  
          listarProductos();
        }
      });
    }
  
    function confirmarEliminacion(id) {
      if (confirm("De verdad deseas eliminar el Producto?")) {
        eliminarProducto(id);
      }
    }

// FUNCIÓN CALLBACK DE BOTÓN "Eliminar"
function eliminarProducto(event) {
  // Evitar la acción por defecto del botón
  event.preventDefault();
  
  // Ventana de confirmación
  if (confirm("¿De verdad deseas eliminar el Producto?")) {
    // Obtener el ID del producto
    var id = $(event.target).closest('tr').attr("productId");

    // Realizar la solicitud AJAX
    $.ajax({
      url: './backend/product-delete.php',
      method: 'GET',
      data: { id: id },
      dataType: 'json',
      success: function(respuesta) {
        console.log(respuesta); // Mostrar la respuesta en la consola

        // Crear una plantilla para mostrar el resultado
        let template_bar = `
          <li style="list-style: none;">status: ${respuesta.status}</li>
          <li style="list-style: none;">message: ${respuesta.message}</li>
        `;

        // Hacer visible la barra de estado
        $('#product-result').addClass('d-block');
        $('#container').html(template_bar);

        // Listar todos los productos nuevamente
        listarProductos();
      },
      error: function(xhr, status, error) {
        console.error("Error en la eliminación del producto:", error);
      }
    });
  }
}

  
  
    // Asignar funciones a eventos
    $('#searchForm').submit(buscarProducto);
    $('#addProductForm').submit(agregarProducto);
  
    // Cargar productos al inicio
    listarProductos();
  });
  
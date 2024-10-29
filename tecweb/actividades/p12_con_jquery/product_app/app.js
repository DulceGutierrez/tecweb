// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

$(document).ready(function(){
    let edit = false;

    let JsonString = JSON.stringify(baseJSON,null,2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                const productos = JSON.parse(response);
            
                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if(Object.keys(productos).length > 0) {
                    // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';

                    productos.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    $('#products').html(template);
                }
            }
        });
    }

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                        const productos = JSON.parse(response);
                        
                        // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                        if(Object.keys(productos).length > 0) {
                            // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
                                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                            
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;

                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            // SE HACE VISIBLE LA BARRA DE ESTADO
                            $('#product-result').show();
                            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                            $('#container').html(template_bar);
                            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });

    /*$('#product-form').submit(e => {
        e.preventDefault();

        // SE CONVIERTE EL JSON DE STRING A OBJETO
        let postData = JSON.parse( $('#description').val() );
        // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
        postData['nombre'] = $('#name').val();
        postData['id'] = $('#productId').val();

        /**
         * AQUÍ DEBES AGREGAR LAS VALIDACIONES DE LOS DATOS EN EL JSON
         * --> EN CASO DE NO HABER ERRORES, SE ENVIAR EL PRODUCTO A AGREGAR
         **__________________/

        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        
        $.post(url, postData, (response) => {
            //console.log(response);
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let respuesta = JSON.parse(response);
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;
            // SE REINICIA EL FORMULARIO
            $('#name').val('');
            $('#description').val(JsonString);
            // SE HACE VISIBLE LA BARRA DE ESTADO
            $('#product-result').show();
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            $('#container').html(template_bar);
            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();
            // SE REGRESA LA BANDERA DE EDICIÓN A false
            edit = false;
        });
    });*/


    $('#product-form').submit(e => {
        e.preventDefault();
    
        // SE CONVIERTE EL JSON DE STRING A OBJETO
        let postData = JSON.parse($('#description').val());
        // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
        postData['nombre'] = $('#name').val();
        postData['id'] = $('#productId').val();
    
        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        
        $.post(url, postData, (response) => {
            let respuesta = JSON.parse(response);
            
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            if (respuesta.status === 'success') {
                template_bar += `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;
                // SE HACE VISIBLE LA BARRA DE ESTADO
                $('#product-result').show();
            } else {
                template_bar += `
                    <li style="list-style: none;">status: error</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;
                // SE HACE VISIBLE LA BARRA DE ESTADO
                $('#product-result').show();
            }
    
            // SE REINICIA EL FORMULARIO
            $('#name').val('');
            $('#description').val(JsonString);
            
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            $('#container').html(template_bar);
            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();
            // SE REGRESA LA BANDERA DE EDICIÓN A false
            edit = false;
        });
    });
    
    




    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', {id}, (response) => {
            // SE CONVIERTE A OBJETO EL JSON OBTENIDO
            let product = JSON.parse(response);
            // SE INSERTAN LOS DATOS ESPECIALES EN LOS CAMPOS CORRESPONDIENTES
            $('#name').val(product.nombre);
            // EL ID SE INSERTA EN UN CAMPO OCULTO PARA USARLO DESPUÉS PARA LA ACTUALIZACIÓN
            $('#productId').val(product.id);
            // SE ELIMINA nombre, eliminado E id PARA PODER MOSTRAR EL JSON EN EL <textarea>
            delete(product.nombre);
            delete(product.eliminado);
            delete(product.id);
            // SE CONVIERTE EL OBJETO JSON EN STRING
            let JsonString = JSON.stringify(product,null,2);
            // SE MUESTRA STRING EN EL <textarea>
            $('#description').val(JsonString);
            
            // SE PONE LA BANDERA DE EDICIÓN EN true
            edit = true;
        });
        e.preventDefault();
    });    

    





    $('#productName').keyup(function() {
        const name = $(this).val();
        if (name.length > 2) {
          $.ajax({
            url: '/backend/check_product_name.php', // URL del script PHP que verifica el nombre
            type: 'POST',
            data: { productName: name },
            success: function(response) {
              if (response.exists) {
                $('#nameStatus').text('El nombre ya existe.').css('color', 'red');
              } else {
                $('#nameStatus').text('Nombre disponible.').css('color', 'white');
              }
            },
            error: function() {
              $('#nameStatus').text('Error en la validación.').css('color', 'red');
            }
          });
        } else {
          $('#nameStatus').text(''); // Limpiar el mensaje si el nombre es muy corto
        }
      });






    function validateField(fieldId, statusId, validationFn) {
        $(fieldId).blur(function() {
          if (validationFn($(this).val())) {
            $(statusId).text('Válido').css('color', 'yellow');
          } else {
            $(statusId).text('Inválido').css('color', 'red');
          }
        });
      }
    
      function isNotEmpty(value) {
        return value.trim() !== '';
      }
    
      function isAlphanumeric(value) {
        return /^[a-z0-9]+$/i.test(value);
      }
    
      function isNumber(value) {
        return !isNaN(value) && value.trim() !== '';
      }
    
      function isValidPrice(value) {
        return isNumber(value) && parseFloat(value) > 99.99;
      }
    
      function isValidUnits(value) {
        return isNumber(value) && parseInt(value) >= 0;
      }
    
      function isValidImagePath(value) {
        return value.trim() === '' || value.trim().match(/\.(jpeg|jpg|gif|png)$/) != null;
      }
    
      function validateProductName(value) {
        return isNotEmpty(value) && value.length <= 100;
      }
    
      function validateProductModel(value) {
        return isNotEmpty(value) && isAlphanumeric(value) && value.length <= 25;
      }
    
      function validateProductBrand(value) {
        return isNotEmpty(value);
      }
    
      validateField('#productName', '#nameStatus', validateProductName);
      validateField('#productDescription', '#descriptionStatus', function(value) {
        return value.length <= 250; // Optional field
      });
      validateField('#productPrice', '#priceStatus', isValidPrice);
      validateField('#productUnits', '#unitsStatus', isValidUnits);
      validateField('#productModel', '#modelStatus', validateProductModel);
      validateField('#productBrand', '#brandStatus', validateProductBrand);
      validateField('#productDetails', '#detailsStatus', function(value) {
        return value.length <= 250; // Optional field
      });
      validateField('#productImage', '#imageStatus', isValidImagePath);
    
      $('#addProductBtn').click(function() {
        let valid = true;
        $('#productForm textarea, #productForm select').each(function() {
          if (!isNotEmpty($(this).val())) {
            valid = false;
          }
        });
        if (valid) {
          $('#globalStatus').text('Formulario válido. Enviando datos...').css('color', 'yellow');
          // Aquí puedes hacer la llamada AJAX para enviar los datos
        } else {
          $('#globalStatus').text('Por favor, completa todos los campos.').css('color', 'red');
        }
      });
    
      $('#productName').keyup(function() {
        const name = $(this).val();
        if (name.length > 2) {
          $.ajax({
            url: 'check_product_name.php',
            type: 'POST',
            data: { productName: name },
            success: function(response) {
              if (response.exists) {
                $('#nameStatus').text('El nombre ya existe.').css('color', 'red');
              } else {
                $('#nameStatus').text('Nombre disponible.').css('color', 'yellow');
              }
            }
          });
        }
      });

});
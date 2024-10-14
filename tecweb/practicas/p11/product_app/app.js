// Función para buscar productos por término de búsqueda
function buscarProducto(event) {
    event.preventDefault();
    const searchInput = document.getElementById('searchInput').value;

    const formData = new FormData();
    formData.append('search', searchInput);

    fetch('backend/read.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const productosContainer = document.getElementById('productos');
        productosContainer.innerHTML = ''; // Limpiar resultados anteriores

        if (data.length > 0) {
            data.forEach(product => {
                const row = document.createElement('tr');

                const idCell = document.createElement('td');
                idCell.textContent = product.id;
                row.appendChild(idCell);

                const nameCell = document.createElement('td');
                nameCell.textContent = product.nombre;
                row.appendChild(nameCell);

                const descCell = document.createElement('td');
                const descList = document.createElement('ul');

                const precioItem = document.createElement('li');
                precioItem.textContent = `Precio: ${product.precio}`;
                descList.appendChild(precioItem);

                const unidadesItem = document.createElement('li');
                unidadesItem.textContent = `Unidades: ${product.unidades}`;
                descList.appendChild(unidadesItem);

                const modeloItem = document.createElement('li');
                modeloItem.textContent = `Modelo: ${product.modelo}`;
                descList.appendChild(modeloItem);

                const marcaItem = document.createElement('li');
                marcaItem.textContent = `Marca: ${product.marca}`;
                descList.appendChild(marcaItem);

                const detallesItem = document.createElement('li');
                detallesItem.textContent = `Detalles: ${product.detalles}`;
                descList.appendChild(detallesItem);

                descCell.appendChild(descList);
                row.appendChild(descCell);

                const imageCell = document.createElement('td');
                const img = document.createElement('img');
                img.src = product.imagen;
                img.alt = product.nombre;
                img.style.width = '50px';
                img.style.height = '50px';
                imageCell.appendChild(img);
                row.appendChild(imageCell);

                productosContainer.appendChild(row);
            });
        } else {
            productosContainer.innerHTML = '<tr><td colspan="4">No se encontraron productos.</td></tr>';
        }
    })
    .catch(error => console.error('Error:', error));
}

// Función para buscar productos por ID
function buscarID(event) {
    event.preventDefault();
    const searchInput = document.getElementById('search').value;

    const formData = new FormData();
    formData.append('id', searchInput);

    fetch('backend/read.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const productosContainer = document.getElementById('productos');
        productosContainer.innerHTML = ''; // Limpiar resultados anteriores

        if (data.length > 0) {
            data.forEach(product => {
                const row = document.createElement('tr');

                const idCell = document.createElement('td');
                idCell.textContent = product.id;
                row.appendChild(idCell);

                const nameCell = document.createElement('td');
                nameCell.textContent = product.nombre;
                row.appendChild(nameCell);

                const descCell = document.createElement('td');
                const descList = document.createElement('ul');

                const precioItem = document.createElement('li');
                precioItem.textContent = `Precio: ${product.precio}`;
                descList.appendChild(precioItem);

                const unidadesItem = document.createElement('li');
                unidadesItem.textContent = `Unidades: ${product.unidades}`;
                descList.appendChild(unidadesItem);

                const modeloItem = document.createElement('li');
                modeloItem.textContent = `Modelo: ${product.modelo}`;
                descList.appendChild(modeloItem);

                const marcaItem = document.createElement('li');
                marcaItem.textContent = `Marca: ${product.marca}`;
                descList.appendChild(marcaItem);

                const detallesItem = document.createElement('li');
                detallesItem.textContent = `Detalles: ${product.detalles}`;
                descList.appendChild(detallesItem);

                descCell.appendChild(descList);
                row.appendChild(descCell);

                const imageCell = document.createElement('td');
                const img = document.createElement('img');
                img.src = product.imagen;
                img.alt = product.nombre;
                img.style.width = '50px';
                img.style.height = '50px';
                imageCell.appendChild(img);
                row.appendChild(imageCell);

                productosContainer.appendChild(row);
            });
        } else {
            productosContainer.innerHTML = '<tr><td colspan="4">No se encontraron productos.</td></tr>';
        }
    })
    .catch(error => console.error('Error:', error));
}

function agregarProducto(event) {
    event.preventDefault();

    const nombre = document.getElementById('name').value;
    const jsonData = document.getElementById('description').value;

    // Validación de los datos
    if (!nombre || !jsonData) {
        alert("Por favor, completa todos los campos.");
        return;
    }

    // Intentamos convertir el JSON a objeto
    let producto;
    try {
        producto = JSON.parse(jsonData);
    } catch (e) {
        alert("El JSON de producto es inválido.");
        return;
    }

    // Validar que el objeto contenga las propiedades requeridas
    if (!producto.precio || !producto.unidades || !producto.modelo || !producto.marca || !producto.detalles) {
        alert("El JSON debe contener precio, unidades, modelo, marca y detalles.");
        return;
    }

    // Preparar los datos para enviar
    const formData = new FormData();
    formData.append('producto', JSON.stringify({ nombre, ...producto }));

    fetch('backend/create.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Producto agregado exitosamente.");
        } else {
            alert("Error al agregar el producto: " + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

// Event listeners para los botones de búsqueda
document.getElementById('searchButton').addEventListener('click', buscarProducto);
document.querySelector('form[onsubmit="buscarID(event)"]').addEventListener('submit', buscarID);
document.getElementById('task-form').addEventListener('submit', agregarProducto);
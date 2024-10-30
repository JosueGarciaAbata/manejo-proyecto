Para crear un diseño con Bootstrap en el que haya dos imágenes por fila, y debajo (o al pasar el mouse sobre ellas) se muestre un título y descripción, puedes aprovechar el sistema de rejilla (`grid`) y las utilidades de Bootstrap. Aquí tienes dos enfoques: uno con texto visible siempre debajo de la imagen y otro con texto visible solo al pasar el mouse.

### Enfoque 1: Texto Siempre Visible Debajo de la Imagen
En este diseño, el título y la descripción están siempre visibles bajo la imagen.

```html
<div class="container">
  <div class="row">
    <!-- Columna 1 -->
    <div class="col-sm-6 mb-4">
      <div class="card">
        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
        <div class="card-body text-center">
          <h5 class="card-title">Título 1</h5>
          <p class="card-text">Descripción breve de la imagen 1.</p>
        </div>
      </div>
    </div>

    <!-- Columna 2 -->
    <div class="col-sm-6 mb-4">
      <div class="card">
        <img src="imagen2.jpg" class="card-img-top" alt="Imagen 2">
        <div class="card-body text-center">
          <h5 class="card-title">Título 2</h5>
          <p class="card-text">Descripción breve de la imagen 2.</p>
        </div>
      </div>
    </div>
  </div>
</div>
```

### Explicación
- **`col-sm-6`**: Configura dos columnas en cada fila para pantallas pequeñas o mayores.
- **`card` y `card-body`**: Las clases de tarjeta de Bootstrap ayudan a estructurar el contenido (imagen, título y descripción).
- **`card-img-top`**: Coloca la imagen en la parte superior.
- **`text-center`**: Centra el texto del título y descripción.

### Enfoque 2: Texto Visible Solo al Pasar el Mouse
Para hacer que el título y la descripción solo sean visibles al pasar el mouse sobre la imagen, puedes usar un `overlay` (superposición) con algo de CSS personalizado.

```html
<div class="container">
  <div class="row">
    <!-- Columna 1 -->
    <div class="col-sm-6 mb-4">
      <div class="position-relative">
        <img src="imagen1.jpg" class="img-fluid" alt="Imagen 1">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
          <h5 class="text-white">Título 1</h5>
          <p class="text-white">Descripción breve de la imagen 1.</p>
        </div>
      </div>
    </div>

    <!-- Columna 2 -->
    <div class="col-sm-6 mb-4">
      <div class="position-relative">
        <img src="imagen2.jpg" class="img-fluid" alt="Imagen 2">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
          <h5 class="text-white">Título 2</h5>
          <p class="text-white">Descripción breve de la imagen 2.</p>
        </div>
      </div>
    </div>
  </div>
</div>
```

```css
/* CSS para ocultar la superposición por defecto y mostrarla al pasar el mouse */
.overlay {
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.position-relative:hover .overlay {
    opacity: 1;
}
```

### Explicación
- **`position-relative`**: La imagen principal es el contenedor relativo para la superposición.
- **`overlay`**: Este div ocupa toda el área de la imagen y contiene el título y la descripción, que están centrados vertical y horizontalmente.
- **`opacity`**: Se usa para que la superposición sea visible solo al pasar el mouse.
- **`transition`**: La transición suaviza la aparición del texto. 

Estos enfoques te permiten implementar el diseño deseado usando Bootstrap y un poco de CSS adicional para la superposición.
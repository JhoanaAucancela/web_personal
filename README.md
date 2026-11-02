# Web personal - Semana 1

**Asignatura:** Aplicaciones Web
**Estudiante:** Jhoana Aucancela
**Carrera:** Ingeniería en Software - Universidad Uniandes

## Objetivo

Aplicar los conocimientos adquiridos sobre la instalación de dependencias y comprender la sintaxis básica y el manejo de variables, creando una página web personal con **HTML** y **CSS** que incluye una **calculadora en PHP**.

## Contenido

| Página | Descripción | Tecnología |
|---|---|---|
| `index.php` | Menú principal con acceso al CV y a la calculadora | PHP, HTML, CSS |
| `cv.html` | Currículum con información personal, estudios, experiencia, conocimientos técnicos y contacto | HTML, CSS |
| `calculadora.php` | Calculadora que procesa las operaciones en el servidor | PHP, HTML, CSS |

## Estructura del proyecto

```
Semana 1/
├── index.php          # Menú principal
├── cv.html            # Currículum vitae
├── calculadora.php    # Calculadora en PHP
├── style.css          # Estilos de todo el sitio
├── foto.jpg           # Foto de perfil
└── README.md
```

## Funcionalidades

### Menú (`index.php`)
- Los datos del menú (nombre, tarea y opciones) se guardan en **variables** y en un **arreglo** de PHP.
- Las tarjetas se generan con un ciclo `foreach`.
- El año del pie de página se obtiene con `date("Y")`.

### CV (`cv.html`)
- Encabezado con foto, nombre, ocupación y ubicación.
- Secciones de perfil profesional, estudios, experiencia, conocimientos técnicos y contacto.
- Efectos *hover* en la foto, las secciones, las listas y las etiquetas.
- Diseño *responsive* que se adapta a celulares.

### Calculadora (`calculadora.php`)
- Seis operaciones: suma (+), resta (−), multiplicación (×), división (÷), potencia (^) y módulo (%).
- Los datos se envían por formulario con el método `POST`.
- Se usa un `switch` para elegir la operación.
- Validaciones:
  - Que se ingresen números válidos (`is_numeric`).
  - Que no se divida ni se saque el módulo con 0.
- Historial de las últimas 5 operaciones, guardado en la sesión (`$_SESSION`), con un botón para limpiarlo.

## Tecnologías utilizadas

- **HTML5**: estructura de las páginas
- **CSS3**: estilos, variables de color, Flexbox, Grid, transiciones, animaciones y *media queries*
- **PHP 8**: lógica de la calculadora y del menú
- **Git y GitHub**: control de versiones

## Cómo ejecutar el proyecto

1. Instalar PHP. En Windows:
   ```powershell
   winget install PHP.PHP.8.3
   ```
2. Clonar el repositorio:
   ```bash
   git clone https://github.com/JhoanaAucancela/cv.git
   cd cv
   ```
3. Iniciar el servidor de PHP:
   ```bash
   php -S localhost:8000
   ```
4. Abrir en el navegador: [http://localhost:8000](http://localhost:8000)

> **Nota:** el archivo `cv.html` se puede abrir directamente en el navegador, pero `index.php` y `calculadora.php` necesitan un servidor con PHP para funcionar.

## Autora

**Jhoana Aucancela**
GitHub: [@JhoanaAucancela](https://github.com/JhoanaAucancela)

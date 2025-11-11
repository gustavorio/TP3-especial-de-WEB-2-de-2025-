# API-RESTful
# TP especial de WEB 2 de 2025
Este repositorio para entregas de web 2° de tp especial obligatorios para aprobar la materia

# Integrantes:

Gustavo Nahuel Rio| ( riogustavo2001@gmail.com)

# Temática:
La idea de este sistema surge con el propósito de crear una herramienta de adquisición y organización para una tienda de videojuegos, incorporando como mascota y logotipo al **Ciber Dragón**. El sistema busca ofrecer a los usuarios la posibilidad de encontrar y adquirir títulos de manera ordenada, ya sea por género, empresa desarrolladora o consola, garantizando así mayor comodidad y accesibilidad. Además, se pretende brindar una amplia variedad de opciones que se adapten a distintos gustos, manteniendo siempre una presentación clara y atractiva. Finalmente, el uso del Ciber Dragón como símbolo otorga un toque original.

# DER:
![Image text](https://github.com/gustavorio/TP-especial-de-WEB-2-de-2025/blob/main/SQL%20de%20ciber%20dragon.png)

# Breve explicación:
El sitio actualmente funciona en modo de vista previa. Esto significa que los usuarios pueden visualizar los datos disponibles, pero no tienen la posibilidad de modificarlos, agregarlos ni eliminarlos. Además, se ha habilitado una cuenta de acceso para pruebas, utilizando el nombre de usuario **“webadmin”** y la contraseña **“admin”**, con el fin de demostrar el funcionamiento básico del sistema.

# Explicación:
Esta API es un complemento para la página del siguiente repositorio:
https://github.com/gustavorio/TP-especial-de-WEB-2-de-2025

En dicha página podemos administrar distintos videojuegos y sus desarrolladores. Por medio de esta API es posible realizar reseñas sobre los videojuegos, así como listar y modificar las que ya existen.

Para utilizarla lo primero que debemos hacer es descargar el XAMPP en nuestra computadora. Luego bajamos este repositorio y lo ubicamos en la carpeta "C:\xampp\htdocs" (usualmente la dirección es esta, pero quizá podría variar dependiendo de cómo se realizó la instalación o el SO que se esté utilizando). Finalmente, abrimos XAMPP y activamos los módulos de Apache y MySQL. Hecho esto ya podemos interactuar con la API por medio de los endpoints listados más abajo. La DB es creada automaticamente en caso de no existir, y es rellenada con algunos datos para facilitar su testeo.

A continuación se listan los distintos endpoints disponibles:

1. (GET) http://localhost/API-RESTful/api/reviews
2. (GET) http://localhost/API-RESTful/api/reviews/:ID
3. (GET) http://localhost/API-RESTful/api/reviews/:ID/:subrecurso
4. (POST) http://localhost/API-RESTful/api/reviews
5. (PUT) http://localhost/API-RESTful/api/reviews/:ID
6. (DELETE) http://localhost/API-RESTful/api/reviews/:ID
7. (GET) http://localhost/API-RESTful/api/users/token

Para utilizar el endpoint 3, los subrecursos disponibles son:

1. descripcion
2. puntuacion
3. usuario
4. juego

Para utilizar los endpoints de POST, PUT y DELETE primero necesitamos un token que nos permita realizar dichas operaciones. Para obtener dicho token utilizamos el endpoint 7 con el siguiente header:

"Authorization": "Basic d2ViYWRtaW46YWRtaW4="

("d2ViYWRtaW46YWRtaW4=" es "user:pass" codificado en base 64, donde este "user" y "pass" son un usuario y contraseña existentes en la base de datos. El usuario por defecto es "webadmin" y la contraseña "admin", y con estos datos se obtuvo el código "d2ViYWRtaW46YWRtaW4=").
Luego, cuando queramos hacer un POST/PUT/DELETE debemos utilizar el siguiente header:

"Authorization": "Bearer (token)"

El endpoint 1 también nos permite filtrar y ordenar los resultados obtenidos. Para filtrar utilizamos endpoints como los siguientes:

http://localhost/API-RESTful/api/reviews?puntuacion=4

http://localhost/API-RESTful/api/reviews?usuario=webadmin

Por último, para ordenar los elementos utilizamos:

http://localhost/API-RESTful/api/reviews?sort=puntuacion&order=desc

Los filtros y el orden se pueden combinar:

http://localhost/API-RESTful/api/reviews?sort=puntuacion&order=desc&puntuacion=4

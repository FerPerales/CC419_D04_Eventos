<h1>Repositorio del proyecto final de la mat
<h2>Registro de eventos en linea</h2>

<p>Se encuentra la problemática de tener control de los eventos registrados para una comunidad tecnológica de trabajo colaborativo, llamado Hacker Garage.</p>

<p>Todos los eventos registrados en el sistema deben poder ser consultados por medio de un canal de RSS, para poder ser agregado en un lector de RSS y otros sistemas de automatizado.</p>

<p>Cualquier persona al ingresar al sitio podrá ver por medio de un calendario -con distintas vistas que son por fechas, precio y categorias- los eventos registrados, y sobre todo, tendrá acceso a un botón permanente en todas las vistas para dar de alta eventos.</p>

<p>Si un usuario da clic en ese botón, por medio del sistema de login de Twitter podrá registrar un evento a realizarse dentro de las instalaciones del Hacker Garage y automáticamente será agregado a la base de datos del sistema.</p>

<p>Igualmente, cualquier usuario loggeado por medio de Disqus podrá agregar comentarios a los eventos registrados.</p>

<p>Un usuario que previamente ha registrado eventos (es decir que ya esta registrado en la base de datos) tendrá de manera permanente un botón con acceso a su cuenta, donde podrá listar sus eventos clasificados por aquellos que ya han sido aceptados por los administradores, aquellos que han sido rechazados, así como aquellos que están pendientes de evaluación. Las acciones a realizar con estos eventos será edición y eliminación.</p>

<p>El administrador (el cual es dado de alta directamente en la base de datos) podrá aceptar eventos, cancelarlos -si lo desea, agregará mensaje del motivo-, y editarlos.</p>

<p>Tanto el usuario registrado como el administrador podrán obtener archivos con listados de eventos, o eventos individuales en formatos XLS y/o PDF.</p>

<p>Datos a guardar de los eventos:<p>

<ul>
<li>Nombre del evento</li>
<li>Flyer (imágen en cualquier formato con ancho de 500px sin importar el alto)</li>
<li>Texto libre (puede incluir tags html)</li>
<li>Precio</li>
<li>Capacidad (la cual puede ser una cantidad y debe aceptar ilimitada como una capacidad)</li>
<li>Categoria (curso/taller, conferencia, convivencia) pero el administrador por medio de una sección de administración debe poder dar de alta mas categorías.</li>
<li>Quien agrega el evento (que es la imágen del usuario en twitter y su arroba)</li>
<li>Fecha del evento (la cual solo puede ser una fecha superior a la fecha en que se crea el evento)</li>
<li>Fecha de creación (la cual no se muestra cuando el evento se publica, pero sirve al administrador para situaciones de BI).</li>
</ul>
<p>Plugins y configuraciones extras serán tomadas en cuenta para mejoras en calificación:</p>

<ul>
<li>Rewrite en Apache para la url de los eventos con el id del evento, title del evento y su fecha</li>
<li>Manejar distintos colores a las categorías de eventos en la vista de calendario</li>
<li>Crear la conexión de MySQL hacia la librería de calendario como un WebService</li>
<li>Utilizar diseños responsivos</li>
<li>Notas de programación</li>
</ul>

<p>El manejo de las vistas de calendario se hace por medio de una librería de jQuery
Para conectar esa librería con los datos de la base de datos se hace por medio de JSON</p>
<p>Para el manejo de comentarios se utiliza el recurso Disqus</p>

<hr/>
<h2>Integrantes</h2>
<ul>
  <li>Antonio Gauregui - http://github.com/hawreghi</li>
	<li>Manuel Meza - http://github.com/slifer-x</li>
	<li>Fernando Perales - http://github.com/ferperales</li>
	<li>Zahib Valenzuela - http://github.com/zahib</li>
</ul>
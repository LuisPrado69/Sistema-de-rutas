 <style>

    /*------Stard by Ayudadeblogger.com--------*/

    #menu, #menu ul {

    margin: 0;

    padding: 0;

    list-style: none;

    }

    #menu {

    width: 960px;

    margin: 60px auto;

    border: 1px solid #222;

    background-color: #111;

    background-image: -moz-linear-gradient(#444, #111);

    background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111));

    background-image: -webkit-linear-gradient(#444, #111);

    background-image: -o-linear-gradient(#444, #111);

    background-image: -ms-linear-gradient(#444, #111);

    background-image: linear-gradient(#444, #111);

    -moz-border-radius: 6px;

    -webkit-border-radius: 6px;

    border-radius: 6px;

    -moz-box-shadow: 0 1px 1px #777;

    -webkit-box-shadow: 0 1px 1px #777;

    box-shadow: 0 1px 1px #777;

    }

    #menu:before,

    #menu:after {

    content: "";

    display: table;

    }

    #menu:after {

    clear: both;

    }

    #menu {

    zoom:1;

    }

    #menu li {

    float: left;

    border-right: 1px solid #222;

    -moz-box-shadow: 1px 0 0 #444;

    -webkit-box-shadow: 1px 0 0 #444;

    box-shadow: 1px 0 0 #444;

    position: relative;

    }

    #menu a {

    float: left;

    padding: 12px 30px;

    color: #999;

    text-transform: uppercase;

    font: bold 12px Arial, Helvetica;

    text-decoration: none;

    text-shadow: 0 1px 0 #000;

    }

    #menu li:hover > a {

    color: #fafafa;

    }

    *html #menu li a:hover { /* IE6 only */

    color: #fafafa;

    }

    #menu ul {

    margin: 20px 0 0 0;

    _margin: 0; /*IE6 only*/

    opacity: 0;

    visibility: hidden;

    position: absolute;

    top: 38px;

    left: 0;

    z-index: 9999;

    background: #444;

    background: -moz-linear-gradient(#444, #111);

    background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #111),color-stop(1, #444));

    background: -webkit-linear-gradient(#444, #111);

    background: -o-linear-gradient(#444, #111);

    background: -ms-linear-gradient(#444, #111);

    background: linear-gradient(#444, #111);

    -moz-box-shadow: 0 -1px rgba(255,255,255,.3);

    -webkit-box-shadow: 0 -1px 0 rgba(255,255,255,.3);

    box-shadow: 0 -1px 0 rgba(255,255,255,.3);

    -moz-border-radius: 3px;

    -webkit-border-radius: 3px;

    border-radius: 3px;

    -webkit-transition: all .2s ease-in-out;

    -moz-transition: all .2s ease-in-out;

    -ms-transition: all .2s ease-in-out;

    -o-transition: all .2s ease-in-out;

    transition: all .2s ease-in-out;

    }

    #menu li:hover > ul {

    opacity: 1;

    visibility: visible;

    margin: 0;

    }

    #menu ul ul {

    top: 0;

    left: 150px;

    margin: 0 0 0 20px;

    _margin: 0; /*IE6 only*/

    -moz-box-shadow: -1px 0 0 rgba(255,255,255,.3);

    -webkit-box-shadow: -1px 0 0 rgba(255,255,255,.3);

    box-shadow: -1px 0 0 rgba(255,255,255,.3);

    }

    #menu ul li {

    float: none;

    display: block;

    border: 0;

    _line-height: 0; /*IE6 only*/

    -moz-box-shadow: 0 1px 0 #111, 0 2px 0 #666;

    -webkit-box-shadow: 0 1px 0 #111, 0 2px 0 #666;

    box-shadow: 0 1px 0 #111, 0 2px 0 #666;

    }

    #menu ul li:last-child {

    -moz-box-shadow: none;

    -webkit-box-shadow: none;

    box-shadow: none;

    }

    #menu ul a {

    padding: 10px;

    width: 130px;

    _height: 10px; /*IE6 only*/

    display: block;

    white-space: nowrap;

    float: none;

    text-transform: none;

    }

    #menu ul a:hover {

    background-color: #B40404;

    background-image: -moz-linear-gradient(#B40404, #B40404);

    background-image: -webkit-gradient(linear, left top, left bottom, from(#B40404), to(#B40404));

    background-image: -webkit-linear-gradient(#B40404, #B40404);

    background-image: -o-linear-gradient(#B40404, #B40404);

    background-image: -ms-linear-gradient(#B40404, #B40404);

    background-image: linear-gradient(#B40404, #B40404);

    }

    #menu ul li:first-child > a {

    -moz-border-radius: 3px 3px 0 0;

    -webkit-border-radius: 3px 3px 0 0;

    border-radius: 3px 3px 0 0;

    }

    #menu ul li:first-child > a:after {

    content: '';

    position: absolute;

    left: 40px;

    top: -6px;

    border-left: 6px solid transparent;

    border-right: 6px solid transparent;

    border-bottom: 6px solid #444;

    }

    #menu ul ul li:first-child a:after {

    left: -6px;

    top: 50%;

    margin-top: -6px;

    border-left: 0;

    border-bottom: 6px solid transparent;

    border-top: 6px solid transparent;

    border-right: 6px solid #3b3b3b;

    }

    #menu ul li:first-child a:hover:after {

    border-bottom-color: #B40404;

    }

    #menu ul ul li:first-child a:hover:after {

    border-right-color: #B40404;

    border-bottom-color: transparent;

    }

    #menu ul li:last-child > a {

    -moz-border-radius: 0 0 3px 3px;

    -webkit-border-radius: 0 0 3px 3px;

    border-radius: 0 0 3px 3px;

    }


    </style>


    <ul id="menu">
    	<li><a href="#">Inicio</a>
    </li>
    <li>
    	<a href="#">Rutas</a>
	    <ul>
	    	<li><a href="#">Optima</a></li>
	    	<li><a href="#">Origen Destino</a></li>
	    </ul>
    </li>
    <li><a href="#">Chat</a>
	    <ul>
		    <li><a href="#">Contactos</a></li>
	    </ul>
    </li>
    <li><a href="#">Mantenimientos</a>
	    <ul>
	    	<li><a href="#">Estado</a></li>
	    	<li><a href="#">Roles</a></li>
	    </ul>
    </li>
	
	<li><a href="#">Usuarios</a>
	    <ul>
		    <li><a href="#">Listado</a></li>
		    <li><a href="#">Control</a></li>
	    </ul>
	</li>
	<li><a href="#">Ubicacion</a>
	    <ul>
		    <li><a href="#">Registro</a></li>
		    <li><a href="#">Listado</a></li>
	    </ul>
    </li>
    <li><a href="#">Cerrar Session</a></li>
    </ul>
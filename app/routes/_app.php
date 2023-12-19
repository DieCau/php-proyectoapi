<?php

app()->get('/', function () {
    response()->json(['message' => 'Hola Diego, cómo estas?']);
});

// Muestra en la ruta '/contactos' el metodo index() del archivo ContactosController - GET
app()->get('/contactos', 'ContactosController@index');


// Muestra en la ruta '/contactos/{id}' el metodo consultar() del archivo ContactosController - GET(id)
app()->get('/contactos/{id}', 'ContactosController@consultar');

// Agrega un contacto - POST
app()->post('/contactos', 'ContactosController@agregar');

// Actualiza un contacto - PUT(id)
app()->put('/contactos/{id}', 'ContactosController@actualizar');

// Borra un contacto - DELETE(id)
app()->delete('/contactos/{id}', 'ContactosController@borrar');

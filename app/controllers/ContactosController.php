<?php

// Nombre del espacio 'controllers'
namespace App\Controllers;

// Accede a la clase Contactos del modelo Contactos
use App\Models\Contactos;


class ContactosController extends Controller {

    // Este método accede a TODOS (all()) los registros de la Tabla Contactos y los guarda en $datosContactos
    // GET
    public function index() {
        $datosContactos= Contactos::all();
        response()->json($datosContactos);
    }

    // Método para CONSULTAR un registro con ID unico
    // GET (ID)
    public function consultar($id) {
        $datosContactos= Contactos::find($id);
        response()->json($datosContactos);
    }

    // Método para AGREGAR un Nuevo Contacto
    //  POST
    public function agregar() {
        $contacto= new Contactos;

        $contacto->id= app()->request()->get('id');
        $contacto->nombre= app()->request()->get('nombre');
        $contacto->apellido= app()->request()->get('apellido');
        $contacto->correo= app()->request()->get('correo');
        // Grabar la información
        $contacto->save();
        response()->json(['message' => 'Registro agregado']);
    }

    // Método para ACTUALIZAR un registro con ID unico
    // PUT
    public function actualizar($id) {

        $id= app()->request()->get('id');
        $nombre= app()->request()->get('nombre');
        $apellido= app()->request()->get('apellido');
        $correo= app()->request()->get('correo');

        $contacto= Contactos::findOrFail($id);

        $contacto->id= ($id!='') ? $id : $contacto->id;
        $contacto->nombre= ($nombre!='') ? $nombre : $contacto->nombre;
        $contacto->apellido= ($apellido!='') ? $apellido : $contacto->apellido;
        $contacto->correo= ($correo!='') ? $correo : $contacto->correo;


        $contacto->update();

        response()->json(['message' => 'Registro actualizado: '.$id]);
    }

    // Método para BORRAR un registro con ID unico
    // DELETE
    public function borrar($id) {
        Contactos::destroy($id);
        response()->json(['message' => 'Registro eliminado ID: '.$id]);
    }
}

<?php
namespace App\Http\Controllers;


use App\Models\PictureUrl;
use Illuminate\Http\Request;

/**
 * Clase que contiene funciones para gestionar las imágenes
 */
class PictureUrlController extends Controller
{

    /**
     * Obtiene todas las imágenes de la base de datos con su usuario asignado
     * 
     * @return \Inertia\Response
     */
    public function index()
    {
        $pictures = PictureUrl::with('user')->latest()->get();

        return inertia('Pictures/Home', [
            'pictures' => $pictures
        ]);
    }


    /**
     * Muestra el formulario para crea una nueva imagen     
     *  
     * @return \Inertia\Response
     */
    public function create()
    {
        return inertia('Pictures/Create');
    }


    /**
     * Almacena una nueva imagen en la base de datos.  
     *
     * @param Request $request Datos del formulario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Valida datos | restricciones
        $request->validate([
            'picture_url' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        //Crea la imagen asociada al usuario.
        auth()->user()->pictures()->create($request->only([
            'picture_url',
            'title',
            'description'
        ]));
        //Redirije al inicio
        return redirect()->route('pictures.index');
    }


    /**
     * Devuelve la vista con los datos de una imagen
     * 
     * @param PictureUrl $picture Instancia de la imagen solicitada
     * @return \Inertia\Response
     */
    public function show(PictureUrl $picture)
    {
        return inertia('Pictures/Show', [
            'picture' => $picture->load('user'),
            'pictures' => PictureUrl::with('user')->get()
        ]);
    }

    /**
     * Muestra el formulario de edición
     * 
     * @param PictureUrl $picture Instancia de la imagen a editar
     * @return \Inertia\Response
     */
    public function edit(PictureUrl $picture)
    {
        return inertia('Pictures/Edit', ['picture' => $picture]);
    }


    /**
     * Valida y actualiza los datos de la imagen
     * 
     * @param Request $request Nuevos datos del formulario
     * @param PictureUrl $picture Instancia de la imagen a actualizar
     * @return \Illuminate\Http\RedirectResponse Redirección al listado principal
     */
    public function update(Request $request, PictureUrl $picture)
    {

        $request->validate([
            'picture_url' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $picture->update($request->only([
            'picture_url',
            'title',
            'description'
        ]));

        return redirect()->route('pictures.index');
    }

    /**
     * Elimina una imagen de la base de datos
     * 
     * @param PictureUrl $picture Instancia de la imagen a eliminar
     * @return \Illuminate\Http\RedirectResponse Redirección al listado principal
     */
    public function destroy(PictureUrl $picture)
    {
        $picture->delete();
        return redirect()->route('pictures.index');
    }


    /**
     * Muestra el listado de imagenes en la sección pública de la web
     * @return \Inertia\Response
     */
    public function publicIndex()
    {
        $pictures = PictureUrl::with('user')->get();
        return inertia('Pictures/Home', [
            'pictures' => $pictures
        ]);
    }
}

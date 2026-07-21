<?php
namespace App\Http\Controllers;


use App\Models\PictureUrl;
use Illuminate\Http\Request;

/**
 * Summary of PictureUrlController
 * Clase contenedora de funciones para controlar las imágenes
 */
class PictureUrlController extends Controller
{

    /**
     * index
     * Retorna la lista de imágenes
     * @return \Inertia\Response
     */
    public function index()
    {
        // Obtiene TODAS las imágenes de la BBDD con su usuario asignado
        $pictures = PictureUrl::with('user')->latest()->get();

        return inertia('Pictures/Home', [
            'pictures' => $pictures
        ]);
    }

    /**
     * create
     * Retorna la vista del formulario vacío para
     * insertar una imagen nueva
     * @return \Inertia\Response
     */
    public function create()
    {
        //Retorna la vista SIN DATOS
        return inertia('Pictures/Create');
    }


    /**
     * Summary of store
     * Valida y almacena la imagen
     * @param Request $request
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
     * Summary of show
     * Retorna la vista con los datos de una imagen 
     * @param PictureUrl $picture
     * @return \Inertia\Response
     */
    public function show(PictureUrl $picture)
    {
        //Retorna la vista con los datos de UNA IMAGEN
        return inertia('Pictures/Show', [
            'picture' => $picture->load('user'),
            'pictures' => PictureUrl::with('user')->get()
        ]);
    }

    /**
     * Summary of edit
     * Retorna la vista del formulario para 
     * editar los datos de una imagen
     * @param PictureUrl $picture
     * @return \Inertia\Response
     */
    public function edit(PictureUrl $picture)
    {
        return inertia('Pictures/Edit', ['picture' => $picture]);
    }


    /**
     * Summary of update
     * Valida y actualiza los datos de la imagen
     * @param Request $request
     * @param PictureUrl $picture
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PictureUrl $picture)
    {
        //Valida datos | restricciones
        $request->validate([
            'picture_url' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        //Cambia la imagen asociada al usuario.
        $picture->update($request->only([
            'picture_url',
            'title',
            'description'
        ]));
        //Redirije al inicio
        return redirect()->route('pictures.index');
    }

    /**
     * Summary of destroy
     * Elimina una imagen y sus datos
     * @param PictureUrl $picture
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PictureUrl $picture)
    {
        $picture->delete();
        return redirect()->route('pictures.index');
    }

    public function publicIndex()
    {
        $pictures = PictureUrl::with('user')->get();
        return inertia('Pictures/Home', [
            'pictures' => $pictures
        ]);
    }
}

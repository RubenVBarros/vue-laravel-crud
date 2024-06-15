<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Articles[]|Collection
     */
    public function index()
    {
        return Articles::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $article = new Articles([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'categorie' => $request->input('categorie'),
            'image_url' => $request->input('image_url')
        ]);
        $article->save();
        return response()->json('Article crée !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $article = Articles::find($id);
        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $article = Articles::find($id);
        $article->update($request->all());
        return response()->json('Article mis a jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();
        return response()->json('Article supprimé !');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Article;
use App\Image;
use App\Http\Requests\ArticleRequest;

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles= Article::Search($request->name)->orderBy('id','ASC')->paginate(4);

        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });

        return view('admin.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::orderBy('name','ASC')->get();
        $tags= Tag::orderBy('name','ASC')->get();
        return view('admin.articles.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        // Guardar y cambiar nombre de la imagen
        if ($request->file('image1')) {

            $file= $request->file('image1');
            $name= 'blog'.time().'.'. $request->image1->extension();
            $path= public_path().'/img/articles';
            $file->move($path,$name);
        }

        $article= new Article($request->all());
        $article->user_id= Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        $image= new Image();
        $image->name= $name;
        $image->article()->associate($article);
        $image->save();
        
        flash('El artículo "'.$article->title.'" se ha creado exitosamente')->success();
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $article->category;
        $categories= Category::orderBy('id','ASC')->get();
        $tags= Tag::orderBy('id','ASC')->get();

        $tags_array= $article->tags;

        $disponibles= $tags->diff($tags_array);
        //dd($disponibles);

        return view('admin.articles.edit')->with('article',$article)
                                            ->with('categories',$categories)
                                            ->with('tags',$tags)
                                            ->with('tags_array',$tags_array)
                                            ->with('disponibles',$disponibles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);

        flash('Se ha editado el articulo "'.$article->title.'" exitosamente.');
        return redirect()->route('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article= Article::find($id);
        $article->delete();

        flash('El artículo "'.$article->title.'" se ha eliminado exitosamente.')->warning();
        return redirect()->route('articles.index');
    }
}



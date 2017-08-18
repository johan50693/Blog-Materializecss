<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;

use Illuminate\Http\Request;

class FrontController extends Controller
{

	public function __construct(){
		Carbon::setLocale('es');
	}

	public function index(){

		$articles= Article::orderBy('id','DESC')->get()->take(4);
		
		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		});

		return view('front.index')->with('articles',$articles);
	}

	public function searchCategory($name){

		$category= Category::SearchCategory($name)->first();
		$articles= $category->articles->take(4);

		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		});

		return view('front.index')->with('articles',$articles);
		
	}

	public function searchTag($name){
		$tag= Tag::SearchTag($name)->first();
		$articles= $tag->articles->take(4);
		
		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		});

		return view('front.index')->with('articles',$articles);
	}

	public function viewArticle($slug){
		$article= Article::findBySlugOrFail($slug);

		$article->category;
		$article->user;
		$article->images;
		$article->tags;
		
		return view('front.article')->with('article',$article);
	}
}

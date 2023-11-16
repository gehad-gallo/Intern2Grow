<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;

class ArticleController extends Controller
{
    function getAllArticles($id){

    	$user = User::find($id);

    	if ($user) {

    		$articles = $user->articles()->get();

    		$articleData = [];

            foreach ($articles as $article) {
                $articleData[] = [
                    'title' => $article->title,
                    'content' => $article->content,
                ];
            }

            return response()->json([
                'user' => $user->name,
                'articles' => $articleData,
            ]);

    	}else{
    		return response()->json(['message','user not found']);
    	}
    }


    function updateArticle(Request $request, $user_id ,$article_id){

    	$user = User::find($user_id);

    	if ($user) {
    		$article = Article::find($article_id);
    		if (!$article) {
    			return response()->json(['message','Article Not Found']);
    		}

    		//Validate comming data
    		$request->validate([
	            'title' => 'required',
	            'content' => 'required',
	            'user_id' => 'required',
       		]);

       		//upddate data
    		$article->update($request->all());
    		return response()->json(['message','Article upddated successfully']);
    	
    	}else{
    		return response()->json(['message','user Not Found']);
    	}


	}

	function storeNewArticle(Request $request){

		try {
        // validate data 
	        $article = $request->validate([
	            'title' => 'required',
	            'content' => 'required',
	            'user_id' => 'required',
	        ]);

	        Article::create([
	            'title' => $article['title'],
	            'content' => $article['content'],
	            'user_id' => $article['user_id'],
	        ]);

	        return response()->json(['message' => 'Article added successfully']);

	    } catch (ValidationException $e) {
	        
	        return response()->json(['message' => 'Error', 'errors' => $e->errors()], 422);
	    }

	}

    function deleteArticle(Request $request, $id){
       
  
        $article = Article::find($id);
        
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        $article->delete();
        return response()->json(['message' => 'Article Deleted successfully']);
           
    }
}
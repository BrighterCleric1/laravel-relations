<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Comment;
use App\Mail\EmailTrial;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $authors = Author::all();
        return view('articles.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* if (array_key_exists('contentComment', $request->request->parameters)) {
            $request->validate([
                'user' => 'required | string',
                'contentComment' => 'required | string',
            ]);
        } else {
            $request->validate([
                'title' => 'required | string | unique:articles',
                'subtitle' => 'required | string | unique:articles',
                'image' => 'required | string',
                'author_id' => 'required | string',
                'published_at' => 'required | date_format:"Y-m-d H:i:s"',
                'content' => 'required'
            ]);
        }*/

        $request->validate([
            'title' => 'required | string | unique:articles',
            'subtitle' => 'required | string | unique:articles',
            'image' => 'required | string',
            'author_id' => 'required | string',
            'published_at' => 'required | date_format:"Y-m-d H:i:s"',
            'content' => 'required'
        ]);

        $data = $request->all();

        $newArticle = new Article();
        $newArticle->title = $data['title'];
        $newArticle->subtitle = $data['subtitle'];
        $newArticle->image = $data['image'];
        $newArticle->published_at = $data['published_at'];
        $newArticle->content = $data['content'];
        $newArticle->author_id = $data['author_id'];
        $newArticle->save();

        Mail::to('info@test.it')->send(new EmailTrial());

        if (array_key_exists('tags', $data)) {

            foreach ($data['tags'] as $tagId) {
                $newArticle->tag()->attach($tagId);
            }
        }
        return redirect()->route('articles.show', $newArticle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $articles = Article::find($id);

        /*  $data = $request->all();

        $newComment = new Comment();
        $newComment->user = $data['user'];
        $newComment->contentComment = $data['contentComment'];
        $newComment->save();
        */

        $comments = Comment::find($id);

        return view('articles.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        if ($request->ajax()){
            $comment = Comment::create($request->all());
            if ($comment){
                return response()->json($comment, 200);
            } else {
                return response()->json(['success' => false, 'errors' => $request->errors()], 422);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function show(){

        $todo_items = Todo::latest()->get();
        return view('todo', [
            'todo_items'=>$todo_items]);
    }

    public function save(Request $request){
        $request->validate([
            'body'=>'required|string|max:140']);
        //after validation we create the todo list item

        Todo::create([
            'body'=>$request->input('body')]);

        session()->flash('success', 'Todo item created succesfully');
        return back();
    }

    public function delete_item($todo_id){

        $todo_item= Todo::find($todo_id);
        $todo_item->delete();
    
        session()->flash('success', 'todo item deleted succesfully');
        return back();
    }

    public function edit($item_id){

        $item_update = Todo::where('id', $item_id)->get();

        
        return view('edit', ['items'=>$item_update]);
    }

    public function update(Request $request, $item_id){

        $request->validate([
            'body'=>'required|string|max:140']);

        Todo::where('id', $item_id)->update(['body' => $request->input('body')]);

        return redirect()->route('todo_list');
    }
}

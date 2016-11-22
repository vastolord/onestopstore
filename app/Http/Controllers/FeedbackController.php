<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addfeedback(Request $request, $id)
    {
        //
     // $input = new Feedback;   
     $input['comment'] = $request->comment;
     $input['user_id'] = Auth::user()->id;
     $input['product_id'] = $id;

     Feedback::create($input); 

     return redirect()->route('product.detail',$id);
    }



    public function deletefeedback($id)
    {
        //
        $feedback = Feedback::findOrFail($id);
        $product= $feedback->product->id;
        if(Auth::user()->id==$feedback->user->id){
            
            $feedback->forceDelete();
        
        Session::flash('reviewdeleted','Review has been deleted successfully!');
        
        return redirect('detail/'.$product);
         }
        
        return redirect('/');
        // Feedback::findOrFail($id);
    }

    
}

<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Feedbacks;
use Carbon\Carbon;
use Auth;

class FeedbackController extends Controller
{
    public function addFeedback($orderProductID){

        $orderProduct = OrderProduct::where('orderProductID',$orderProductID)->get();

        return view ('student.feedback.addFeedback',compact('orderProduct'));
    }

    public function createFeedback(Request $request){

        $product = $request->productID;


        Feedbacks::insert([
            'productID' => $product,
    		'userID' => Auth::id(),
    		'feedbackMessage' => $request->feedbackMessage,
            'feedbackTime' => Carbon::now(),
            'count' =>  1,
    		'created_at' => Carbon::now(),
        ]);


    	$notification = array(
			'message' => 'Feedback Successfully added !',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
}

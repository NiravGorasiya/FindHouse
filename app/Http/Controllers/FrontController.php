<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Property;
use App\Review;
use App\Contact;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
     public function index(Request $request)
        {
            $property=DB::table('properties')
                        ->join('property_types','property_types.id','properties.type')
                        ->select('property_types.property_name','properties.*')
                        ->where(['properties.status'=>1])
                        ->get();
            return view('front.index',compact('property'));
        }
        public function details(Request $request,$id)
        {
            $review=DB::table('reviews')
            ->select('reviews.rating','reviews.review','reviews.added_on','registers.username')
            ->leftjoin('registers','registers.id','=','reviews.user_id')
            ->where(['reviews.status'=>1, 'reviews.property_id' => $id])
            ->get();
            $property=Property::find($id);
            if(@$property->admin_id){
                $property=DB::table('properties')
            ->join('admins', 'admins.id', '=', 'properties.admin_id')
            ->select('properties.*','admins.email')
            ->where('properties.id', $id)
            ->first();
            } else {
                $property=DB::table('properties')
            ->join('registers', 'registers.id', '=', 'properties.agent_id')
            ->select('properties.*','registers.username','registers.email','registers.mobile','registers.profile')
            ->where('properties.id', $id)
            ->first();
            }         
            
            return view('front.property_details',compact('property','review'));
        }   
        public function store(Request $request)
        {
           if($request->session()->has('FRONT_USER_LOGIN')){
               $uid=$request->session()->get('FRONT_USER_ID');
               $arr=[
                   "rating"=>$request->rating,
                   "review"=>$request->review,
                   "property_id"=>$request->property_id,
                   "status"=>1,
                   "user_id"=>$uid,
                   "added_on"=>date('Y-m-d h:i:s')
                ];
                $query=DB::table('reviews')->insert($arr);
                $status="success";
                $msg="Thank you for providing review";
           }else
           {
               $status="error";
               $msg="Please Login to submit  your review";

            }
            return response()->json(['status'=>$status,'msg'=>$msg]);
        }
        public function search(Request $request,$str)
        {
           $property=DB::table('properties')
                    ->join('property_types','property_types.id','properties.type')
                    ->select('property_types.property_name','properties.*')
                    ->where('properties.description','LIKE',"%$str%")
                    ->orwhere('properties.year_built','LIKE',"%$str%")
                    ->orwhere('properties.amenities','LIKE',"%$str%")
                    ->orwhere('properties.address','LIKE',"%$str%")
                    ->orwhere('properties.price','LIKE',"%$str%")
                    ->orwhere('properties.rooms','LIKE',"%$str%")
                    ->orwhere('properties.bathrooms','LIKE',"%$str%")
                    ->orwhere('properties.garages','LIKE',"%$str%")
                    ->get();
            
            return view('front.index',compact('property'));           
        }
        public function agentprofile()
        {
             $Register=DB::table('registers')->where(['status'=>1,'user'=>'Agent'])->get();
             return view('front.agent_profile',compact('Register'));
        }
        public function agentpropertydetails(Request $request , $id)
        {
            $propertyview=DB::table('properties')->where(['status'=>1,'agent_id'=>$id])->get();
            return view('front.Agentproperti_details',compact('propertyview'));    
            
        }

        public function review(Request $request ,$id)
        {
            $review=DB::table('reviews')
            ->select('reviews.rating','reviews.review','reviews.added_on','registers.username','registers.profile')
            ->leftjoin('registers','registers.id','=','reviews.user_id')
            ->where(['reviews.status'=>1, 'reviews.property_id' => $id])
            ->get();

            $reviewHtml =  ' <div class="product_single_content">
                    <div class="mbp_pagination_comments mt30">
                    <ul class="total_reivew_view">
                        <li class="list-inline-item sub_titles">Reviews</li>
                    </ul>
                    
                    <div class="custom_hr"></div>'; 
                foreach($review as $list){
                    $reviewHtml .= '<div class="mbp_first media">
                            <img src="'.asset("profile/image/".$list->profile).'" class="mr-3" alt="2.png" width="50" style="border-radius:50%">
                            <div class="media-body">
                                <h4 class="sub_title mt-0">'.$list->username.'
                                    <div class="sspd_review dif">
                                        <ul class="ml10">
                                         
                                        </ul>
                                    </div>
                                </h4>
                                <a class="sspd_postdate fz14" href="#">'.$list->added_on.'</a>
                                <p class="mt10">'.$list->review.'</p>
                            </div>
                        </div>';
                }
        $reviewHtml .=  '</div></div>';
        echo $reviewHtml;

        }

       public function test(){
           if($request->get('filter_price_start')!==null &&$request->get('filter_price_end')!==null){
                 $filter_price_start=$request->get('filter price start');
                 $filter_price_end=$request->get('filter price end');
               
              if($filter_price_start>0 && $filter_price_end>0){
                  $query=$query1->whereBetween('properties.price',[$filter_price_start,$filter_price_end]);
              }   
              $query1= $query1->get();
               prx($query1);
           }
       }
    
       public function contact(Request $request)
       {
          if($request->session()->has('FRONT_USER_LOGIN')){
              $uid=$request->session()->get('FRONT_USER_ID');
              $arr=[
                  "user_id"=>$uid,
                  "name"=>$request->name,
                  "email"=>$request->email,
                  "phone"=>$request->phone,
                  "subject"=>$request->subject,
                  "message"=>$request->message
               ];
               $query=DB::table('contact')->insert($arr);
               $status="success";
               $msg="Thank you for providing contact";
          }else
          {
              $status="error";
              $msg="Please Login to submit  your review";

           }
           return response()->json(['status'=>$status,'msg'=>$msg]);
       }
       public function reviewdetails ()
       {
           return view('front.review');
       }
}


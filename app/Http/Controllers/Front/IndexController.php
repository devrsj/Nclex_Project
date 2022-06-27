<?php

namespace App\Http\Controllers\Front;
use Stevebauman\Location\Facades\Location;
use App\Mail\ReplyMail;
use Mail;
use App\Models\FlashDeal;
use App\Models\Block;
use App\Models\Office;
use App\Models\TagProduct;
use App\Models\BlogCategory;
use App\Models\Tag;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\Seo;
use App\Models\People;
use App\Models\Branch;
use App\Models\Contactus;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\News;
use App\Models\Media;
use App\Models\Page;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Cookie;

use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Crypt;
use Session;
use Rinvex\Country\Models\Country;


class IndexController extends Controller
{

    public function index(Request  $request){


      //$hello="devraj";
      //Cookie::queue('name', $hello,3);
      //$encrypted = Crypt::encryptString('Hello world.');
      //$decrypted = Crypt::decryptString($encrypted);


       //$ipaddress = '';
        //if (isset($_SERVER['HTTP_CLIENT_IP']))
            //$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        //else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            //$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //else if(isset($_SERVER['HTTP_X_FORWARDED']))
            //$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        //else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            //$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        //else if(isset($_SERVER['HTTP_FORWARDED']))
            //$ipaddress = $_SERVER['HTTP_FORWARDED'];
        //else if(isset($_SERVER['REMOTE_ADDR']))
            //$ipaddress = $_SERVER['REMOTE_ADDR'];
        //else
            //$ipaddress = 'UNKNOWN';

       //$locationData = Location::get($ipaddress);


      //$agent = new Agent();
//$browser = $agent->browser();
//$version = $agent->version($browser);
//$platform = $agent->platform();
//$pversion = $agent->version($platform);
   //$sameIPs=Db::table('site_users')->get();



           //$site_user=Db::table('site_users')->insert([
         //"ip_address"=>$locationData->ip,
        //"country_name"=>$locationData->countryName,
        //"region_name"=>$locationData->regionName,
        //"city_name"=>$locationData->cityName,
        //"latitude"=>$locationData->latitude,
        //"longitude"=>$locationData->longitude,
        //"area_code"=>$locationData->areaCode,
        //"web_browser"=>$browser.$version,
        //"device_name"=>$platform.$pversion
       //]);

      $sliders=Db::table('media')->where('gallery_type','slider')->where('status',1)->orderBy('weight','asc')->get();

    return view('front.home.index',compact('sliders'));

    }



    public function pageslug($slug){
      //return Cookie::get('name');

      $page=Db::table('pages')->where('slug',$slug)->first();
      if($page !=null){
        return view('front.pages.index',compact('page'));
      }else{
        abort('404');
      }


     }

     public function userstore($name,$email,$number){

         $user_detail=[
        'name' => $name,
        "email"=> $email,
        'number'=>$number,
      ];
    
      session()->put('user_detail',$user_detail);
      $questions=Db::table('popup_questions')->get();
      foreach($questions as $question){
        $questionanswers[]=
          [
            'id' => $question->id,
            'question'=>$question->name
          ];
      }
      session()->put('questionanswer',$questionanswers);
     $questionanswer=session()->get('questionanswer');
     $answers=Db::table('answers')->where('question_id',$questionanswer[0]['id'])->get();
      $output = "";

       $output .='<h4><strong>'.$questionanswer[0]['question'].'</strong></h4>'.
      '<div class="options">'.
          '<div class="row">'.
              '<div class="col-sm-6 pt-3">'.
                  '<div class="option-each">'.
                      '<span>A.</span>'.
                      '<div class="form-check">'.
                          '<input class="form-check-input" type="radio" value="option1" name="option" id="option1">'.
                          '<label class="form-check-label" for="option1">'.$answers[0]->option1.'</label>'.
                      '</div>'.
                  '</div>'.
              '</div>'.

              '<div class="col-sm-6 pt-3">'.
              '<div class="option-each">'.
                  '<span>B.</span>'.
                  '<div class="form-check">'.
                      '<input class="form-check-input" type="radio" value="option2" name="option" id="option2">'.
                      '<label class="form-check-label" for="option2">'.$answers[0]->option2.'</label>'.
                  '</div>'.
              '</div>'.
          '</div>'.
          '<div class="col-sm-6 pt-3">'.
          '<div class="option-each">'.
              '<span>C.</span>'.
              '<div class="form-check">'.
                  '<input class="form-check-input" type="radio" value="option3" name="option" id="option3">'.
                  '<label class="form-check-label" for="option3">'.$answers[0]->option3.'</label>'.
              '</div>'.
          '</div>'.
      '</div>'.

      '<div class="col-sm-6 pt-3">'.
      '<div class="option-each">'.
          '<span>D.</span>'.
          '<div class="form-check">'.
              '<input class="form-check-input" type="radio" value="option4" name="option" id="option4">'.
              '<label class="form-check-label" for="option4">'.$answers[0]->option4.'</label>'.
          '</div>'.
      '</div>'.
  '</div>'.



          '</div>'.
      '</div>'.
      '<div class="response err mx-5"></div>'.

      '<div class="btn-wrap py-4">'.
          '<button type="button" class="default-btn dummy-btn" id="answerss" onclick="checkAnswer(' . $questionanswer[0]['id'] . ',' . 1 . ')">Next</button>'.
      '</div>';
/*
      '<script>' .
      '$("#answerss").click(function(){'.
        'ans = $(\'input[name="option"]:checked\').val();'.
        'alert(\'hy\');'.
        'alert(ans);'.
           '$.ajax({'.
       'method:"GET",'.
       'url:"' . url("/answerform") . '/'. $questionanswer[0]['id'] . '/+ans+/1",'.
       'success: function(data){'.
           'console.log(data);'.
          '$("#question").html(data);'.
       '}'.
      '});'.
    '});'.
     '</script>';
  */
      return Response($output);



    }
     public function answerform($question_id, $answer_id, $counter) {
       $array[session('user_detail')['email']][] = array(
         'question_id' => $question_id,
         'answer_id' => $answer_id,
       );

       session()->push('user_answer',$array);
            
        print_r(session()->get('user_answer'));

       $questionanswer=session()->get('questionanswer');

       if(key_exists($counter, $questionanswer)) {
     $answers=Db::table('answers')->where('question_id',$questionanswer[$counter]['id'])->get();

      $output = "";

       $output .='<h4><strong>'.$questionanswer[$counter]['question'].'</strong></h4>'.
      '<div class="options">'.
          '<div class="row">'.



              '<div class="col-sm-6 pt-3">'.
                  '<div class="option-each">'.
                      '<span>A.</span>'.
                      '<div class="form-check">'.
                            '<input class="form-check-input" type="radio" value="option1" name="option" id="option1">'.
                            '<label class="form-check-label" for="option1">'.$answers[0]->option1.'</label>'.
                      '</div>'.
                  '</div>'.
              '</div>'.

              '<div class="col-sm-6 pt-3">'.
              '<div class="option-each">'.
                  '<span>B.</span>'.
                  '<div class="form-check">'.
                    '<input class="form-check-input" type="radio" value="option2" name="option" id="option2">'.
                    '<label class="form-check-label" for="option2">'.$answers[0]->option2.'</label>'.
                  '</div>'.
              '</div>'.
          '</div>'.
          '<div class="col-sm-6 pt-3">'.
          '<div class="option-each">'.
              '<span>C.</span>'.
              '<div class="form-check">'.
                '<input class="form-check-input" type="radio" value="option3" name="option" id="option3">'.
                '<label class="form-check-label" for="option3">'.$answers[0]->option3.'</label>'.
              '</div>'.
          '</div>'.
      '</div>'.

      '<div class="col-sm-6 pt-3">'.
      '<div class="option-each">'.
          '<span>D.</span>'.
          '<div class="form-check">'.
           '<input class="form-check-input" type="radio" value="option4" name="option" id="option4">'.
           '<label class="form-check-label" for="option4">'.$answers[0]->option4.'</label>'.
          '</div>'.
      '</div>'.
  '</div>'.

          '</div>'.
      '</div>'.
      '<div class="response err mx-5"></div>'.

      '<div class="btn-wrap py-4">'.
          '<button type="button" class="default-btn dummy-btn" id="answer" onclick="checkAnswer(' . $questionanswer[$counter]['id'] . ',' . ++$counter . ')">Next</button>'.
      '</div>';
       } else {
        $user_id=Db::table('customer__data')->insert([
          "name"=>session('user_detail')['name'],
          "email"=>session('user_detail')['email'],
          "number"=>session('user_detail')['number']
        ]);
        $id=Db::table('customer__data')->orderBy('id','desc')->first();
            
        $cus_ans=[
            "id"=>$id->id,
            "question_id"=>session('user_answer')['question_id'],
            "reply_id"=>session('user_answer')['answer_id']
          ];
          session()->put('cu_ans',$cus_ans);
           


            $output = 'cal';
       }
      return Response($output);
     }



     public function readabout($slug){

       return view('front.pages.readmore',compact('slug'));

    }


    public function store(Request $request){

        Contact::create([
       "name" =>$request->name,
       "email" =>$request->email,
       "number"=>$request->number,
       "subject"=>$request->subject,
       "message"=>$request->message,
      ]);
        session()->flash('success','Message sucesfully sent');
        return redirect()->back();
    }


 public function event_store(Request $request){

       $date = Carbon::now();

     Db::table('events')->insert([
            "name" =>$request->name,
           "email" =>$request->email,
            "date"=>$request->date,
             "time"=>$request->time,
           "message"=>$request->message,
           "sending_date"=>$date
         ]);

        session()->flash('success','Booking  Event Sucesfully');
        return redirect()->back();
    }





     public function blog_detail($blogslug){
      $categories=BlogCategory::where('status',1)->orderBy('weight','asc')->limit(5)->get();
      $tags=Tag::OrderBy('weight','asc')->limit(5)->get();
      $recent_blogs=Blog::where('status',1)->OrderBy('id','desc')->limit(4)->get();
        $blog_detail=Blog::where('slug',$blogslug)->where('status',1)->first();
        if($blog_detail !=null){
          return view('front.pages.blog_detail',compact('recent_blogs','tags','blog_detail','categories'));
        }else{
          abort('404');
        }
    }

    public function event_detail($event){
      $categories=BlogCategory::where('status',1)->orderBy('weight','asc')->limit(5)->get();
      $tags=Tag::OrderBy('weight','asc')->limit(5)->get();
      $recent_blogs=Blog::where('status',1)->OrderBy('id','desc')->limit(4)->get();
        $event_detail=News::where('slug',$event)->where('status',1)->first();
        if($event_detail !=null){
          return view('front.pages.blog_detail',compact('recent_blogs','tags','event_detail','categories'));
        }else{
          abort('404');
        }
    }



      public function tags($tag){


            $tag_blog=Tag::where('slug',$tag)->first();
            $categories=BlogCategory::where('status',1)->orderBy('weight','asc')->limit(5)->get();
            $tags=Tag::OrderBy('weight','asc')->limit(5)->get();
            $recent_blogs=Blog::where('status',1)->OrderBy('id','desc')->limit(4)->get();
            $blogtags=$tag_blog->blogs()->simplePaginate(15);
           return view('front.pages.blog_detail',compact('tag','recent_blogs','blogtags','categories','tags','tag_blog'));

    }



    public function search(){


          $search=request()->query('search');
          $categories=BlogCategory::where('status',1)->orderBy('weight','asc')->limit(5)->get();
      $tags=Tag::OrderBy('weight','asc')->limit(5)->get();
      $recent_blogs=Blog::where('status',1)->OrderBy('id','desc')->limit(3)->get();
       $blogs= Blog::where('heading','LIKE','%'.$search.'%')->OrderBy('weight','asc')->Paginate(2);
         return view('front.pages.blog_detail',compact('recent_blogs','tags','categories','search','blogs'));
    }

      public function search_product(){

           $count=Product::count();
          $search_product=request()->query('search_product');
          $tagproducts=TagProduct::OrderBy('weight','asc')->get();
          $categories=Category::where('status',1)->orderBy('weight','asc')->get();

          $search_products= Product::where('name','LIKE','%'.$search_product.'%')->OrderBy('weight','asc')->where('status',1)->Paginate(18);
         return view('front.pages.shop',compact('count','tagproducts','categories','search_product','search_products'));
    }








      public function categorydetail($slug){


        $category=BlogCategory::where('slug',$slug)->first();
        $id=$category->id;
        $categories=BlogCategory::where('status',1)->orderBy('weight','asc')->limit(5)->get();
        $tags=Tag::OrderBy('weight','asc')->limit(5)->get();
        $recent_blogs=Blog::where('status',1)->OrderBy('id','desc')->limit(4)->get();
        $category_blogs=Blog::where('category_id',$id)->where('status',1)->orderBy('weight','asc')->simplePaginate(1);

      return view('front.pages.blog_detail',compact('category','recent_blogs','tags','category_blogs','categories','slug'));
    }



    public function privacy($privacy){

      $page=Db::table('pages')->where('slug',$privacy)->first();

      return view('front.pages.privacy',compact('page'));
    }

    //
}


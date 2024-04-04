<?php

namespace App\Http\Controllers;
use App\Models\student;
use App\Models\course;
use App\Models\course_enrollment;
use App\Models\admin;
use App\Models\faculty;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;
use Session;
class submitController extends Controller
{

  //Student Registration -----

  public function student_reg(){
    return view('student.registration');
  }

  public function registration(Request $request){
    
    $name=  $request->input('name');
    $email=  $request->input('email');
    $phone=  $request->input('phone');
    $address= $request->input('address');
    $password= $request->input('password');
    $new_password=bcrypt($password);
    $image=$request->file('image');//picture is from FORM value.
        // dd($image);
        $filename= time()."-".$image->getClientOriginalName(); 
      $location='student_images';  // 'assest' folder is in the PUBLIC folder 
     $image->move($location,$filename);
  
    $obj_student=new student;
    $obj_student->name=$name;
    $obj_student->email= $email;
    $obj_student->phone= $phone;
    $obj_student->address= $address;
    $obj_student->password= $new_password;
    $obj_student->image=$filename;
  
  
   $result= $obj_student->save();
  // dd($result);
  
  if($result){
      return redirect('/student_registration')->with(['message'=>'successfully submitted']);
  }else{
      return redirect('/student_registration')->with(['message'=>'not submitted']);
  }
  
  
  
  }
  //Student Login --------------------
  public function student_login(){
    return view('student.login');
  }
  
  
  public function login(Request $request){
    $email=$request->input('email');
    $login_password=$request->input('password');
    //dd($login_password);

    $login_data=student::where('email','=',$request->email)->First();
    
    //dd($login_data);

    if($login_data){
      //$db_password=$login_data->password;
        //dd($db_password);
        if(Hash::check($login_password,$login_data->password))
        {
      
      
        $request->session()->put('login_id',$login_data->id);
        $request->session()->put('user_data',$login_data);
        //dd(session('user_data')->name);
        $request->session()->put('login_name',$login_data->name);
        
        
        
        
      
        return redirect('/');
      }else{
        return redirect('/student_login')->with(['message'=>'Password not matched']);
      }
    }
       else{
          return redirect('/student_login')->with(['message'=>'User not exist']);
        }
    }

    //student Logout-------------

    public function student_logout(Request $request){
      $request->session()->forget('login_id');
        $request->session()->flush();
        return redirect('/');
  }
  

  //Frontend Index--------------
    public function home(){
        return view('index');
    }
    //Frontend About--------------
    public function about(){
        return view('about');
    }
    public function course(){
      return view('course');
  }
  public function faculty(){
    return view('faculty');
}
   //Admin Dashboard-------------
    public function admin_home(){
        return view('admin.index');
    }
    
//Admin Fetch student data------
    public function fetch_student(){
      
  //$data=DB::table('student')->get();
  //dd($data);
       $obj_student=new student;
       $alldata= $obj_student->get();

  return view('admin.student.view_student')->with(['students'=>$alldata]);


    }


//Admin show student data for particular data------

public function edit_student($id){

$edit_info=  student::find($id);
            //  dd($edit_info);
            return view('admin.student.edit_student')->with(['edit_students'=>$edit_info]);

}
//Admin update student data------
public function update_student(Request $request){
  // dd($request->all());

 $name= $request->input('name');
 $phone= $request->input('phone');
 $email= $request->input('email');
 $address=$request->input('address');
 $update_id= $request->input('student_id');
 $image= $request->file('image');

if($image==''){
  $affected_row= student::whereId($update_id)->update(['name'=>$name,
  'phone'=>$phone,
  'email'=>$email,
  'address'=>$address]);

}else{

  $filename=time()."-".$image->getClientOriginalName();
  $location='student_images';
  $image->move($location,$filename);

  $affected_row= student::whereId($update_id)->update(['name'=>$name,
  'phone'=>$phone,
  'email'=>$email,
  'address'=>$address,
  'image'=>$filename]);

}


if($affected_row){

  return redirect('/view_student')->with(['message'=>'successfully updated']);
}else{
  return redirect('/view_student')->with(['message'=>'not updated']);
}

}

//Admin Delete student data------
public function delete_student($id){
  
$delete_info=  student::whereId($id)->delete();
    //  dd( $delete_info);
    
  if($delete_info){
   
    return redirect('/view_student')->with(['message'=>'successfully deleted']);
  }else{
    return redirect('/view_student')->with(['message'=>'not deleted']);
  }
  
  }

//Admin Add Course----------------------
  public function add_course(){
        return view('admin.course.add_course');
    }


    public function submit_course( Request $request){ //$request is the object of $request
         

        $course_name=$request->input('course_name');
        $course_price=$request->input('course_price');
        $course_duration=$request->input('course_duration');
        $course_description=$request->input('course_description');
        $course_popular=$request->input('popular');
        
        $course_image=$request->file('course_image');//picture is from FORM value.
       
        $filename= time()."-".$course_image->getClientOriginalName(); 


      $location='course_images';  // 'assest' folder is in the PUBLIC folder 
     $course_image->move($location,$filename);

     $obj_course=new course;
    $obj_course->course_name=$course_name;
    $obj_course->course_price= $course_price;
    $obj_course->course_duration= $course_duration;
    $obj_course->course_description= $course_description;
    $obj_course->popular=$course_popular;
    
    $obj_course->course_image=$filename;
  
  
   $result= $obj_course->save();


if($result){
// return redirect('/signup')->with(['message'=>'successfully submitted']);
return view('admin.course.add_course')->with(['message'=>'successfully submitted']);
}else{
// return redirect('/signup')->with(['message'=>'not submitted']);

return view('admin.course.add_course')->with(['message'=>'not submitted']);
}
}

public function view_course(){
  return view('admin.course.view_course');
}
public function fetch_admin_course(){
  $obj_course=new course;
  $data=$obj_course->get();
  //dd($data);
  return view('admin.course.view_course')->with(['courses'=>$data]);


}
public function edit_course($id){
  $edit_data=course::find($id);
  return view('admin.course.edit_course')->with(['edit_course'=>$edit_data]);

}
public function update_course(Request $request)
{
  $course_name=$request->input('course_name');
  $course_price=$request->input('course_price');
  $course_duration=$request->input('course_duration');
  $course_description=$request->input('course_description');
  $course_popular=$request->input('popular');
  // if (!$request->has('popular')) {
  //     // If not present, set the default value
  //     $request->merge(['popular' => 'not-popular']);
  // }

  $course_update=$request->input('hidden_id');
  $course_image=$request->file('course_image');//picture is from FORM value.
  // dd($course_image);
  
  if($course_image==''){
      $affected_row=course::whereId($course_update)->update(['course_name'=>$course_name,'course_price'=>$course_price,'course_duration'=>$course_duration,'course_description'=>$course_description,'popular'=>$course_popular]);

  }
  else{
      $filename= time()."-".$course_image->getClientOriginalName(); 
      $location='course_images';  // 'assest' folder is in the PUBLIC folder 
      $course_image->move($location,$filename);

      $affected_row=course::whereId($course_update)->update(['course_name'=>$course_name,'course_price'=>$course_price,'course_duration'=>$course_duration,'course_description'=>$course_description,'popular'=>$course_popular,'course_image'=>$filename]);
  }
  if($affected_row){
      return redirect('/fetch_course')->with(['message'=>'successfully updated']);
  }else{
      return redirect('/fetch_course')->with(['message'=>'not updated']);
  }
}
public function delete_course($id){
  $affected_row=course::whereId($id)->delete();
  if($affected_row){
       return redirect('/fetch_course')->with(['message'=>'successfully deleted']);
       
  }else{
      return redirect('/fetch_course')->with(['message'=>'not deleted']);
  }

}

public function faculty_home(){
      

  $obj_faculty=new faculty;
  $alldata= $obj_faculty->get();
  //dd($alldata);


return view('faculty')->with(['details'=>$alldata]);
}

//Admin Add Faculty-------------------------

public function add_faculty(){
  return view('admin.faculty.add_faculty');
}

//Admin Submit Faculty---------------
public function submit_faculty(Request $request){
  //dd($request->all());
  $request->validate([
    'faculty_name'=>'required|min:3|max:20',
    'faculty_phone'=>'required|numeric|min:10',
    'faculty_email'=>'required|email',
    'faculty_image'=>'required|max:500|mimes:jpg,jpeg,webp'
],
['faculty_name.required'=>'Name field should not be empty',
'faculty_phone.required'=>'Phone field should not be empty',
'faculty_email.required'=>'email field should not be empty',
'faculty_image.required'=>'image field should not be empty',]  

);
  $name=  $request->input('faculty_name');
  $phone=  $request->input('faculty_phone');
  $email=  $request->input('faculty_email');
  $address=  $request->input('faculty_address');
  $subject=  $request->input('faculty_subject');
  $experience=  $request->input('faculty_experience');
  $category=  $request->input('popular');
  $image=$request->file('faculty_image');
       // dd($image);
      $filename= time()."-".$image->getClientOriginalName();
      //dd($filename);

      $location='faculty_images';
     $image->move($location,$filename);

  $obj_faculty=new faculty;
  $obj_faculty->name=$name;
  $obj_faculty->phone= $phone;
  $obj_faculty->email= $email;
  $obj_faculty->address= $address;
  $obj_faculty->subject= $subject;
  $obj_faculty->experience= $experience;
  $obj_faculty->category= $category;
  $obj_faculty->image= $filename;


  $result=$obj_faculty->save();

  if($result){
    return redirect('/view_faculty')->with(['message'=>'successfully submitted']);
}else{
    return redirect('/view_faculty')->with(['message'=>'not submitted']);
}


}
//Admin Fetch Feaculty---------
public function fetch_faculty(){
  $obj_faculty=new faculty;
  $alldata= $obj_faculty->get();
  //dd($alldata);

  return view('admin.faculty.view_faculty')->with(['details'=>$alldata]);
}
//Admin Get data for particular Faculty--------------
public function edit_faculty($id){
  $edit_info=  faculty::find($id);
//  dd($edit_info);
return view('admin.faculty.edit_faculty')->with(['edit_details'=>$edit_info]);


}
//Admin Update Faculty-----------------
public function update_faculty(Request $request){
  $update_id=  $request->input('faculty_id');
  $name=  $request->input('name');
  $phone=  $request->input('phone');
  $email=  $request->input('email');
  $address=  $request->input('address');
  $subject=  $request->input('subject');
  $experience=  $request->input('experience');
  $category=  $request->input('popular');
  $image= $request->file('picture');

  
  
  if($image==''){

$affected_row= faculty::whereId($update_id)->update(['name'=>$name,
                                      'phone'=>$phone,
                                      'email'=>$email,
                                      'address'=>$address,
                                      'subject'=>$subject,
                                      'experience'=>$experience,
                                      'category'=>$category
                                      ]);
 //dd( $affected_row);

 }
 else{
  $filename=time()."-".$image->getClientOriginalName();
  $location='faculty_images';
  $image->move($location,$filename);

  $affected_row= faculty::whereId($update_id)->update(['name'=>$name,
                                      'phone'=>$phone,
                                      'email'=>$email,
                                      'address'=>$address,
                                      'subject'=>$subject,
                                      'experience'=>$experience,
                                      'category'=>$category,
                                      'image'=>$filename]);



}



if($affected_row){
  return redirect('/view_faculty')->with(['message'=>"Successfully updated"]);
}else{
  return redirect('/view_faculty')->with(['message'=>"not updated"]);
}
}
//Admin Delete Faculty-------------
public function delete_faculty($id){
  $data=  faculty::whereId($id)->get();

  $image_name=$data[0]->image;

  $delete_info=  faculty::whereId($id)->delete();
//  dd( $delete_info);

//$image_name=$delete_info[0]->image;

if($delete_info){
  unlink('faculty_images/'.$image_name);
  return redirect('/view_faculty')->with(['message'=>'successfully deleted']);
}else{
  return redirect('/view_faculty')->with(['message'=>'not deleted']);
}
// if($delete_info){
//     return redirect('/view_faculty')->with(['message'=>"Successfully deleted"]);
//  }else{
//     return redirect('/view_faculty')->with(['message'=>"not deleted"]);
//  }

}

//Admin View Course Enrollment---------------
public function fetch_course_enrollment(){
  $obj_enrollment=new course_enrollment;
       $alldata= $obj_enrollment->get();

  return view('admin.student.view_course_enrollment')->with(['course_enrollment'=>$alldata]);
}
// For Frontend Course page------
public function fetch_course(){
      
       $obj_course=new course;
       $alldata= $obj_course->get();

  return view('course')->with(['courses'=>$alldata]);


    }
// For Frontend Course Details page------

public function course_details($id){
  $course_data=  course::find($id);
  $student_data= ['name'=>session('login_name'),'id'=>session('login_id')];
  //  dd($edit_info);
  return view('course_details')->with(['course_data'=>$course_data,'student_data'=>$student_data]);

}

//For Frontend Course Enrollment ---------
public function course_enrollment(Request $request){
    
  $course_name= $request->input('course_name');
  $student_name= $request->input('student_name');
  $course_id=  $request->input('course_id');
  $student_id= $request->input('student_id');
  $course_price=$request->input('course_price');

  $obj_enrollment=new course_enrollment;
  $obj_enrollment->course_name=$course_name;
  $obj_enrollment->student_name= $student_name;
  $obj_enrollment->course_id= $course_id;
  $obj_enrollment->student_id= $student_id;
  $obj_enrollment->course_price= $course_price;
  


 $result= $obj_enrollment->save();
// dd($result);

if($result){
    return redirect('/course')->with(['message'=>'successfully submitted']);
}else{
    return redirect('/course')->with(['message'=>'not submitted']);
}

}

//Student Dashboard--------------
public function student_dashboard(){
  return view('student.student_dashboard');
}

public function student_profile(){
  return view('student.student_profile');
}


//student password change-----------

public function change_password(Request $request){
  $student_id= session('login_id');
  $password=  $request->input('password');  
  $new_password=bcrypt($password);
  $affected_row= student::whereId($student_id)->update(['password'=>$new_password]);

  if($affected_row){
    return view('student.student_profile')->with(['message'=>'successfully updated']);
}else{
    return view('student.student_profile')->with(['message'=>'not updated']);
}

}

public function fetch_student_data(Request $request){

  
  if(session()->has('login_id')){
   $id=$request->session()->get('login_id');
   $obj_enrollment=new course_enrollment();
   $course=$obj_enrollment->where('student_id',$id )->get();
   // dd($alldata);
   
   return view('student.student_dashboard',compact('course'));
   

  }



}

// admin_login---------------------------

public function admin_login(){
  return view('admin.admin_login.admin_login');
}
public function admin_login_submit(Request $request){
  //dd($request->all());
  $login_email=$request->input('email');
   $login_password=$request->input('password');
  $request->validate(['email'=>'required','password'=>'required'],
  // ['email.required'=>'Name field does not blank',
  // 'password.required'=>'Phone field does not blank']  
  );
  $check=admin::where(['email'=>$request->email,'password'=>$request->password])->count();
  if($check>0){
     $admitdata=admin::where(['email'=>$request->email,'password'=>$request->password])->first();
     session(['admindata'=>$admitdata]);

      return redirect('/admin');
   }
  else{
      return redirect('/admin_login')->with(['message'=>'invalid username or password']);
  }
  

}
public function admin_logout(){
  session()->forget(['admindata']);
  return redirect('/admin_login')->with(['message'=>'invalid username or password']);
  Session::flush();
}

   //Admin Dashboard-------------
    // public function admin_home(){
    //     return view('admin.index');
    // }
//Admin Dashboard course count-------------
    public function admin_count(){
      $obj_course=new course;
      $obj_enrollment=new course_enrollment;
      $obj_student=new student;
      $obj_faculty=new faculty;

      $course_data=$obj_course->count();
      $student_data=$obj_student->count();
      $faculty_data=$obj_faculty->count();
      
      $course_enrollment_data=$obj_enrollment->count();
     
      return view('admin.index')->with(['courses'=>$course_data,'students'=>$student_data,'faculty'=>$faculty_data,'enrollment'=>$course_enrollment_data]);
  }


  public function popular_course(){
    $obj_course=new course;
    $alldatas= $obj_course->where('popular','popular')->get();
    $obj_faculty=new faculty;
    $alldata= $obj_faculty->where('category','popular')->get();
    //dd($alldata);
  
    return view('index')->with(['popular_course'=>$alldatas,'popular_faculty'=>$alldata]);
  }
}

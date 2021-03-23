<?php

use Illuminate\Support\Facades\Route;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/file-upload',function()
{
    return view('form');
});
Route::post('store','FormController@store')->name("forms.store");
//Route::get('get','FormController@index');
Route::get('/show','FormController@index');

Route::get('/post/{id}/{name}','Postcontroller@index'); 


Route::get('/insert/', function () {  
DB::insert('insert into jobs(ID_number,name,job) values(?,?,?)',['18ITR130','DIVYA','Manager']);  
});


Route::get('/select',function(){  
$results=DB::select('select * from jobs where id=?',[3]);  
foreach($results as $jobs)  
{  
echo "title is :".$jobs->name;  
echo "<br>";  
echo "body is:".$jobs->job;  
}  
}); 



Route::get('/update', function(){  
$updated=DB::update('update jobs set job="software tester" where id=?',[2]);  
return $updated;  
});


Route::get('/delete',function(){  
$deleted=DB::delete('delete from jobs where id=?',[1]);  
return $deleted;  
});  


Route::get('/read',function(){  
$posts=Post::all();  
foreach($posts as $post)  
{  
  echo $post->body;  
  echo '<br>';  
}  
}); 


/*Route::get('/find',function(){  
$posts=Post::find(3);  
return $posts->title;  
});  
*/


Route::get('/find',function(){  
$posts=Post::where('id',2)->value('title');  
return $posts;  
});


Route::get('/insert1',function(){  
$post=new Post;  
$post->title='Minnu';  
$post->body='QA Analyst';  
$post->save();  
});


Route::get('/basicupdate',function(){  
$post=Post::find(2);  
$post->title='Juju';  
$post->body='Graphic Designer';  
$post->save();  
});  


Route::get('/create',function(){  
Post::create(['title'=>'Priya','body'=>'Technical Content Writer']);  
});


Route::get('/update1',function(){  
Post::where('id',5)->update(['title'=>'Pri','body'=>'technical Content Writer']);  
}); 


Route::get('/delete1',function(){  
$post=Post::find(5);  
$post->delete();  
}); 


Route::get('/destroy',function(){  
Post::destroy(3);  
});


Route::get('/softdelete',function(){  
Post::find(2)->delete();  
});


Route::get('/readsofdelete',function(){  
$post=Post::withTrashed()->where('id',2)->get();  
return $post;  
});  


Route::get('/restore',function(){  
Post::withTrashed()->where('id',2)->restore();  
});  





Route::get('/user1', function()  
{  
    return view('details',['name' => 'PRIYA','id' => '77']);
     
}  
); 


//Route::get('posts', 'PostController1@create')->middleware('check'); 
//Route::get('posts', 'PostController1@create');
//Route::get('posts/{id}', 'PostController1@show');
//Route::get('/post','PostController1@display');
//Route::get('/studetails', 'StudentController@display'); 
Route::get('/studetails/{id}/', 'StudentController@display');  

//Route::resource('posts','PostController1'); 

//Route::resource('posts2','PostController1',['names' => ['create' =>'posts2.build']]);  
//Route::resource('posts2','PostController1', ['parameters' => ['posts2' => 'admin_student']]);

//Route::resource('posts1','PostController2',['only' => ['create','show']]);


/*route::resources(  
['posts1'=>'PostController1',  
'posts2'=>'PostController2']  
);*/   







/*Route::name('admin.')->group(function()  
{  
   Route::get('users', function()  
{  
 return "admin.users";  
})->name('users');  
});*/  






/*Route::middleware(['age'])->group(function()  
{  
   Route::get('/first',function()  
 {  
   echo "<br>first route";  
 });  
Route::get('/second',function()  
 {  
   echo "<br>second route";  
 });  
Route::get('/third',function()  
 {  
   echo "<br>third route";  
 });  
}); 
*/




/*Route::Get('/',function()  
{  
  return view('welcome');  
})-> middleware('age');  
Route::Get('user/profile',function()  
{  
  return "user profile";  
});  
Route::Get('/{age}',function($age)  
{  
  return view('welcome');  
})-> middleware('age');  
*/


/*Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/user', function ()  
 {      
return "Hello Priya";  
});*/

/*Route::get('/', function () {  
    return redirect('/user');  
});*/


//Route::redirect('/','user');  





  

/*Route::get('/', function()  
{  
  return "This is a home page";   
}  
);*/
Route::get('/about', function()  
{  
  return "This is a about us page";   
}  
);  
Route::get('/contact', function()  
{  
  return "This is a contact us page";   
}  
);  
Route::get('/user/{id}/{name}', function($id,$name)  
{  
    //return view('details');
  return "Your id number is : ". $id. "<br>Your name is : ".$name;   
}  
);  
Route::get('/optional1/{id?}/{name?}',function($id = null,$name = null)
{
    //return $id;
    return "The id number is : ".$id."<br>Your name is : ".$name;
});

Route::get('/optional2/{id?}/{name?}',function($id = 100,$name = "PRIYA")
{
    //return $id;
    return "The id number is : ".$id."<br>Your name is : ".$name;
});


Route::get('/optional3/{id?}/{name?}',function($id = null,$name = null)
{
    return "The id number is : ".$id."<br>Your name is : ".$name;
})->where(['id'=>'[0-9]+']);

/*Route::get('student/details/example',array   
('as'=>'student.details',function()  
{  
   $url=route('student.details');  
   return "The url is : " .$url;  
}));*/ 

Route::get('user1/{id}/profile',function($id)  
{  
   $url=route('profile',['id'=>100]);  
    return $url;  
})->name('profile'); 



/*Route::get('/',function()  
{  
  return view('student');  
});  
  
Route::get('student/details',function()  
{  
  $url=route('student.details');  
 return $url;  
})->name('student.details');  */
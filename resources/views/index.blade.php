@section('content')  
@foreach($forms as $form)  
<div>  
<img src="./images/{{ $form->path}}">  
</div>  
@endforeach 
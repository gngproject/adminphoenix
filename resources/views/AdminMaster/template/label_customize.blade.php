
    @if ($model->status == 0)
         <label class="badge badge-danger"> 
             New Entered
         </label>      
         @elseif($model->status == 1)
         <label class="badge badge-warning"> 
             Waiting For Payment...
         </label>   
         @else
         <label class="badge badge-success"> 
             Done
         </label>  
    @endif
   
@extends('admin.index')
@section('main')
<style>
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus
    input:-webkit-autofill, 
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
      -webkit-text-fill-color: black;
      -webkit-box-shadow: 0 0 0px 1000px #fff inset;
    }
    ::-webkit-scrollbar {
      width: 5px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
      box-shadow: inset 0 0 5px #fff; 
      border-radius: 10px;
    }
     
    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #ddd; 
      border-radius: 10px;
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #CCCCCC; 
    }
    .myUL{
        width:950px;
        height:100px;
        overflow-x:hidden;
        overflow-y:scroll;
    }
</style>
<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">

                <form method="POST" action="{{route('typesConsul.store')}}">
                    @csrf
                    <div class="form-body">
                        <hr>
                         <div class="row">
                             <div class="col-md-12">
                                 <label class="control-label">نوع خدمة الاستشارة</label>
                                 <textarea class="form-control" rows="2" cols="50" id="myInputConsul"></textarea>
                                 <br>
                                 <span onclick="newElement(this)" class="btn btn-success">إضافة</span>
                                 
                                 <ul id="myULOfTypes" class="myUL" style="list-style:none;" class="list-group">
                                     
                                 </ul>
                                 
                             </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
                </form>
            </div>
            
            <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
            
                        <div class="modal-body text-center" style="padding: 40px">
                            <h3 class="afterShow" style="font-family:dr;color:#808080;">من فضلك أدخل نوع الاستشارة الإدراية للإضافة؟</h3>
                            
                        </div>
            
            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Row -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function newElement(e){
        var ul = document.getElementById('myULOfTypes');
        var inputAsk = $('#myInputConsul').val();
        if(inputAsk != ""){
            var newKey = Date.now();
            
            var br = document.createElement('br');
            var li = document.createElement('li');
            var textarea = document.createElement('textarea');
            var close = document.createElement('span');
            var txt = document.createTextNode('x');
            close.appendChild(txt);
            
            textarea.value = inputAsk;
            textarea.name="TypeConsulting["+newKey+"][name]";
            textarea.cols="50";
            textarea.rows="2";
            textarea.setAttribute('class' , 'form-control');
            textarea.setAttribute('style' , 'width:800px');
            
            close.setAttribute('class' , 'del');
            close.setAttribute('style' , 'position:relative;right:10px;top:-25px;cursor:pointer');
            
            li.appendChild(br);
            li.appendChild(textarea);
            li.appendChild(close);
            ul.appendChild(li);
            
            var closeClass = document.getElementsByClassName('del');
            var i;
            for (i = 0; i < closeClass.length; i++) {
              closeClass[i].onclick = function() {
                var div = this.parentElement;
                div.remove();
              }
            }
            
            $('#myInputConsul').val("");
        }else{
            $('#dataOfDelation').empty();
            $('#uploadingModal').show();
            $('<div id="dataOfDelation"><br><a class="btn btn-success text-white" onclick="closeWindow()">ok</a></div>').insertAfter(".afterShow");
        }
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection
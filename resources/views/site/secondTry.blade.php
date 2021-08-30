<html>
<head>
    <style>
        .questionHere{
            position:relative;
            right:180px;
        }
        #result{
            position:relative;
            float:left;
            height: 40px;
            border-radius: 10px;
            background: #fff;
        }
        .myUL{
            width:880px;
            height:1300px;
            overflow-x:hidden;
            overflow-y:scroll;
        }
        @media screen and (min-width:1025px) and (max-width:1190px) {
            .questionHere{
                position:relative;
                right:90px;
                display:inline-block;
                width:400px;
            }
            #result{
                position:relative;
                float:left;
                height: 40px;
                border-radius: 10px;
                background: #fff;
                right:-180px;
            }
        }
        @media only screen and (width: 1024px){
            #result{
                position:relative;
                right:-100px;
            }
            .myUL{
                width:750px;
                height:1300px;
                overflow-x:hidden;
                overflow-y:scroll;
            }
            .questionHere{
                display:inline-block;
                width:280px;
                position:relative;
                right:90px;
            }
        }
        @media screen and (min-width:600px) and (max-width:991px) {
            .questionHere{
                right:50px;
                display:inline-block;
                width:240px;
            }
            #result{
                position:relative;
                right:-100px;
            }
            .myUL{
                width:600px;
                height:1300px;
                overflow-x:hidden;
                overflow-y:scroll;
            }
        }
        @media (max-width: 500px){
            .questionHere{
                right:30px;
                display:inline-block;
                width:180px;
            }
            #result{
                right:-10px;
            }
            .myUL{
                width:300px;
                position:relative;
                right:-60px;
                height:1350px;
                overflow-x:hidden;
                overflow-y:scroll;
            }
        }
        @media only screen and (width: 393px){
            .questionHere{
                right:30px;
            }
            #result{
                right:-10px;
            }
            .myUL{
                width:300px;
                position:relative;
                right:-60px;
                height:1350px;
                overflow-x:hidden;
                overflow-y:scroll;
            }
        }
        
        @media only screen and (width: 360px){
            .myUL{
                width:280px;
                height:1350px;
                overflow-x:hidden;
                overflow-y:scroll;
            }
            .questionHere{
                display:inline-block;
                width:140px;
            }
        }
        
        @media only screen and (width: 320px){
            .myUL{
                width:280px;
                height:1350px;
                overflow-x:hidden;
                overflow-y:scroll;
            }
            .questionHere{
                right:0px;
                display:inline-block;
                width:140px;
            }
        }
        
    </style>
</head>
    <body>
        @foreach($data as $all)
        <h3>{{$all->name}}</h3>
        @if(count($all->GetQuestionsForPillars) > 0)
        @foreach($all->GetQuestionsForPillars as $quest)
        <?php $newKey = rand();  ?>
        <li id="{{$quest->id}}">
        <span class="questionHere">{{$quest->question}}</span>
        <input type="hidden" id="question_id" name="ResultsService[<?php echo $newKey ?>][question_id]" value="{{$quest->id}}"/>
        <select name="ResultsService[<?php echo $newKey ?>][result]" id="result" class="from-control" >
            <option disabled selected>-- اختر --</option>
            <option value="0">نعم</option>
            <option value="1">لا</option>
            <option value="2">احيانا</option>
        </select>
        </li>
        <br>
        <br>
        @endforeach
        @else
        <h4 class="text-center">No Question here</h4>
        @endif
        @endforeach
        
        <button type="submit" class="buttonForSubmitInfo">عرض النتيجة</button>
    </body>
</html>
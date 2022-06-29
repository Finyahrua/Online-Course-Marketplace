@extends('layouts.home')

@section('main')
<body >
  
  <div style="color: black;
        display: table;
        font-family: Georgia, serif;
        font-size: 24px;
        text-align: center;
        margin: 0 0 20px 10%;
        justify-self: center;">
    <div style="display:flex;flex-direction:row;justify-content:space-between;margin-top:20px">
          <div id="print_cer" style=" border: 20px solid tan;
            width: 750px;
            height: 450px;
            display: table-cell;
            vertical-align: middle;">
          <div style="color: tan;
            font-size: 44px;">Online Course Marketplace</div>

          <div style="        font-family: 'Pinyon Script', cursive;
            color: tan;
            font-size: 48px;
            margin: 20px;">Certificate of Completion</div>

          <div style=" margin: 20px;
            font-family: 'Pinyon Script', cursive;">This certificate is presented to</div>

          <div style=" border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;">{{ $name->name }}</div>

          <div style="margin: 20px;
            font-family: 'Pinyon Script', cursive;">for completing the training course entitled</div>
          <div style=" border-bottom: 1px solid black;
            font-size: 25px;
            margin: 20px auto;
            width: 350px">{{ $course->title }}</div>
        </div>   
        <div style="margin-left: 50px;font-family: Georgia, serif;font-style: italic; align-items:center;justify-content:center" >
          <input id="btn_convert" type="button" value="Save as Image"  class="uk-button uk-button-primary-preserve uk-button-large uk-width-1-1" />
        </div>

    </div>
   </div>
</body>

@endsection
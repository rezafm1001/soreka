@extends('layouts.menu')
@section('content')
    <div class="box-content">
    <form class="form-horizontal" method="post" action="{{route('office.store')}}">
        {{csrf_field()}}
        <fieldset>


            <div class="control-group">
                <label class="control-label" for="typeahead">نام شرکت</label>
                <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="office_name">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="typeahead">نام شهر</label>
                <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="city_name">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="typeahead">زمینه فعالیت</label>
                <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="activity">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="typeahead">نام کارشناس</label>
                <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="expert_name">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="typeahead">نام مدیر</label>
                <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="manager_name">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="typeahead">مدل فروش</label>
                <div class="controls">
             <select name="sell_model">
<option value="1">رسمی</option>
<option value="0">غیر رسمی</option>
            </select>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="typeahead">برند های تحت پوشش</label>
                <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="brand">
                </div>
            </div>



            <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">توضیحات</label>
                <div class="controls">
                    <textarea  id="textarea2" rows="3" name="description"></textarea>
                </div>
            </div>



            <div class="control-group">
                <label class="control-label" for="typeahead">آدرس</label>
                <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="address">
                </div>
            </div>









            <span class="btn-danger" style="padding: 3px;" onclick="addFilter()">افزودن شماره تلفن</span><br><br>
            <div id="filters_holder">

                <input name="name[0]" type="text" style="margin-left: 10px;" placeholder="نام و سمت شخص">
                <input name="phone[0]" type="text" style="margin-left: 10px;" placeholder="شماره تلفن">
            </div>









            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
</fieldset>
    </form>


        @if($errors->any())
            <ul>
                @foreach($errors->all() as $e)
                    <li>
                        {{$e}}
                    </li>
                    @endforeach
            </ul>
        @endif
    </div>





    <script>
        function addFilter(){
            var count=document.getElementsByClassName("divi").length+1;
            var txt='<div style=" height: 30px; margin: 10px 0;" class="divi">' +
                '<input name="name['+count+']" type="text" style="margin-left: 10px;" placeholder="نام و سمت شخص">' +
                '<input name="phone['+count+']" type="text" style="margin-left: 10px;" placeholder="شماره تلفن">' +
                '</div>';
            $("#filters_holder").append(txt);
        }
    </script>









@endsection

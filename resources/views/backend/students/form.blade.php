<div class="box-body">
    <div class="form-group">
         {{ Form::label('first_name', 'First Name', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('first_name', null, ['class' => 'form-control box-size', 'placeholder' => 'First Name', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div>
    <div class="form-group">
         {{ Form::label('last_name', 'Last Name', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('last_name', null, ['class' => 'form-control box-size', 'placeholder' => 'Last Name', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div>
    <div class="form-group">
         {{ Form::label('gender', 'Gender', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::radio('gender', 'male', true) }} Male
            {{ Form::radio('gender', 'female') }} Female
        </div><!--col-lg-10-->
    </div>
    <div class="form-group">
         {{ Form::label('hobbies', 'Hobbies', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
          {{  Form::textarea('hobbies',null,['class'=>'col-lg-2 control-label required form-control', 'placeholder' => 'Hobbies', 'rows' => 2, 'cols' => 40]) }}
        </div><!--col-lg-10-->
    </div>
    <div class="form-group">
         {{ Form::label('profile_picture', 'Profile Picture', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
          {{  Form::file('profile_picture') }}
        </div><!--col-lg-10-->
    </div>
    <div class="form-group">
         {{ Form::label('standard', 'Standard', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
          {{ Form::select('standard',$standard, null) }}
        </div><!--col-lg-10-->
    </div>
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
<div class="box-body">
    <div class="form-group">
         {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => 'Name', 'required' => 'required']) }}

        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
            {{ Form::label('status', 'Status', ['class' => 'col-lg-2 control-label required']) }}
         <div class="col-lg-10">
           @if(isset($standards->status) && !empty ($standards->status))
                {{ Form::checkbox('status', 1, true) }}
            @else
                {{ Form::checkbox('status', 1, false) }}
            @endif
        </div>
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

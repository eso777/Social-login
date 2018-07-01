<div class="row">
    <div class="col-lg-12">
        <br>
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Title</label>
            <div class="col-md-12">
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
        </div>

        @if($type == 'edit')
            <div class="col-md-12">
                <img src="{{$topic->image}}" class="img-thumbnail img-rounded img-responsive" alt="Current image" width="150" height="150">
            </div>
        @endif

        <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label"> Image </label>
        <div class="col-md-12">
                <div class="input-group">
                    {!! Form::file('img',['class' => 'form-control']) !!}
                </div>
                <small class="text-info">Available Ext. [ jpeg , png , jpg ]</small> |
                <small class="text-info">MAX FILE UPLOAD 2MB </small>
                <small class="text-danger">{{ $errors->first('img')  }}</small>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <button class='btn btn-primary'>
                    Save Data
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </div>
</div>

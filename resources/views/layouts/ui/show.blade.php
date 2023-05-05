<div class="form-group col-md-{{ isset($colsize) ? $colsize : 6 }} row">
    <label class="col-sm-4 col-form-label">{{$name}}</label>
    <div class="col-sm-8">
        <input class="form-control" type="text" value="{{ $value }}" readonly >
    </div>
</div>

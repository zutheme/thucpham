 <div class="form-group row">
  <label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục tag<span class="text-danger">*</span></label>
  <div class="col-lg-12">
      <select class="form-control cus-drop" name="sel_idcat_main_tag" required>
        <option value="0">--Tất cả--</option>
        @foreach($rs_catetag as $row)
           <option value="{{ $row['idcategory'] }}">{{ $row['namecat'] }}</option>
        @endforeach        
      </select>
  </div>
</div>
<div class="form-group row">
<div class="col-lg-12">
  <div class="select_dynamic_tag">
      @if(isset($str_tag))
        {!! $str_tag !!}
      @endif
    </div>
  </div>
</div>
<div class="form-group row">
	<label class="control-label col-md-12 col-sm-12 ">Chọn Thẻ</label>
	<div class="col-md-12 col-sm-12">
		<div class="tagclound"></div>
	</div>
</div>
<div class="control-group row">
	<label class="control-label col-md-12 col-sm-12 ">Thẻ tag</label>
	<div class="col-md-12 col-sm-12 ">
		<div class="tags">
			@foreach($rs_tags as $row)
				<span class="tag"><span>{{ $row->nametag }}&nbsp;&nbsp;</span><a onclick="removingtag(this)" idtag={{ $row->idtag }} idproduct={{ $idparent }} href="javascript:void(0);">x</a></span>
			@endforeach
		</div>
	</div>
</div>
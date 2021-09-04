<div class="form-group row">
	<label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục chính<span class="text-danger">*</span></label>
	<div class="col-lg-12">
		<select class="form-control cus-drop" name="sel_idcat_main_cate" required>
			<option value="0">--Tất cả--</option>
			@foreach($categories as $row)
				 <option value="{{ $row['idcategory'] }}">{{ $row['namecat'] }}</option>
			@endforeach        
		</select>
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-12">
		<div class="select_dynamic_cate">
			@if(isset($str))
				{!! $str !!}
			@endif
		</div>
	</div>
</div>

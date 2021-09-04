 <div class="form-group row">
  <label class="col-lg-4 col-form-label">Điện thoại<span class="required">*</span>
  </label>
  <div class="col-lg-8">
    <input class="form-control " type="number" name="phone" value="" >
  </div>
</div>
 <div class="form-group row">
  <label class="col-lg-4 col-form-label">Họ <span class="required">*</span>
  </label>
  <div class="col-lg-8">
    <input class="form-control " type="text" name="lastname" value="" >
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Tên lót <span class="required">*</span>
  </label>
  <div class="col-lg-8">
    <input class="form-control" type="text" name="middlename" value="">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Tên <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control " type="text" name="firstname" value="">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Giới tính <span class="required">*</span>
    </label>
  <div class="col-lg-8">
    <label>
      <input type="radio" name="sex" value="1"> &nbsp; Nam &nbsp;
    </label>
    <label>
      <input type="radio" name="sex" value="0"> Nữ
    </label>
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Email <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control " type="email" name="email" value="">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Địa chỉ <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control " type="text" name="address" value="">
  </div>
</div>    
<div class="item form-group row">
  <label class="col-lg-4 col-form-label">Ngày sinh <span class="required">*</span>
  </label>
  <div class="col-md-8 col-sm-8 ">
    <input name="birthday" class="date-picker form-control" placeholder="Ngày-Tháng-Năm" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
    <script>
      function timeFunctionLong(input) {
        setTimeout(function() {
          input.type = 'text';
        }, 60000);
      }
    </script>
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">facebookName <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control " type="text" name="facebookName" value="">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">facebookUid <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control" type="text" name="facebookUid" value="">
  </div>
</div>
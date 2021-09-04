 <div class="form-group row">
  <input type="hidden" name="idclient" value="{{ $product[0]['idclient'] }}">
  <label class="col-lg-4 col-form-label">Họ <span class="required">*</span>
  </label>
  <div class="col-lg-8">
    <input class="form-control " type="text" name="lastname" value="{{ $product[0]['lastname'] }}" >
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Tên lót <span class="required">*</span>
  </label>
  <div class="col-lg-8">
    <input class="form-control" type="text" name="middlename" value="{{ $product[0]['middlename'] }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Tên <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control " type="text" name="firstname" value="{{ $product[0]['firstname'] }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Giới tính <span class="required">*</span>
    </label>
  <div class="col-lg-8">
    <label>
      <input type="radio" name="sex" @php echo $product[0]['sex'] == 1 ? "checked='checked'":'' @endphp value="1"> &nbsp; Nam &nbsp;
    </label>
    <label>
      <input type="radio" name="sex" @php echo $product[0]['sex'] == 0 ? "checked='checked'":'' @endphp value="0"> Nữ
    </label>
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Email <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control " type="email" name="email" value="{{ $product[0]['email'] }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Địa chỉ <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control " type="text" name="address" value="{{ $product[0]['address'] }}">
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
    <input class="form-control " type="text" name="facebookName" value="{{ $product[0]['facebookName'] }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">facebookUid <span class="required">*</span></label>
  <div class="col-lg-8">
    <input class="form-control" type="text" name="facebookUid" value="{{ $product[0]['facebookUid'] }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-4 col-form-label">Trạng thái khóa <span class="required">*</span></label>
  <div class="col-lg-8">
    <select class="form-control cus-drop" name="sel_idstatuslock" >
          <option value="0" @php echo $product[0]['idstatuslock'] == 0 ? "selected='selected'":'' @endphp >Mở khóa</option>
          <option value="1" @php echo $product[0]['idstatuslock'] == 1 ? "selected='selected'":'' @endphp >Đóng khóa</option>        
        </select>
  </div>
</div>
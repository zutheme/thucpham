{{-- <a class="btn-popup" href="javascript:void(0)">popup</a> --}}
{{-- <div class="htz-popup-api" style="display: none;">
      <div class="main-content">
        	<div class="header">
           		<label>Đăng ký tư vấn</label> 
            	<a href="javascript:void(0)" class="close">&times;</a>
        	</div>   
            <form class="form-control">
            	<input type="text" name="spreadsheetid" value="" class="input-control">
                <input type="text" name="name" class="input-control" placeholder="Họ và tên*" required> 
                <input type="tel" name="phone" class="input-control" placeholder="Số điện thoại*" required> 
                <div class="form-btn">  
                    <button type="button" class="btn btn-register-api">Xác nhận</button> 
                </div>                                                            
            </form>
      </div>
</div> --}}
<div class="htz-popup-processing" style="display: none; position: fixed; z-index: 1010;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.1); ">
      <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.6);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
        <p><img id="loading" class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="https://w.ladicdn.com/5f058e2ae09476169a27436d/spinner-20210324042949.gif"></p>
        <p class="result" style="font-weight: 500;font-size: 28px;"></p>
        <p><img class="checked-img" style="display: none;width: 60px;margin-right: auto;margin-left: auto;padding:5px; " src="https://w.ladicdn.com/s250x250/5f058e2ae09476169a27436d/checked-20210402062850.jpg"></p>
      </div>
</div>

<style type="text/css">
	.btn-area {
		position: relative;
		width: 100%;
		margin: 15px auto;
		text-align: center;
	}
	.btn-popup {
		position: relative;
		font-size: 16px;
		font-weight: 500;
		background: #4ba355;
		color: #fff;
		padding: 5px 15px;
		border: 1px solid #80c984;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	.htz-popup-api {
		position: fixed; 
		z-index: 1010;
		left: 0;
		top: 0%;
		width: 100%; 
		height: 100%; 
		overflow: auto; 
		background-color: rgba(0,0,0,0.1);
	}
	.htz-popup-api .main-content {
		background: #ffffff;
		max-width:500px;
		color: #000;
		position: relative;
		margin-left: auto;
		margin-right: auto;
		margin-top: 15%;
		z-index: 1000;
		padding: 15px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	.htz-popup-api .main-content .form-control .input-control {
		padding: 5px;
		margin: 5px;
		width: 100%;
	}
	
	.htz-popup-api .main-content .form-control .form-btn {
		text-align: center;
	}
	.htz-popup-api .main-content .form-control .form-btn .btn {
		padding: 5px 15px;
		font-size: 16px;
		font-weight: 500;
		border: none;
	}
	.htz-popup-api .main-content .form-control .form-btn .btn.btn-register-api{
		color: #ffffff;
		background: #4ba355;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		border: 1px solid #80c984; 
	}
	
	.htz-popup-api .main-content .header {
		text-align: center;
		padding: 10px 5px;
	}
	.htz-popup-api .main-content .header label {
		font-size: 18px;
		font-weight: 500;
		text-transform: uppercase;
	}
	.htz-popup-api .main-content .header .close {
		position: absolute;
		top: -15px;
		right: -15px;
		padding: 1px 5px;
		left: auto;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
		background: #000;
		color: #fff;
		font-size: 1em;
		cursor: pointer;
	}
	/*form embeb*/
	.form-embeb {
		position: relative;
		width: 100%;
		margin: 0px auto;
	}
	.form-embeb .main-content {
		background: #ffffff;
		max-width:500px;
		color: #000;
		position: relative;
		margin-left: auto;
		margin-right: auto;
		margin-top: 0%;
		z-index: 1000;
		padding: 15px;
		border: 1px solid #ddd;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	.form-embeb .main-content .form-control .input-control {
		padding: 5px;
		margin: 5px;
		width: 100%;
	}
	.form-embeb .main-content .form-control .form-btn {
		text-align: center;
	}
	.form-embeb .main-content .form-control .form-btn .btn {
		padding: 5px 15px;
		font-size: 16px;
		font-weight: 500;
		border: none;
	}
	.form-embeb .main-content .form-control .form-btn .btn.btn-register-api{
		color: #ffffff;
		background: #4ba355;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		border: 1px solid #80c984; 
	}
	
	.form-embeb .main-content .form-embeb .main-content .header {
		text-align: center;
		padding: 10px 5px;
	}
	.form-embeb .main-content .form-embeb .main-content .header label {
		font-size: 18px;
		font-weight: 500;
		text-transform: uppercase;
	}
	.form-embeb .main-content .form-control input,
	.form-embeb .main-content .form-control textarea {
		font-size: 15px;
		font-weight: 400;
		color: #333;
	}
	.form-embeb .main-content .form-control input::placeholder,
	.form-embeb .main-content .form-control textarea::placeholder {
		font-size: 15px;
		font-weight: 300;
		color: rgba(0,0,0,0.5);
	}
	.main-content .form-control textarea {
		border: 1px solid #e1e1e1;
	    width: 100%;
	    max-width: 100%;
	    height: 100px;
	    min-height: 100px;
	}
	/*end form embed*/
</style>
<script type='text/javascript' src='{{ asset('public/ladipage/js/crm.js?ver=0.0.3') }}'></script>
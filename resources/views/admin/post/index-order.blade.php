 <div class="col-md-12 col-sm-12 col-xs-12">

      <div class="x_panel">

          <div class="x_title">

              @if(isset($errors))

                {{ $errors }}

              @endif

               @if($message = Session::get('error'))

                    <h2 class="card-subtitle">{{ $message }}</h2>

               @endif

              <ul class="nav navbar-right panel_toolbox">

                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                </li>

                <li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                  {{-- <ul class="dropdown-menu" role="menu">

                    <li><a href="#">Settings 1</a>

                    </li>

                    <li><a href="#">Settings 2</a>

                    </li>

                  </ul>  --}}      

                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>

                </li>

              </ul>

              <div class="clearfix"></div>

            </div>

            <div class="x_title">

             <form method="post" action="{{  url('/admin/latestpostbytype/'.$posttype) }}">
                {{ csrf_field() }}
                <input type="hidden" name="filter" value="1">
                <div class="row">
                      <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">
                          <div class="row x_title">
                            <div class="col-md-6">
                              <div class="col-md-6 xdisplay_inputx form-group row has-feedback">
                                <input type="text" class="form-control has-feedback-left _start_date" name="_start_date" id="single_cal1" placeholder="" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
							  <div class="col-md-6 xdisplay_inputx form-group row has-feedback">
                                <input type="text" class="form-control has-feedback-left _end_date" name="_end_date" id="single_cal2" placeholder="" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="fa fa-calendar"></i>
                                <span>December 30, 2020 - January 28, 2021</span> <b class="caret"></b>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 text-center">
                    <div class="form-group">        
                          <select class="form-control cus-drop" name="sel_idcat_main" required>
                            <option value="0">--Tất cả--</option>
                            @foreach($categories as $row)
                               <option value="{{ $row['idcategory'] }}">{{ $row['namecat'] }}</option>
                            @endforeach        
                          </select>
                       
                        <div class="select_dynamic">
                          @if(isset($str))
                            {!! $str !!}
                          @endif
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                        @if(isset($post_types))
                          <select class="form-control sel-control" name="sel_id_post_type" required="true">

                            <option value="0" {{ $_id_post_type_sl == 0 ? 'selected="selected"' : '' }}>Kiểu post</option>

                            @foreach($post_types as $row)

                              <option value="{{ $row['idposttype'] }}" {{ $row['idposttype'] == $_id_post_type_sl ? 'selected="selected"' : '' }}>{{ $row['nametype'] }}</option>

                            @endforeach

                          </select> 

                        @endif
                     
                    </div>
                  </div> 
                  <div class="col-sm-2 text-center">
                    <div class="form-group">
                        @if(isset($statustypes))
                          <select class="form-control sel-control" name="sel_id_status" required="true">

                            <option value="0" {{ $_id_status_type == 0 ? 'selected="selected"' : '' }}>Tất cả</option>

                            @foreach($statustypes as $row)

                              <option value="{{ $row['id_status_type'] }}" {{ $row['id_status_type'] == $_id_status_type ? 'selected="selected"' : '' }}>{{ $row['name_status_type'] }}</option>

                            @endforeach

                          </select> 

                        @endif
                    </div>
                  </div>
                   <div class="col-sm-2 text-center">
                        @if(isset($rs_store))
                          <select class="form-control sel-control" name="sel_id_store" required="true">

                            <option value="0" {{ $_id_store == 0 ? 'selected="selected"' : '' }}>Tất cả</option>

                            @foreach($rs_store as $row)

                              <option value="{{ $row['idcategory'] }}" {{ $row['idcategory'] == $_id_store ? 'selected="selected"' : '' }}>{{ $row['namecat'] }}</option>

                            @endforeach

                          </select> 

                        @endif
                  </div>
                  <div class="col-sm-2 text-center">
                    <div class="form-group">
                        @if(isset($rs_status_process))
                          <select class="form-control cus-drop" name="sel_statusprocess" required >
								<option value="">Trạng thái xử lý</option>
								@foreach($rs_status_process as $row)
									 <option value="{{ $row['id_status_type'] }}" >{{ $row['name_status_type'] }}</option>
								@endforeach        
							</select> 

                        @endif
                    </div>
                  </div>
              </div>
              
			    <div class="row">
                  <div class="col-sm-3 text-left">
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
                                {!! $str !!}
                              @endif
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3 text-left">       
                      <div class="form-group row">
                        <label class="col-lg-12 col-form-label">Chọn Thẻ</label>
                        <div class="col-lg-12">
                          <div class="tagclound"></div>
                        </div>
                      </div>
                      {{-- <div class="control-group row">
                        <label class="control-label col-md-12 col-sm-12 ">Thẻ tag</label>
                        <div class="col-md-12 col-sm-12 ">
                          <div class="tags">
                            @foreach($rs_tags as $row)
                              <span class="tag"><span>{{ $row->nametag }}&nbsp;&nbsp;</span><a onclick="removingtag(this)" idtag={{ $row->idtag }} idproduct={{ $idproduct }} href="javascript:void(0);">x</a></span>
                            @endforeach
                          </div> 
                        </div>
                      </div>--}}
                    
                  </div>
				  
                  <div class="col-sm-4 text-left">
                    {{-- <div class="control-group row">
                      <label class="control-label col-md-3 col-sm-3 ">Input Tags</label>
                      <div class="col-md-9 col-sm-9 ">
                        <input id="tags_1" type="text" class="tags form-control" value="" />
                        <input id="tags_2" type="hidden" name="lst_idtag" value="" />
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div> --}}
                  </div>
			</div>
			<div class="row">
                  <div class="col-sm-12 text-center">
                    <div class="form-group">
                     <input type="submit" class="btn btn-default btn-filter-date" name="filter-date" value="Áp dụng" />&nbsp;&nbsp;
                      <a class="btn btn-default btn-primary" href="{{ action('Admin\PostsController@create',['idposttype'=>22]) }}">Tạo mới</a>
                    </div>
                  </div>
              </div>
              </form>
              <div class="clearfix"></div>
            </div>

              <div class="x_content">

                <p class="text-muted font-13 m-b-30"></p>
           
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 

                <thead>

                   <tr>
                        <th>ID</th>
                        <th>Ngày</th>
                        <th>Kiểu phiếu</th>
                        <td>Trạng thái</td>
                        <th>Giải quyết</th>
                        <th>Điều hướng</th>
						<th>Người dùng</th>
						<th>-</th>
					</tr>

                 </thead>

               <tfoot>

                <tr>
                        <th>ID</th>
                        <th>Ngày</th>
                        <th>Kiểu phiếu</th>
                        <td>Trạng thái</td>
                        <th>Giải quyết</th>
                        <th>Điều hướng</th>
						<th>Người dùng</th>
						<th>-</th>
                </tr>

              </tfoot>

              <tbody>
                @foreach($products as $row)
                <tr>
                  <td>{{ $row['idproduct'] }}</td>
                  <td>{{ $row['created_at'] }}</td>
                  <td>{{ $row['nametype'] }}</td>
                  <td>{{ $row['name_status_type'] }}</td>
                  <td>{{ $row['statusprocess'] }}</td>
				  <td>{{ $row['namedirect'] }}</td>
				  <td>{{ $row['author'] }}</td>
                  <td class="btn-control-action">
                    <a href="{{ action('Admin\PostsController@edit',[$row['idproduct'], 'idposttype' => $row['idposttype'],'idparent' => $row['idparentcross'], 'idcrosstype' => $row['idcrosstype']]) }}" class="info-number"><i class="fa fa-pencil-square"></i></a>
                  </td>    
                </tr>
                @endforeach  
              </tbody>

              </table>

          </div>

        </div>

      </div>

</div>
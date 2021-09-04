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

             <form method="post" action="{{  url('/admin/listpostbytype/'.$posttype) }}">
                {{ csrf_field() }}
                <input type="hidden" name="filter" value="1">
                <input type="hidden" class="form-control _start_date" name="_start_date">
                <input type="hidden" class="form-control _end_date" name="_end_date">
                <div class="row">
                      <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">
                          <div class="row x_title">
                            <div class="col-md-6">
                              <h3>Quản lý tương tác <small></small></h3>
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
                      {{-- <a class="btn btn-default btn-primary" href="{{ URL::route('admin.post.create') }}">Tạo mới</a> --}}
                      <a class="btn btn-default btn-primary" href="{{ action('Admin\PostsController@create',['idposttype'=>$_id_post_type_sl]) }}">Tạo mới</a>
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
                        <th>Điện thoại</th>
                        <td class="interactive">Tương tác</td>
                        <th style="width: 100px !important;">Số tương tác</th>
                        <th>-</th>

                     </tr>

                 </thead>

               <tfoot>

                <tr>
                      <th>ID</th>
                      <th>Ngày</th>
                      <th>Điện thoại</th>
                      <td class="interactive">Tương tác</td>
                      <th style="width: 100px !important;">Số tương tác</th>
                      <th>-</th>

                   </tr>

                   </tr>

              </tfoot>

              <tbody>
                @foreach($products as $row)
                <tr>
                  <td>{{ $row['idproduct'] }}</td>
                  <td>{{ $row['created_at'] }}</td>
                  <td>{{ $row['phone'] }}</td>
                  <td class="interactive">
                     <span class="interactive">
                        <ul class="icon">
                          @foreach($sel_cross_type as $rows)
              							{{-- @if($rows['idposttype'] == 4)
              								<li><a sip = "330" phone = "{{ $row['namepro'] }}" idposttype = "{{ $rows['idposttype'] }}" idparent = "{{ $row['idproduct'] }}" idcrosstype = "6"  href="javascript:void(0)" class="btn-icon btn-create-new btn-phone">{!! $rows['icon'] !!}</a></li> 
              							@else --}}
              								<li><a href="{{ action('Admin\PostsController@create',['idposttype' => $rows['idposttype'], 'idparent' => $row['idproduct'],'idcrosstype' => 6]) }}" class="btn-icon btn-create-new">{!! $rows['icon'] !!}</a></li> 
              							{{-- @endif --}}
							
                          @endforeach 
                        </ul>
                      </span> 
                  </td>
                  <td class="tdbreak" style="width: 100px !important;">{{ $row['count_int'] }}</td>
                  <td class="btn-control-action">
                    <input type="hidden" name="idpost_row" value="{{ $row['idproduct'] }}">
                   <a href="{{ action('Admin\PostsController@edit',$row['idproduct']) }}" class="info-number"><i class="fa fa-pencil-square"></i></a>
                   {{-- <a href="{{ url('admin/post/editbycattype/'.$row['idproduct'].'/'.$_namecattype.'/'.$_id_post_type) }}" class="info-number"><i class="fa fa-pencil-square"></i></a> --}}
                  </td>    
                </tr>
                @endforeach  
              </tbody>

              </table>

          </div>

        </div>

      </div>

</div>
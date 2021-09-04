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

             {{-- <form method="post" action="{{ url('/admin/products/listproductsbydate/'.$_idcategory.'/'.$_id_post_type.'/'.$_id_status_type) }}"> --}}
             
             <form method="post" action="{{  url('/admin/listpostbytype/'.$posttype) }}">
                {{ csrf_field() }}
                <input type="hidden" name="filter" value="1">
                <div class="col-sm-2">

                  <div class="form-group">

                      <div class="input-group sel-control" id="myDatepicker1">

                          <input type="text" class="form-control _start_date" name="_start_date">

                          <span class="input-group-addon">

                             <span class="glyphicon glyphicon-calendar"></span>

                          </span>

                      </div>

                  </div>

                </div>

                <div class="col-sm-2">

                  <div class="form-group">

                      <div class="input-group sel-control" id="myDatepicker2">

                          <input type="text" class="form-control _end_date" name="_end_date">

                          <span class="input-group-addon">

                             <span class="glyphicon glyphicon-calendar"></span>

                          </span>

                      </div>

                  </div>

                </div>
                <div class="col-sm-4 text-center">
                  <div class="form-group">
                  {{-- <label class="control-label col-xs-12">Chuyên mục</label> --}} 
                 <div class="col-xs-12"> 
                    <div class="form-group row">
                      
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
                </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    {{-- <label class="control-label col-xs-12">Kiểu post</label> --}}
                    <div class="col-xs-12">
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
                </div> 
                <div class="col-sm-2 text-center">
                  <div class="form-group">
                    {{-- <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label> --}}
                    <div class="col-xs-12">
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
                 <div class="col-sm-6 text-right">
                    <div class="col-sm-8">
                       <div class="form-group">
                        {{-- <label class="control-label col-xs-12">store</label> --}}
                          @if(isset($rs_store))
                            <select class="form-control sel-control" name="sel_id_store" required="true">

                              <option value="0" {{ $_id_store == 0 ? 'selected="selected"' : '' }}>Tất cả</option>

                              @foreach($rs_store as $row)

                                <option value="{{ $row['idcategory'] }}" {{ $row['idcategory'] == $_id_store ? 'selected="selected"' : '' }}>{{ $row['namecat'] }}</option>

                              @endforeach

                            </select> 

                          @endif
                    </div>
                  </div>
                </div>
                  <div class="col-sm-6 text-right">
                  <div class="form-group">
                   <input type="submit" class="btn btn-default btn-filter-date" name="filter-date" value="Áp dụng" />&nbsp;&nbsp;
                    {{-- <a class="btn btn-default btn-primary" href="{{ URL::route('admin.post.create') }}">Tạo mới</a> --}}
                    <a class="btn btn-default btn-primary" href="{{ action('Admin\PostsController@create',['idposttype'=>$_id_post_type_sl]) }}">Tạo mới</a>
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
                        <th style="width: 100px !important;">Url</th>
                        <th>-</th>

                     </tr>

                 </thead>

               <tfoot>

                <tr>
                      <th>ID</th>
                      <th>Ngày</th>
                      <th>Điện thoại</th>
                      <td class="interactive">Tương tác</td>
                      <th style="width: 100px !important;">Url</th>
                      <th>-</th>

                   </tr>

                   </tr>

              </tfoot>

              <tbody>
                @foreach($products as $row)
                <tr>
                  <td>{{ $row['idproduct'] }}</td>
                  <td>{{ $row['created_at'] }}</td>
                  <td>{{ $row['namepro'] }}</td>
                  <td class="interactive">
                     <span class="interactive">
                        <ul class="icon">
                          @foreach($sel_cross_type as $rows)
                          <li><a href="{{ action('Admin\PostsController@create',['idposttype' => $rows['idposttype'], 'idparent' => $row['idproduct'],'idcrosstype' => 6]) }}" class="btn btn-default btn-create-new">{!! $rows['icon'] !!}</a></li> 
                          @endforeach 
                        </ul>
                      </span> 
                  </td>
                  <td class="tdbreak" style="width: 100px !important;">{{ $row['listcat'] }}</td>
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
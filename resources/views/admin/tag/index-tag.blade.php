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

            
  
             <form method="post" action="{{  url('/admin/tag') }}">
                {{ csrf_field() }}
                <div class="row">
                      <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">
                          <div class="row x_title">
                            <div class="col-md-3">
                                <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control _start_date" name="_start_date" value="{{ $_start_date_sl }}">
                                    {{-- <input class="form-control" class='date' type="date" name="_start_date" required='required'> --}}
                                </div>
                                <div class="col-md-6 col-sm-6">
                                   {{--  <input class="form-control" class='time' type="time" name="time1" required='required'> --}}
                                  </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control _end_date" name="_end_date" value="{{ $_end_date_sl }}">
                                   {{--  <input class="form-control _end_date" class='date' type="date" name="_end_date" required='required'> --}}
                                 </div>                       
                                <div class="col-md-6 col-sm-6">
                                    {{-- <input class="form-control" class='time' type="time" name="time2" required='required'> --}}
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
                        
                  </div>
                  <div class="col-sm-2 text-center">
                  <div class="form-group">
                   <input type="submit" class="btn btn-default btn-filter-date" name="filter-date" value="Áp dụng" />&nbsp;&nbsp;
                    
                    <a class="btn btn-default btn-primary" href="{{ action('Admin\TagController@create') }}">Tạo mới</a>
                  </div>
                </div>
              </div>
              </form>
              <div class="clearfix"></div>
            </div>

              <div class="x_content">

                <p class="text-muted font-13 m-b-30"></p>
                  <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thẻ</th>
                            <th>Chuyên mục</th>
                            <th>-</th>
                            <th>-</th>
                         </tr>
                     </thead>
                     <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Thẻ</th>
                            <th>Chuyên mục</th>
                            <th>-</th>
                            <th>-</th>
                         </tr>
                    </tfoot>

                    <tbody>
                      @foreach($products as $row)
                        <tr>
                         <td>{{ $row['idtag'] }}</td>
                         <td>{{ $row['nametag'] }}</td>
                         <td>{{ $row['namecat'] }}</td>
                         <td class="btn-control">
                           
                            <button type="button" class="btn btn-danger btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                          
                         </td>
                         <td>
                          <a href="{{ url('admin/tag/'.$row['idtag'].'/edit') }}" class="info-number"><i class="fa fa-pencil-square"></i></a> 
                        </td> 
                        </tr>
                      @endforeach 
                    </tbody>
              </table>
          </div>

        </div>

      </div>

</div>
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
                  <div class="col-sm-8 text-center">
                    <div class="form-group">        
                          <select class="form-control cus-drop" name="sel_idcat_main" required>
                            <option value="0">--T???t c???--</option>
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

                            <option value="0" {{ $_id_post_type_sl == 0 ? 'selected="selected"' : '' }}>Ki???u post</option>

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

                            <option value="0" {{ $_id_status_type == 0 ? 'selected="selected"' : '' }}>T???t c???</option>

                            @foreach($statustypes as $row)

                              <option value="{{ $row['id_status_type'] }}" {{ $row['id_status_type'] == $_id_status_type ? 'selected="selected"' : '' }}>{{ $row['name_status_type'] }}</option>

                            @endforeach

                          </select> 

                        @endif
                    </div>
                  </div>
                   
                  
              </div>
				<div class="row">
                  <div class="col-sm-12 text-center">
                  <div class="form-group">
                   <input type="submit" class="btn btn-default btn-filter-date" name="filter-date" value="??p d???ng" />&nbsp;&nbsp;
                    <a class="btn btn-default btn-primary" href="{{ action('Admin\PostsController@create',['idposttype'=>$_id_post_type_sl]) }}">T???o m???i</a>
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
                      <td>ID</td>
                      <th>Ng??y</th>
                      <th>T??n s???n ph???m</th>
                      <th>Gi??</th>
                      <th>S??? l?????ng</th>
                      <th>Ng?????i ????ng</th>
                      <th>Chuy??n m???c</th>
                      <th>H??nh ???nh</th>
                      <th>-</th>

                   </tr>

               </thead>

               <tfoot>

                <tr>
                      <th>ID</th>
                      <th>Ng??y</th>
                      <th>T??n s???n ph???m</th>
                      <th>Gi??</th>
                      <th>S??? l?????ng</th>
                      <th>Ng?????i ????ng</th>
                      <th>Chuy??n m???c</th>
                      <th>H??nh ???nh</th>
                      <th>-</th>

                   </tr>

              </tfoot>

              <tbody>
                @foreach($products as $row)
                <tr>
                  <td>{{ $row['idproduct'] }}</td>
                  <td>{{ $row['created_at'] }}</td>
                  <td class="title">{{ $row['namepro'] }}</td>
                  <td><span class="currency">{{ $row['price'] }}</span></td>
                  <td>{{ $row['amount'] }}</td>
                  <td>{{ $row['author'] }}</td>
                  <td>{{ $row['listcat'] }}</td>
                  @if(!isset($row['urlfile']))
                    <td><img class="thumb" src="{{ asset('assets-tea/images/no_photo.jpg') }}"></td>
                  @endif
                  @if(isset($row['urlfile']))
                    <td><img class="thumb" src="{{ asset($row['urlfile']) }}"></td>
                  @endif
                  <td class="btn-control-action">
                    <input type="hidden" name="idpost_row" value="{{ $row['idproduct'] }}">
                   <a href="{{ action('Admin\PostsController@edit',$row['idproduct']) }}" class="info-number"><i class="fa fa-pencil-square"></i></a>
                  </td>    
                </tr>
                @endforeach  
              </tbody>

              </table>

          </div>

        </div>

      </div>

</div>
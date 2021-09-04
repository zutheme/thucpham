<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Hoạt động</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Điện thoại</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">SMS</a>
    </li>
     <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Email</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Đặt lịch</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab6" data-toggle="tab" aria-expanded="false">Scan</a>
    </li>
	<li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab7" data-toggle="tab" aria-expanded="false">Tư vấn</a>
    </li>
	<li role="presentation" class=""><a href="#tab_content8" role="tab" id="profile-tab8" data-toggle="tab" aria-expanded="false">Báo cáo</a>
    </li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

      <!-- start recent activity -->
      <ul class="messages">
         @foreach($sel_cross_byidproduct as $row)
            <li>
            <img src="{{ asset($row['url_avatar']) }}" class="avatar" alt="Avatar">
            <div class="message_date">
             {{--  <h3 class="date text-info">24</h3> --}}
              <p class="month">{{ $row['created_at'] }}</p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading">{{ $row['firstname'] }}</h4>
              <blockquote class="message" style="word-wrap: break-word">{!! $row['description'] !!}</blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#">{!! $row['icon'] !!}</i> {{ $row['nametype'] }}</a>
              </p>
            </div>
          </li>                
              
        @endforeach
      </ul>
      <!-- end recent activity -->

    </div>

    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab2">
      <!-- start recent activity -->
      <ul class="messages">
         @foreach($rs_phone as $row)
            <li>
            <img src="{{ asset($row['url_avatar']) }}" class="avatar" alt="Avatar">
            <div class="message_date">
             {{--  <h3 class="date text-info">24</h3> --}}
              <p class="month">{{ $row['created_at'] }}</p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading">{{ $row['firstname'] }}</h4>
              <blockquote class="message" style="word-wrap: break-word">{!! $row['description'] !!}</blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#">{!! $row['icon'] !!}</i> {{ $row['nametype'] }}</a>
              </p>
            </div>
          </li>                
              
        @endforeach
      </ul>
      <!-- end recent activity -->
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab3">
      <!-- start recent activity -->
      <ul class="messages">
         @foreach($rs_sms as $row)
            <li>
            <img src="{{ asset($row['url_avatar']) }}" class="avatar" alt="Avatar">
            <div class="message_date">
             {{--  <h3 class="date text-info">24</h3> --}}
              <p class="month">{{ $row['created_at'] }}</p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading">{{ $row['firstname'] }}</h4>
              <blockquote class="message" style="word-wrap: break-word">{!! $row['description'] !!}</blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#">{!! $row['icon'] !!}</i> {{ $row['nametype'] }}</a>
              </p>
            </div>
          </li>                
              
        @endforeach
      </ul>
      <!-- end recent activity -->
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab4">
      <!-- start recent activity -->
      <ul class="messages">
         @foreach($rs_email as $row)
            <li>
            <img src="{{ asset($row['url_avatar']) }}" class="avatar" alt="Avatar">
            <div class="message_date">
             {{--  <h3 class="date text-info">24</h3> --}}
              <p class="month">{{ $row['created_at'] }}</p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading">{{ $row['firstname'] }}</h4>
              <blockquote class="message" style="word-wrap: break-word">{!! $row['description'] !!}</blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#">{!! $row['icon'] !!}</i> {{ $row['nametype'] }}</a>
              </p>
            </div>
          </li>                
              
        @endforeach
      </ul>
      <!-- end recent activity -->
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab5">
     <!-- start recent activity -->
      <ul class="messages">
         @foreach($rs_booking as $row)
            <li>
            <img src="{{ asset($row['url_avatar']) }}" class="avatar" alt="Avatar">
            <div class="message_date">
             {{--  <h3 class="date text-info">24</h3> --}}
              <p class="month">{{ $row['created_at'] }}</p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading">{{ $row['firstname'] }}</h4>
              <blockquote class="message" style="word-wrap: break-word">{!! $row['description'] !!}</blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#">{!! $row['icon'] !!}</i> {{ $row['nametype'] }}</a>
              </p>
            </div>
          </li>                
              
        @endforeach
      </ul>
      <!-- end recent activity -->
    </div>
	<div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab6">
     <!-- start recent activity -->
      <ul class="messages">
         @foreach($rs_scan as $row)
            <li>
            <img src="{{ asset($row['url_avatar']) }}" class="avatar" alt="Avatar">
            <div class="message_date">
             {{--  <h3 class="date text-info">24</h3> --}}
              <p class="month">{{ $row['created_at'] }}</p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading">{{ $row['firstname'] }}</h4>
              <blockquote class="message" style="word-wrap: break-word">{!! $row['description'] !!}</blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#">{!! $row['icon'] !!}</i> {{ $row['nametype'] }}</a>
              </p>
            </div>
          </li>                
              
        @endforeach
      </ul>
      <!-- end recent activity -->
    </div>
	<div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab7">

      <!-- start recent activity -->
      <ul class="messages">
         @foreach($rs_consultant as $row)
            <li>
            <img src="{{ asset($row['url_avatar']) }}" class="avatar" alt="Avatar">
            <div class="message_date">
             {{--  <h3 class="date text-info">24</h3> --}}
              <p class="month">{{ $row['created_at'] }}</p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading">{{ $row['firstname'] }}</h4>
              <blockquote class="message" style="word-wrap: break-word">{!! $row['description'] !!}</blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#">{!! $row['icon'] !!}</i> {{ $row['nametype'] }}</a>
              </p>
            </div>
          </li>                
              
        @endforeach
      </ul>
      <!-- end recent activity -->

    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="profile-tab8">

      <!-- start user projects -->
      <table class="data table table-striped no-margin">
        <thead>
          <tr>
            <th>#</th>
            <th>Tương tác</th>
            <th>Số lượng</th>
            <th class="hidden-phone">Đã nhận</th>
            <th>Chưa nhận</th>
          </tr>
        </thead>
        <tbody>
          <?php $order = 1; ?>
          @foreach($rs_report as $row)
            <tr>
            <td>{{ $order }}</td>
            <td>{{ $row['nametype'] }}</td>
            <td>{{ $row['counttype'] }}</td>
            <td>0</td>
            <td>0</td>
          </tr>
          <?php $order++; ?>
          @endforeach
          
        </tbody>
      </table>
      <!-- end user projects -->

    </div>
  </div>
</div>
 {{-- <td class="vertical-align-mid">
    <div class="progress">
      <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
    </div>
  </td> --}}
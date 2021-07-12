<div class="container">
  
        <div class="row">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu" >
                    <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i>البروفايل</a></li>
                    <li><a href="" data-target-id="profile2"><i class="fa fa-map-marker"></i>الموقع</a></li>
                </ul>
            </div>

            <div class="col-md-8  admin-content" id="profile">

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">الصورة</h3>

                    </div>
                    <div class="panel-body">
                        <img style="width:150px; margin-top:5px;"  class='img-thumbnail' src='{{asset('uploads/images/users/'.$user->img)}}' />                       
                    </div>
                </div>

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">الاسم</h3>
                    </div>
                    <div class="panel-body">
                    {{ $user->name ??'لا يوجد بيانات لعرضها'  }}
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">الايميل </h3>
                    </div>
                    <div class="panel-body">
                    {{ $user->email ??'لا يوجد بيانات لعرضها'  }}
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">رقم الجوال</h3>

                    </div>
                    <div class="panel-body">
                    {{ $user->phone ??'لا يوجد بيانات لعرضها'  }}
                    </div>
                </div>

                 <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">نوع المستخدم</h3>

                    </div>
                    <div class="panel-body">
                        @if ($user->type == 'student')
                        طالب
                        
                        @elseif( $user->type == 'admin' )
                        ادمن 

                        @else
                        سائق

                        @endif
                    </div>
                </div>

            </div>
      
            <div class="col-md-8  admin-content" id="profile2">
             
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">العنوان</h3>
                    </div>
                    <div class="panel-body">
                       {{ $user->address ??'لا يوجد بيانات لعرضها'  }}
                    </div>
                </div>

                  
                  <div class="panel panel-info" style="margin: 1em;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><label  class="control-label panel-title">  الموقع </label></h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-10">
                                     
                                        <input id="locationInput" name="location" type="hidden" value="{{json_encode($user->location)}}" name="location" />
                                        <div class="map" id="map" style=" width: 90%;height:150px;"></div>

                                    </div>
                                </div>

                            </div>
                        </div>

                <div class="panel panel-info" style="margin: 1em;">  
                    <div class="panel-body">
                    <a href="{{ route('users.index') }}" class="btn btn-default">رجوع</a>
                    </div>
                </div>
               
                

            </div>


        </div>
</div>


@push('scripts')
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
      $(document).ready(function()
      {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');
        allWellsExceptFirst.hide();
        navItems.click(function(e)
        {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');
            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
        });
    </script>


    <script>

        function GoogleMapsDemo (){
            console.log('init map');
            
               var location = {lat: 23.8859, lng: 45.0792};
              @if (!(\Request::is('users/create')))
               var location ={ lat:{{ json_decode($user->location)->lat??' 23.8859' }}, lng: {{ json_decode($user->location)->lng??'45.0792' }} };
              @endif 
            // create map
            // "map" is the id of the div that contain map(above)

            var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 6
            });

            //create marker
            var marker = new google.maps.Marker({
                position: location,
                map: map ,
                animation: google.maps.Animation.BOUNCE,
                draggable: true,
            });

        }
    </script>
    <script src="//maps.google.com/maps/api/js?key={{env('Google_MAP_API_Key', 'AIzaSyAPceSsErOlOqRVJ7qIb2ZnbKTPnXb4uP0')}}&callback=GoogleMapsDemo" type="text/javascript"></script>
@endpush
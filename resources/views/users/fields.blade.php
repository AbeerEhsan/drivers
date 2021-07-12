<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'الاسم:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'رقم الجوال:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', 'الايميل:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('الصورة', 'Img:') !!}
    {!! Form::text('img', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Type Field -->



<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'العنوان:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'الموقع:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Email Field -->

<!-- Email Verified At Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush --}}

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'كلمة المرور:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('type', 'نوع المستخدم : ') !!}
    <div  class="form-group">
        <select class="form-control" id="sel1"name="type">
          <option {{ isset($user) && $user->type == 'student' ?"selected":""}} value="student" > طالب</option>
          <option {{ isset($user) && $user->type == 'admin' ?"selected":""}} value="admin" >أدمن</option>
          <option {{ isset($user) && $user->type == 'driver' ?"selected":""}}  value="driver" > سائق </option>
        </select>
      </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('img', 'الصورة الشخصية : ') !!}
    <input type='file' name='img' onchange="readURL(this);" />
    <img id="blah" src="@if(isset($user)){{asset('uploads/images/users/'. $user->img)}}@else {{asset('uploads/images/users/default.png')}} @endif" alt="your image"style="width:160px;height:160px" />
</div>


<div class="form-group col-sm-6">
    {!! Form::label('location', 'الموقع:') !!}
    <input id="locationInput" name="location" type="hidden" value="{{json_encode($user->location??'')}}" name="location"/>
    <div class="map" id="map" style=" width: 90%;height:150px;"></div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">رجوع</a>
</div>




@push('scripts')

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

            map.addListener('click', function(event){
                var newLocation = event.latLng; 
                if(marker === false){ 
                    marker = new google.maps.Marker({
                        position: location,
                        map: map ,
                        animation: google.maps.Animation.BOUNCE,
                        drag3gable: true,
                    });
                }
                changeLocationTo(newLocation , map , marker)
            })

            function changeLocationTo(newLocation , map , marker){
                marker.setPosition(newLocation);
              
                $('#locationInput').val(JSON.stringify({
                    lat: newLocation.lat(),
                    lng: newLocation.lng()
                }));
                map.panTo(newLocation);

            }
        }
    </script>
    <script src="//maps.google.com/maps/api/js?key={{env('Google_MAP_API_Key', 'AIzaSyAPceSsErOlOqRVJ7qIb2ZnbKTPnXb4uP0')}}&callback=GoogleMapsDemo" type="text/javascript"></script>

@endpush
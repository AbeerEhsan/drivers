 <div class="container">
  
        <div class="row">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu" >
                    <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i>معلومات الطالب</a></li>

                </ul>
            </div>

            <div class="col-md-8  admin-content" id="profile">

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">الصورة</h3>

                    </div>
                    <div class="panel-body">
                        <img style="width:150px; margin-top:5px;"  class='img-thumbnail' src='{{asset('uploads/images/users/'.$studentInfo->student->img)}}' />                       
                    </div>
                </div>

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">الاسم</h3>
                    </div>
                    <div class="panel-body">
                     {{ $studentInfo->student->name ??'لا يوجد بيانات لعرضها'  }}
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">المعدل </h3>
                    </div>
                    <div class="panel-body">
                    {{ $studentInfo->rate??'لا يوجد بيانات لعرضها'  }}
                    </div>
                </div>

                 <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">المستوى </h3>
                    </div>
                    <div class="panel-body">
                    {{ $studentInfo->level ??'لا يوجد بيانات لعرضها' }}
                    </div>
                </div>
       
                 <div class="panel panel-info" style="margin: 1em;">  
                    <div class="panel-body">
                    <a href="{{ route('studentInfos.index') }}" class="btn btn-default">رجوع</a>

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
@endpush

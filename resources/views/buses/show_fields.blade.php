
  <div class="container">
  
        <div class="row">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu" >
                    <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i>معلومات الباص</a></li>

                </ul>
            </div>

            <div class="col-md-8  admin-content" id="profile">

            
                

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">اسم الباص </h3>
                    </div>
                    <div class="panel-body">
                     {{ $bus->name ??'لا يوجد بيانات لعرضها' }}
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">اسم السائق </h3>
                    </div>
                    <div class="panel-body">
                    {{ $bus->user->name ??'لا يوجد بيانات لعرضها' }}
                    </div>
                </div>

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">الحالة </h3>
                    </div>
                    <div class="panel-body">

                        @if ($bus->status == 'free')
                        متاح
                        @else
                        مشغول
                        @endif

                    </div>
                </div>
               
       
                 <div class="panel panel-info" style="margin: 1em;">  
                    <div class="panel-body">
                    <a href="{{ route('busess.index') }}" class="btn btn-default"> رجوع</a>

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

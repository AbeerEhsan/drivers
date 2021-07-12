
<li class="treeview {{ Request::is('users*') ? 'active' : '' }}" >
    <a href="{!! route('users.index') !!}">
        <span class="pull-left-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        <i class="fas fa-users"></i><span>المستخدمين</span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}">
                <i class="fa "></i>
               الكل
            </a>
        </li>
        <li class=" {{ Request::is('users/admin') ? 'active' : '' }}">
            <a href="{!! route('users.admins1', ['type'=>'admin']) !!}">
                <i class="fa "></i>
               الادارة
            </a>
        </li>
      
        <li class=" {{ Request::is('users/user') ? 'active' : '' }}">
            <a href="{!! route('users.admins1', ['type'=>'student']) !!}">
                <i class="fa "></i>
               الطلاب
            </a>
        </li>

        <li class=" {{ Request::is('users/user') ? 'active' : '' }}">
            <a href="{!! route('users.admins1', ['type'=>'driver']) !!}">
                <i class="fa "></i>
               السائقين
            </a>
        </li>
    </ul>
</li>
{{-- 
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li> --}}

<li class="{{ Request::is('buses*') ? 'active' : '' }}">
    <a href="{{ route('busess.index') }}"><i class="fa fa-edit"></i><span>الباصات</span></a>
</li>

{{-- <li class="{{ Request::is('busStudents*') ? 'active' : '' }}">
    <a href="{{ route('busStudents.index') }}"><i class="fa fa-edit"></i><span>Bus Students</span></a>
</li> --}}



<li class="{{ Request::is('studentInfos*') ? 'active' : '' }}">
    <a href="{{ route('studentInfos.index') }}"><i class="fa fa-user"></i><span>بيانات الطلاب</span></a>
</li>


{{-- 
<li class="{{ Request::is('studentAttends*') ? 'active' : '' }}">
    <a href="{{ route('studentAttends.index') }}"><i class="fa fa-edit"></i><span>سجل حضور الطالب </span></a>
</li> --}}

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}"><i class="fa fa-edit"></i><span>الاعدادات</span></a>
</li>
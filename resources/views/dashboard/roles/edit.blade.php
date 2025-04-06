@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
@endpush

@section('content')
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('role/view') }}">Roles</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
  </nav>

  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Edit Role</h6>
           <form method="POST" action="{{ url('role/update/'.encrypt($role->id)) }}" class="forms-sample" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="role_name">Role Name <span style="color:red;"> *</span></label>
              <input required type="text" class="form-control" id="role_name" name="role_name" autocomplete="off" value="{{ $role->name }}">
            </div>
            <div class="form-group">
              <label for="role_description">Decription</label>
              <input type="text" class="form-control" id="role_description" name="role_description" value="{{ $role->description }}">
            </div>
            <div class="form-group">
                <label for="permissions">Check Permissions <span style="color:red;"> *</span></label>
                @php
                    $counter = 1;
                @endphp
                @foreach($tabs as $key => $permissions)
                    <div class="accordion mb-4" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$counter}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$counter}}" aria-expanded="false" aria-controls="collapse{{$counter}}">
                                <div class="form-check">
                                    <label class="form-check-label" for="select_{{$counter}}">
                                        <input type="checkbox" class="form-check-input" id="select_{{$counter}}" onchange="select_all({{$counter}})">
                                        {{$key}}
                                    </label>
                                </div>
                            </button>
                            </h2>
                            <div id="collapse{{$counter}}" class="accordion-collapse collapse" aria-labelledby="heading{{$counter}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group">
                                    @foreach($permissions as $i => $permission)
                                        <div class="form-check">
                                            <label class="form-check-label" for="{{$permission->name}}" name="permissions[]">
                                                <input type="checkbox"  @if($role->hasPermissionTo($permission->name)) checked @endif class="form-check-input set_{{$counter}}" id="{{$permission->name}}" name="permissions[]" value="{{$permission->name}}" onchange="unselect_all({{$counter}})">
                                                    {{$permission->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $counter++;
                    @endphp
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-light"  href="{{ url('role/view') }}">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<script>

$(document).ready(function() {
    var counter = {{$counter}} - 1;
    for (var i = 1; i <= counter; i++) {
        numberNotChecked = $('.set_'+i+':not(":checked")').length;
        if(numberNotChecked>0){
            $('#select_'+i).prop("checked", false);
        }
        else{
            $('#select_'+i).prop("checked", true);
        }
    }
});

  function select_all(key){
    if($('#select_'+key).is(":checked")){
        $('.set_'+key).prop("checked", true);
    }
    else{
        $('.set_'+key).prop("checked", false);
    }
  }

  function unselect_all(key){
    numberNotChecked = $('.set_'+key+':not(":checked")').length;
    if(numberNotChecked>0){
        $('#select_'+key).prop("checked", false);
    }
    else{
        $('#select_'+key).prop("checked", true);
    }
  }
</script>
@endpush

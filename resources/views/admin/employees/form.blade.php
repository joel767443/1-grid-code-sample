@if (Session::has('error'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::get('error') !!}</li>
        </ul>
    </div>
@endif

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNCrQUjVnFmjGVqkgCBAnVUIstJbYGAzk&libraries=places"></script>

<div class="col-lg-12 clearfix">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{ $formTitle }}</h5>
            <div class="ibox-tools">
                <a href="{{ route('employees') }}"><i class="fa fa-home fa-2x text-success"></i></a>
            </div>
        </div>
        <div class="ibox-content">
            <form method="post" action="" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name', $employee->first_name) }}"
                               class="form-control{{ $errors->has('first_name') ? ' error' : '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" placeholder="Last Name" class="form-control{{ $errors->has('last_name') ? ' error' : '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10">
                        <input type="text" id="address" name="address" value="{{ old('address', $employee->address) }}" placeholder="Address" class="form-control{{ $errors->has('address') ? ' error' : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Emp. No</label>
                            <div class="col-lg-8">
                                <input type="text" value="{{ old('employee_number', $employee->employee_number) }}" name="employee_number" placeholder="Employment Number"
                                       class="form-control{{ $errors->has('employee_number') ? ' error' : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Birth Date</label>
                            <div class="col-lg-8 date">
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" value="{{ old('birth_date', $employee->birth_date) }}" name="birth_date" class="form-control {{ $errors->has('birth_date') ? ' error' : '' }}"
                                           placeholder="Date of birth">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Department</label>
                            <div class="col-lg-8">
                                <input type="text" value="{{ old('department', $employee->department) }}" name="department" placeholder="Department" class="form-control{{ $errors->has('department') ? ' error' : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Phone Number</label>
                            <div class="col-lg-8">
                                <input type="text" value="{{ old('phone_number', $employee->phone_number) }}" name="phone_number" placeholder="0*********" class="form-control{{ $errors->has('phone_number') ? ' error' : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Hire Date</label>
                            <div class="col-lg-8 date">
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" value="{{ old('hire_date', $employee->hire_date) }}" name="hire_date" class="form-control{{ $errors->has('hire_date') ? ' error' : '' }}" placeholder="Hire date">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Designation</label>
                            <div class="col-lg-8">
                                <select class="form-control {{ $errors->has('designation_id') ? ' error' : '' }}" name="designation_id">
                                    @foreach($designations as $designation)
                                        <option {{ old('designation_id', $employee->designation_id) == $designation->id ? 'selected' : '' }} value="{{ $designation->id }}">{{ $designation->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Gender</label>
                            <div class="col-lg-8">
                                <select class="form-control {{ $errors->has('gender_id') ? ' error' : '' }}" name="gender_id">
                                    @foreach($genders as $gender)
                                        <option {{ old('gender_id', $employee->gender_id) == $gender->id ? 'selected' : '' }} value="{{ $gender->id }}">{{ $gender->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-lg-4 control-label">Employment Type</label>
                            <div class="col-lg-8">
                                <select class="form-control {{ $errors->has('employment_type_id') ? ' error' : '' }}" name="employment_type_id">
                                    @foreach($employmentTypes as $employmentType)
                                        <option {{ old('employment_type_id', $employee->employment_type_id) == $employmentType->id ? 'selected' : '' }} value="{{ $employmentType->id }}">{{ $employmentType->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> &nbsp; Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.setFields(
        ['address_components', 'geometry', 'icon', 'name']);
</script>


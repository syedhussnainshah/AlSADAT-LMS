@include("Dashboard.component.navbar")
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="">Update Form</a></li>
        </ol>
    </div>
    <form action="{{url('US')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$data->student_id}}" name="student_id">
        @if(Session::has('success'))
        <div class="text-success text-center   AuthMessage p-3">
            {{Session::get('success')}}

        </div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Horizontal Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">CNIC / B-FORM</label>
                                    <input type="text" class="form-control" placeholder="33100XXXXXXXXX" value="{{$data->StudentBform}}" name="StudentBform">
                                    @error('StudentBform')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="1234 Main St" value="{{$data->StudentName}}" name="StudentName">
                                    @error('StudentName')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" value="{{$data->StudentEmail}}" name="StudentEmail">
                                    @error('StudentEmail')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control" placeholder="Phone" value="{{$data->StudentWhatsappNumber}}" name="StudentWhatsappNumber">
                                    @error('StudentWhatsappNumber')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="date" class="form-control" placeholder="Password" value="{{$data->StudentDOB}}" name="StudentDOB">
                                    @error('StudentDOB')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Campus</label>
                                    <select id="" class="form-select form-control" name="StudentCampus">
                                        <option value="AS1" @if($data->StudentCampus=='AS1')selected @endif>Main</option>
                                        <option value="AS2" @if($data->StudentCampus=='AS2')selected @endif>Second</option>
                                    </select>
                                    @error('StudentCampus')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Class</label>
                                    <select id="" class="form-select form-control" name="StudentCast">
                                        <option value="Muslim" @if($data->StudentCampus=='Muslim')selected @endif>Muslim</option>
                                        <option value="Non-Muslim" @if($data->StudentCampus=='Non-Muslim')selected @endif>Non Muslim</option>
                                    </select>
                                    @error('StudentCast')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Class</label>
                                    <select id="" class="form-select form-control" name="StudentClass">
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}" @if($class->class_id==$data->StudentClass)selected @endif>{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('StudentClass')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="StudentGender" value="Male" @if($data->StudentGender=='Male')checked @endif>
                                        <label class="form-check-label">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="StudentGender" value="Female" @if($data->StudentGender=='Female')checked @endif>
                                        <label class="form-check-label">
                                            Female
                                        </label>
                                    </div>
                                    @error('StudentGender')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gardian Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gardian CNIC / B-FORM</label>
                                    <input type="text" class="form-control" placeholder="33100XXXXXXXXX" name="GradianCNIC" value="{{$data->GradianCNIC}}">
                                    @error('GradianCNIC')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gardian Name</label>
                                    <input type="text" class="form-control" placeholder="1234 Main St" name="GradianName" value="{{$data->GradianName}}">
                                    @error('GradianName')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gardian Phone</label>
                                    <input type="number" class="form-control" placeholder="Password" name="GardianNumber" value="{{$data->GardianNumber}}">
                                    @error('GardianNumber')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gardian Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="GardianGender" value="Male" @if($data->GardianGender=='Male')checked @endif>
                                        <label class="form-check-label">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="GardianGender" value="Female" @if($data->GardianGender=='Male')checked @endif>
                                        <label class="form-check-label">
                                            Female
                                        </label>
                                    </div>
                                    @error('GardianGender')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea name="GardianAddress" id="" cols="30" rows="10" class="form-control">{{$data->GardianAddress}}</textarea>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <br>

</div>
@include("Dashboard.component.footer")